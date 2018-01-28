<?php

namespace Librory\Http\Controllers;

use Librory\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allMembers()
    {
        $members = User::members();

        return view('pages.members.all', compact('members'));
    }
}
