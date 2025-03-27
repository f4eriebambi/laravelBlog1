<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\PostMedia;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    return view('blog.index')
        ->with('posts', Post::orderBy('updated_at', 'DESC')->paginate(12));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
    'title' => 'required',
    'description' => 'required',
    'media' => 'max:10', // Add this line
    'media.*' => 'nullable|file|mimes:jpg,png,jpeg,mp4,mov,avi|max:10240',
]);

// validation check
    if ($request->hasFile('media') && count($request->file('media')) > 10) {
        return back()->withErrors(['media' => 'You can upload a maximum of 10 files.']);
    }

        // Create the post
        $post = Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'image_path' => null, // Remove single image upload logic
            'user_id' => auth()->user()->id,
        ]);

        // Handle multiple media uploads
        if ($request->hasFile('media')) {
    foreach ($request->file('media') as $index => $file) {
        $path = $file->store('post_media', 'public');
        $fileType = str_starts_with($file->getMimeType(), 'image') ? 'image' : 'video';

        PostMedia::create([
            'post_id' => $post->id,
            'file_path' => $path,
            'file_type' => $fileType,
            'position' => $index // Add position based on upload order
        ]);
    }
}

        return redirect('/blog')
            ->with('message', 'Your post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
{
    return view('blog.show')
        ->with('post', Post::where('slug', $slug)
            ->with(['media' => function($query) {
                $query->orderBy('position');
            }])
            ->first());
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('blog.edit')
            ->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
    'title' => 'required',
    'description' => 'required',
    'media' => 'max:10', // Add this line
    'media.*' => 'nullable|file|mimes:jpg,png,jpeg,mp4,mov,avi|max:10240',
]);

        // Find the post
        $post = Post::where('slug', $slug)->firstOrFail();

        // validate media count
        $existingMediaCount = $post->media()->count();
    $deletedCount = $request->filled('deleted_media') ? count(explode(',', $request->input('deleted_media'))) : 0;
    $newFilesCount = $request->hasFile('media') ? count($request->file('media')) : 0;

    if (($existingMediaCount - $deletedCount + $newFilesCount) > 10) {
        return back()->withErrors(['media' => 'You can have a maximum of 10 files.']);
    }

        // Update the post (FIXED: Replace [...] with your original code)
        $post->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'user_id' => auth()->user()->id,
        ]);

        // Delete marked media
        if ($request->filled('deleted_media')) {
            $deletedIds = explode(',', $request->input('deleted_media'));
            
            foreach ($deletedIds as $id) {
                $media = PostMedia::find($id);
                if ($media) {
                    // Delete the file from storage
                    Storage::disk('public')->delete($media->file_path);
                    $media->delete();
                }
            }
        }

        // Handle new uploads (keep your existing code)
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $path = $file->store('post_media', 'public');
                $fileType = str_starts_with($file->getMimeType(), 'image') ? 'image' : 'video';

                PostMedia::create([
                    'post_id' => $post->id,
                    'file_path' => $path,
                    'file_type' => $fileType,
                ]);
            }
        }

        return redirect('/blog')->with('message', 'Your post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect('/blog')
            ->with('message', 'Your post has been deleted!');
    }

    /** 
     * Handle media reordering
     */
   public function reorderMedia(Request $request, Post $post)
{
    try {
        // Validate the request
        $validated = $request->validate([
            'order' => 'required|array',
            'order.*' => 'integer|exists:post_media,id,post_id,'.$post->id
        ]);

        \DB::beginTransaction();

        foreach ($validated['order'] as $position => $mediaId) {
            PostMedia::where('id', $mediaId)
                ->where('post_id', $post->id)
                ->update(['position' => $position]);
        }

        \DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Media order updated successfully'
        ]);

    } catch (\Exception $e) {
        \DB::rollBack();
        \Log::error('Media reorder failed: '.$e->getMessage());
        return response()->json([
            'error' => 'Failed to update media order',
            'details' => $e->getMessage()
        ], 500);
    }
}
}
