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
            ->with('posts', Post::orderBy('updated_at', 'DESC')->get());
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
        'media' => 'max:10',
        'media.*' => 'nullable|file|mimes:jpg,png,jpeg,mp4,mov,avi|max:10240',
    ]);

    $post = Post::create([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
        'user_id' => auth()->user()->id,
    ]);

    if ($request->hasFile('media')) {
        foreach ($request->file('media') as $index => $file) {
            $path = $file->store('post_media', 'public');
            $fileType = str_starts_with($file->getMimeType(), 'image') ? 'image' : 'video';

            PostMedia::create([
                'post_id' => $post->id,
                'file_path' => $path,
                'file_type' => $fileType,
                'position' => $index
            ]);
        }
    }

    return redirect('/blog')->with('message', 'Your post has been added!');
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
            ->with('post', Post::where('slug', $slug)->first());
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
        'media' => 'max:10',
        'media.*' => 'nullable|file|mimes:jpg,png,jpeg,mp4,mov,avi|max:10240',
    ]);

    $post = Post::where('slug', $slug)->firstOrFail();
    $post->update([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
        'user_id' => auth()->user()->id,
    ]);

    // Update positions of existing media
    if ($request->has('media_positions')) {
        foreach ($request->input('media_positions') as $mediaId => $position) {
            PostMedia::where('id', $mediaId)
                ->where('post_id', $post->id)
                ->update(['position' => $position]);
        }
    }

    // Delete marked media
    if ($request->filled('deleted_media')) {
        $deletedIds = explode(',', $request->input('deleted_media'));
        foreach ($deletedIds as $id) {
            $media = PostMedia::find($id);
            if ($media) {
                Storage::disk('public')->delete($media->file_path);
                $media->delete();
            }
        }
    }

    // Add new media
    if ($request->hasFile('media')) {
        $currentMaxPosition = PostMedia::where('post_id', $post->id)->max('position') ?? -1;
        
        foreach ($request->file('media') as $index => $file) {
            $path = $file->store('post_media', 'public');
            $fileType = str_starts_with($file->getMimeType(), 'image') ? 'image' : 'video';

            PostMedia::create([
                'post_id' => $post->id,
                'file_path' => $path,
                'file_type' => $fileType,
                'position' => $currentMaxPosition + $index + 1
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
}

