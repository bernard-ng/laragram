<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
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

    /**
     * @return HttpResponse
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function create(): HttpResponse
    {
        return Response::view('posts.create');
    }

    /**
     * @param Post $post
     * @return HttpResponse
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function show(Post $post): HttpResponse
    {
        return Response::view('posts.show', compact('post'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function store(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $data = $request->validate([
            'caption' => ['required', 'max:255'],
            'image' => ['required', 'image']
        ]);

        $imagePath = $request->image->store('uploads', "public");
        /*Image::make(public_path("storage/{$imagePath}"))
            ->fit(1200, 1200)
            ->save();*/

        $user->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
            'title' => 'default'
        ]);

        return Response::redirectToRoute('profiles.show', ['user' => $user->id]);
    }

}
