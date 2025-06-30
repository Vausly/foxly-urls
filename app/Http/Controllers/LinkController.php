<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use Illuminate\Support\Str;

class LinkController extends Controller{
    public function index(){
        $totalLinks = \App\Models\Link::count(); // hitung total link dari database
        return view('home', compact('totalLinks'));
    }

    public function store(Request $request){
    $request->validate([
        'original_url' => 'required|url',
    ]);

    // Hitung jumlah link yang dibuat bulan ini
    $limit = 100;
    $now = now();

    $countThisMonth = Link::where('user_id', auth()->id())
        ->whereYear('created_at', $now->year)
        ->whereMonth('created_at', $now->month)
        ->count();

    if ($countThisMonth >= $limit) {
        return redirect()->back()->with('error', 'Limit reached: You can only create up to 100 links per month.');
    }

    $slug = auth()->check()
        ? $request->input('slug', Str::random(5))
        : Str::random(5);

    while (Link::where('short_slug', $slug)->exists()) {
        $slug = Str::random(5);
    }

    $link = Link::create([
        'original_url' => $request->original_url,
        'short_slug'   => $slug,
        'user_id'      => auth()->id(),
    ]);

    return redirect()->back()->with([
        'success' => 'Shortlink created successfully!',
        'short_link' => url("/{$link->short_slug}")
    ]);
    }

    // Redirect the shortened URL
    public function redirect($slug)
    {
        $link = Link::where('short_slug', $slug)->firstOrFail();

        if (!request()->userAgent() || !str_contains(strtolower(request()->userAgent()), 'bot')) {
            $link->increment('clicks'); // Click count (no bots)
        }

        return redirect($link->original_url);
    }

    public function dashboard(Request $request){
        $query = Link::where('user_id', auth()->id());

        if ($request->filled('search')) {
            $search = $request->search;
            $query = $query->where(function ($q) use ($search) {
                $q->where('original_url', 'like', "%{$search}%")
                ->orWhere('short_slug', 'like', "%{$search}%");
            });
        }

        $links = $query->orderByDesc('created_at')->paginate(50);

        return view('dashboard', compact('links'));
    }

    // Edit form
    public function edit($id){
        $link = Link::where('user_id', auth()->id())->findOrFail($id);
        return view('dashboard_edit', compact('link'));
    }

    // Update link
    public function update(Request $request, $id){
        $link = Link::where('user_id', auth()->id())->findOrFail($id);

        // Validations
        $request->validate([
            'original_url' => 'required|url',
            'short_slug' => [
            'required',
            'string',
            'min:4',
            'max:30',
            'regex:/^[a-zA-Z0-9_-]+$/',
            'unique:links,short_slug,' . $link->id,
          ],
        ]);

        $link->update([
            'original_url' => $request->original_url,
            'short_slug'   => $request->short_slug,
        ]);

        return redirect()->route('dashboard')->with('success', 'Link updated successfully.');
    }

    // Delete  link
    public function destroy($id)
    {
        $link = Link::where('user_id', auth()->id())->findOrFail($id);
        $link->delete();

        return redirect()->route('dashboard')->with('success', 'Link deleted successfully.');
    }
}
