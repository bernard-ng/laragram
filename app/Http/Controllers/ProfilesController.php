<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;

/**
 * Class ProfilesController
 * @package App\Http\Controllers
 * @author bernard-ng <ngandubernard@gmail.com>
 */
class ProfilesController extends Controller
{

    public function index(User $user)
    {
        return view('profiles.index', compact('user'));
    }


    public function show()
    {
    }

}
