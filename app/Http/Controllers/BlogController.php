<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Category;
use App\Tags;
use App\User;
use App\Visitor;
use App\Http\Controllers\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BlogController extends Controller
{
  private $totalVisitors; // Deklarasi variabel totalVisitors

  public function __construct()
  {
    $this->totalVisitors = Visitor::getTotalVisitors(); // Mengambil total pengunjung
  }

  public function index(Posts $posts)
  {
    $category_widget = Category::all();
    $posts_widget = Posts::latest()->paginate(4);
    $tag = Tags::all();
    $totalVisitors = Visitor::getTotalVisitors();
    $data = $posts->OrderBy('created_at', 'desc')->get();
    return view('user.home', compact('data', 'category_widget', 'posts_widget', 'tag','totalVisitors'));
  }

  public function isi($slug)
  {
      session()->put('previous_url', url()->current());
      $category_widget = Category::all();
      $posts_widget = Posts::latest()->paginate(4);
      $tag = Tags::all();
      $totalVisitors = Visitor::getTotalVisitors();
      
      // Mengambil data posting dengan menyertakan data komentar dan pengguna
      $data = Posts::with(['comments.user', 'user'])->where('slug', $slug)->firstOrFail();
  
      if (!$data) {
          return response()->view('errors.404', [], 404);
      }
      
      return view('user.isi_post', compact('data', 'category_widget', 'posts_widget', 'tag', 'totalVisitors'));
  }

  public function list_blog()
  {
    $category_widget = Category::all();
    $posts_widget = Posts::latest()->paginate(4);
    $tag = Tags::all();
    $totalVisitors = Visitor::getTotalVisitors();
    $data = Posts::latest()->paginate(6);
    if ($data->isEmpty()) {
      return view('errors.404');}
      $related_posts = Posts::where('id', '!=', $data->id)->get()->shuffle();
    return view('user.list_blog', compact('data', 'category_widget', 'posts_widget', 'tag','totalVisitors'));
  }

  public function list_category(category $category)
  {
    $category_widget = Category::all();
    $posts_widget = Posts::latest()->paginate(4);
    $tag = Tags::all();
    $totalVisitors = Visitor::getTotalVisitors();
    $data = $category->posts()->paginate();
    return view('user.list_blog', compact('data', 'category_widget', 'posts_widget', 'tag','totalVisitors'));
  }

  public function cari(Request $request)
  {
    $category_widget = Category::all();
    $posts_widget = Posts::latest()->paginate(4);
    $tag = Tags::all();
    $totalVisitors = Visitor::getTotalVisitors();
    $data = Posts::where('judul', 'like', '%' . $request->cari . '%')->paginate();
    if ($data->isEmpty()) {
      return redirect()->route('home');
  }
    return view('user.list_blog', compact('data', 'category_widget', 'posts_widget', 'tag','totalVisitors'));
  }

  public function users($users)
  {
    $users = Crypt::decrypt($users);
    $category_widget = Category::all();
    $posts_widget = Posts::latest()->paginate(4);
    $tag = Tags::all();
    $totalVisitors = Visitor::getTotalVisitors();
    $user = User::findorfail($users);
    $data = Posts::where('users_id', $users)->latest()->get();
    return view('user.author', compact('data', 'user', 'category_widget', 'posts_widget', 'tag','totalVisitors'));
  }
  
  public function foto()
  {
    $category_widget = Category::all();
    $posts_widget = Posts::latest()->paginate(4);
    $tag = Tags::all();
    $totalVisitors = Visitor::getTotalVisitors();
    $data = Posts::latest()->paginate(6);
    return view('user.foto',compact('data', 'category_widget', 'posts_widget', 'tag','totalVisitors'));
  }
  public function showDashboard()
{
    $totalVisitors = Visitor::getTotalVisitors();

    return view('user.home', compact('totalVisitors'));
}
}
