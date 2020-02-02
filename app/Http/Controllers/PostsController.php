<?php

namespace App\Http\Controllers;

use App\Post;
use Intervention\Image\Facades\Image;

/**
 * Class PostsController
 * @package App\Http\Controllers
 * @author bernard-ng <ngandubernard@gmail.com>
 */
class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => ['required', 'max:255'],
            'image' => ['required', 'image']
        ]);

        $imagePath = request('image')->store('uploads', "public");
        /*Image::make(public_path("storage/{$imagePath}"))
            ->fit(1200, 1200)
            ->save();*/

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
            'title' => 'default'
        ]);

        return redirect(route('profile.show', ['user' => auth()->user()->id]));
    }

}
