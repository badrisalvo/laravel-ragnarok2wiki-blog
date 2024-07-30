<?php

namespace App\Http\Controllers;
use App\Posts;
use App\Category;
use App\Tags;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FotoController extends Controller
{
    public function index()
    {

        return view('user.foto');
    }
}
