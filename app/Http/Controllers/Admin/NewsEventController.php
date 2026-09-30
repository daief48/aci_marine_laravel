<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsEvent;
use Illuminate\Http\Request;

class NewsEventController extends Controller
{
    public function index(Request $request)
    {
        $query = NewsEvent::orderBy('order');
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('text', 'like', "%{$search}%");
        }

        $items = $query->paginate(10)->appends($request->all());
        return view('admin.news_events.index', compact('items'));
    }

    public function create()
    {
        return view('admin.news_events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'post_url' => 'nullable',
            'text' => 'nullable',
            'order' => 'nullable',
        ]);

        $validated['iframe_url'] = $this->generateIframeUrl($request->post_url);
        $validated['is_active'] = $request->has('is_active');
        $validated['is_video'] = $request->has('is_video');

        NewsEvent::create($validated);
        return redirect()->route('admin.news-events.index')->with('success', 'Created successfully.');
    }

    public function edit(NewsEvent $newsEvent)
    {
        $item = $newsEvent;
        return view('admin.news_events.edit', compact('item'));
    }

    public function update(Request $request, NewsEvent $newsEvent)
    {
        $validated = $request->validate([
            'post_url' => 'nullable',
            'text' => 'nullable',
            'order' => 'nullable',
        ]);

        $validated['iframe_url'] = $this->generateIframeUrl($request->post_url);
        $validated['is_active'] = $request->has('is_active');
        $validated['is_video'] = $request->has('is_video');

        $newsEvent->update($validated);
        return redirect()->route('admin.news-events.index')->with('success', 'Updated successfully.');
    }

    private function generateIframeUrl($url)
    {
        if (!$url) return null;
        
        if (str_contains($url, 'facebook.com') || str_contains($url, 'fb.watch')) {
            return 'https://www.facebook.com/plugins/post.php?href=' . urlencode($url) . '&show_text=true&width=500';
        } elseif (str_contains($url, 'youtube.com/watch')) {
            parse_str(parse_url($url, PHP_URL_QUERY), $query);
            if (isset($query['v'])) {
                return 'https://www.youtube.com/embed/' . $query['v'];
            }
        } elseif (str_contains($url, 'youtu.be/')) {
            $path = parse_url($url, PHP_URL_PATH);
            return 'https://www.youtube.com/embed' . $path;
        }
        
        return null;
    }

    public function destroy(NewsEvent $newsEvent)
    {
        $newsEvent->delete();
        return redirect()->route('admin.news-events.index')->with('success', 'Deleted successfully.');
    }
}
