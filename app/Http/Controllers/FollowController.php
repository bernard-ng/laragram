<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

/**
 * Class FollowController
 * @package App\Http\Controllers
 * @author bernard-ng <ngandubernard@gmail.com>
 */
class FollowController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param User $user
     * @return JsonResponse
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function store(User $user): JsonResponse
    {
        return Auth::user()->following()->toggle($user->profile);
    }
}
