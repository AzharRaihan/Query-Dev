<?php

namespace App\Http\Controllers;

use App\User;

use App\Address;
use Illuminate\Http\Request;


class EloquenController extends Controller
{
    public function index(){
        $users = User::doesnthave('posts')->get();
        $address = Address::with('user')->get();
        return view('users.user-index', compact('users','address'));
    }
}
