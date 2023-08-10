<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct(private User $user)
    {

    }

    public function dumpAll() {
        dd($this->user->all());
    }
}
