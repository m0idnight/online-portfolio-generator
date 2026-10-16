<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest()->get();

        return view('portfolio.index', compact('portfolios'));
    }

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
            $validated['profile_picture'] = $request
                ->file('profile_picture')
                ->store('profile-pictures', 'public');
        }

        $portfolio = Portfolio::create($validated);

        return redirect()->to(
            url('/portfolio/' . $portfolio->id)
        )->with(
            'success',
            'Your portfolio was created successfully!'
        );
    }

    public function show(Portfolio $portfolio)
    {
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

    public function edit(Portfolio $portfolio)
    {
        return view('portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
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
        ]);

        if ($request->hasFile('profile_picture')) {
            $validated['profile_picture'] = $request
                ->file('profile_picture')
                ->store('profile-pictures', 'public');
        }

        $portfolio->update($validated);

        return redirect()->to(
            url('/portfolio/' . $portfolio->id)
        )->with(
            'success',
            'Your portfolio was updated successfully!'
        );
    }

    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();

        return redirect()->to(url('/portfolios'))
            ->with('success', 'Portfolio deleted successfully!');
    }
}