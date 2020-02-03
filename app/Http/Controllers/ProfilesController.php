<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

/**
 * Class ProfilesController
 * @package App\Http\Controllers
 * @author bernard-ng <ngandubernard@gmail.com>
 */
class ProfilesController extends Controller
{

    /**
     * @param User $user
     * @return HttpResponse
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function index(User $user)
    {
        return Response::view('profiles.index', compact('user'));
    }

    /**
     * @param User $user
     * @return HttpResponse
     * @throws AuthorizationException
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return Response::view('profiles.edit', compact('user'));
    }


    /**
     * @param User $user
     * @param Request $request
     * @return RedirectResponse
     * @throws AuthorizationException
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function update(User $user, Request $request): RedirectResponse
    {
        $this->authorize('update', $user->profile);

        $user = Auth::user();
        $data = $request->validate([
            'title' => ['required', 'max:50'],
            'description' => ['required'],
            'url' => ['url'],
            'image' => ['image']
        ]);

        if ($request->image) {
            $imagePath = $request->image->store('profile', 'public');
            //Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000)->save();
        }

        $user->profile()->update(
            array_merge($data, ['image' => $imagePath ?? null])
        );

        return Response::redirectToRoute('profiles.show', ['user' => $user->id]);
    }

    /**
     * @param User $user
     * @return HttpResponse
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function show(User $user): HttpResponse
    {
        return Response::view('profiles.show', compact('user'));
    }
}
