<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PortfolioController extends Controller
{
    /**
     * Display only the logged-in user's portfolios.
     */
    public function index(Request $request)
    {
        $portfolios = $request->user()
            ->portfolios()
            ->latest()
            ->get();

        return view('portfolio.index', compact('portfolios'));
    }

    /**
     * Display the portfolio creation page.
     */
    public function create(Request $request)
    {
        $allowedTemplates = [
            'minimalist',
            'creative',
            'developer',
        ];

        $selectedTemplate = $request->query('template', '');

        if (!in_array($selectedTemplate, $allowedTemplates, true)) {
            $selectedTemplate = '';
        }

        return view(
            'portfolio.create',
            compact('selectedTemplate')
        );
    }

    /**
     * Preview a selected portfolio template.
     */
    public function preview(Request $request, string $template)
    {
        $allowedTemplates = [
            'minimalist',
            'creative',
            'developer',
        ];

        abort_unless(
            in_array($template, $allowedTemplates, true),
            404
        );

        $data = $request->query();
        $portfolio = new Portfolio();

        $fields = [
            'full_name',
            'email',
            'contact_number',
            'address',
            'about',
            'education',
            'skills',
            'projects',
            'experience',
            'website',
            'social_links',
        ];

        foreach ($fields as $field) {
            $value = $data[$field] ?? '';

            $portfolio->{$field} = is_string($value)
                ? $value
                : '';
        }

        $portfolio->bio = $portfolio->about;

        return response()
            ->view(
                'portfolio.templates.' . $template,
                [
                    'portfolio' => $portfolio,
                    'isPreview' => true,
                ]
            )
            ->header('X-Frame-Options', 'SAMEORIGIN');
    }

    /**
     * Save a new portfolio under the logged-in user.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|max:10240',
            'email' => 'required|email|max:255',
            'contact_number' => 'nullable|string|max:50',
            'address' => 'nullable|string',
            'about' => 'nullable|string',
            'education' => 'nullable|string',
            'skills' => 'nullable|string',
            'projects' => 'nullable|string',
            'experience' => 'nullable|string',
            'social_links' => 'nullable|string',
            'website' => 'nullable|url|max:255',
            'template' => 'required|in:minimalist,creative,developer',
        ]);

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');

            Log::info('Portfolio creation image upload', [
                'file_valid' => $file->isValid(),
                'file_size' => $file->getSize(),
                'mime_type' => $file->getMimeType(),
            ]);

            $path = $file->store('profile-pictures', 'public');

            if ($path === false) {
                Log::error('Portfolio creation image storage failed');

                return back()
                    ->withErrors([
                        'profile_picture' =>
                            'The profile picture could not be saved. Please try again.',
                    ])
                    ->withInput();
            }

            $validated['profile_picture'] = $path;
        }

        $portfolio = $request->user()
            ->portfolios()
            ->create($validated);

        return redirect()->to(
            url('/portfolio/' . $portfolio->id)
        )->with(
            'success',
            'Your portfolio was created successfully!'
        );
    }

    /**
     * Display a portfolio only to its owner.
     */
    public function show(Portfolio $portfolio)
    {
        $this->ensureOwnership($portfolio);

        $template = $portfolio->template ?? 'minimalist';

        if ($template === 'simple') {
            $template = 'minimalist';
        }

        $allowedTemplates = [
            'minimalist',
            'creative',
            'developer',
        ];

        if (!in_array($template, $allowedTemplates, true)) {
            $template = 'minimalist';
        }

        return view(
            'portfolio.templates.' . $template,
            compact('portfolio')
        );
    }

    /**
     * Display the edit form only to the owner.
     */
    public function edit(Portfolio $portfolio)
    {
        $this->ensureOwnership($portfolio);

        return view('portfolio.edit', compact('portfolio'));
    }

    /**
     * Update a portfolio only if the user owns it.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $this->ensureOwnership($portfolio);

        Log::info('Portfolio image upload diagnostic', [
            'portfolio_id' => $portfolio->id,
            'has_file' => $request->hasFile('profile_picture'),
            'file_count' => count($request->allFiles()),
            'content_type' => $request->header('Content-Type'),
        ]);

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|max:10240',
            'email' => 'required|email|max:255',
            'contact_number' => 'nullable|string|max:50',
            'address' => 'nullable|string',
            'about' => 'nullable|string',
            'education' => 'nullable|string',
            'skills' => 'nullable|string',
            'projects' => 'nullable|string',
            'experience' => 'nullable|string',
            'social_links' => 'nullable|string',
            'website' => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');

            Log::info('Portfolio image file details', [
                'portfolio_id' => $portfolio->id,
                'file_valid' => $file->isValid(),
                'file_error' => $file->getError(),
                'file_size' => $file->getSize(),
                'mime_type' => $file->getMimeType(),
                'original_extension' => $file->getClientOriginalExtension(),
            ]);

            if (!$file->isValid()) {
                return back()
                    ->withErrors([
                        'profile_picture' =>
                            'The uploaded image was not received correctly. Please try again.',
                    ])
                    ->withInput();
            }

            $path = $file->store('profile-pictures', 'public');

            if ($path === false) {
                Log::error('Portfolio image storage failed', [
                    'portfolio_id' => $portfolio->id,
                ]);

                return back()
                    ->withErrors([
                        'profile_picture' =>
                            'The image could not be saved. Please try again.',
                    ])
                    ->withInput();
            }

            $validated['profile_picture'] = $path;
        }

        $portfolio->update($validated);

        $portfolio->refresh();

        Log::info('Portfolio image after database update', [
            'portfolio_id' => $portfolio->id,
            'saved_profile_picture' => $portfolio->profile_picture,
        ]);

        return redirect()->to(
            url('/portfolio/' . $portfolio->id)
        )->with(
            'success',
            'Your portfolio was updated successfully!'
        );
    }

    /**
     * Delete a portfolio only if the user owns it.
     */
    public function destroy(Portfolio $portfolio)
    {
        $this->ensureOwnership($portfolio);

        $portfolio->delete();

        return redirect()->to(url('/portfolios'))
            ->with('success', 'Portfolio deleted successfully!');
    }

    /**
     * Return 404 if the portfolio belongs to another user
     * or has no assigned owner.
     */
    private function ensureOwnership(Portfolio $portfolio): void
    {
        abort_unless(
            $portfolio->user_id !== null
                && (int) $portfolio->user_id === (int) auth()->id(),
            404
        );
    }
}
