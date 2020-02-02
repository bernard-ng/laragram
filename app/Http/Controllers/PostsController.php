<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

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
     * @return Factory|View
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function create()
    {
        return view('posts.create');
    }


    public function store()
    {
        $data = request()->validate([
            'caption' => ['required', 'max:255'],
            'image' => ['required', 'image']
        ]);

        $imagepath = request('image')->store('uploads', "public");
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagepath,
            'title' => 'default'
        ]);

        return redirect(route('profile.show', ['user' => auth()->user()->id]));
    }

}
