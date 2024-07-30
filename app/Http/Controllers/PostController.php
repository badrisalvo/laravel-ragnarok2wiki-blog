<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Category;
use App\Tags;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Posts::paginate(10);
        return view('admin.post.index', compact('post'));
    }

    public function create()
    {
        $category = Category::all();
        $tag = Tags::all();
        return view('admin.post.create', compact('category', 'tag'));
    }

    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        $gambar = $request->file('gambar');
        $new_gambar = time() . '_' . $gambar->getClientOriginalName();
        
        $gambar->move('uploads/posts', $new_gambar);

        $post = Posts::create([
            'judul' => $validated['judul'],
            'category_id' => $validated['category_id'],
            'content' => $validated['content'],
            'gambar' => 'uploads/posts/' . $new_gambar,
            'slug' => Str::slug($validated['judul']),
            'users_id' => Auth::id()
        ]);

        $post->tags()->attach($request->tags);

        return redirect()->back()->with('success', 'Postingan Anda Berhasil Disimpan');
    }

    public function edit($id)
    {
        // Menemukan postingan berdasarkan ID
        $post = Posts::findOrFail($id);
    
        // Memeriksa apakah pengguna yang sedang login adalah pembuat postingan yang sesuai
        if ($post->users_id !== auth()->id()) {
            // Jika bukan, kembalikan dengan pesan kesalahan
            return redirect()->back()->with('error', 'You are not authorized to edit this post.');
        }
    
        // Jika pengguna yang sedang login adalah pembuat postingan yang sesuai, lanjutkan dengan menampilkan halaman edit
        $category = Category::all();
        $tag = Tags::all();
        return view('admin.post.edit', compact('post', 'category', 'tag'));
    }
    

    public function update(UpdatePostRequest $request, $id)
    {
        $validated = $request->validated();

        $post = Posts::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $new_gambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move('uploads/posts', $new_gambar);

            // Hapus gambar lama jika ada
            if ($post->gambar) {
                Storage::delete('uploads/posts/' . basename($post->gambar));
            }

            $post_data = [
                'judul' => $validated['judul'],
                'category_id' => $validated['category_id'],
                'content' => $validated['content'],
                'gambar' => 'uploads/posts/' . $new_gambar,
                'slug' => Str::slug($validated['judul']),
                'users_id' => Auth::id()
            ];
        } else {
            $post_data = [
                'judul' => $validated['judul'],
                'category_id' => $validated['category_id'],
                'content' => $validated['content'],
                'slug' => Str::slug($validated['judul']),
                'users_id' => Auth::id()
            ];
        }

        $post->tags()->sync($request->tags);
        $post->update($post_data);

        return redirect()->route('post.index')->with('success', 'Postingan Anda Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $post = Posts::findOrFail($id);
        $post->delete();

        return redirect()->back()->with('success', 'Postingan Anda Berhasil Dihapus (Silahkan cek trashed post)');
    }

    public function tampil_hapus()
    {
        $post = Posts::onlyTrashed()->paginate(10);
        return view('admin.post.hapus', compact('post'));
    }

    public function restore($id)
    {
        $post = Posts::withTrashed()->where('id', $id)->first();
        $post->restore();

        return redirect()->back()->with('success', 'Postingan Anda Berhasil Direstore (Silahkan cek list post)');
    }

    public function kill($id)
    {
        $post = Posts::withTrashed()->where('id', $id)->first();
        $post->forceDelete();

        return redirect()->back()->with('success', 'Postingan Anda Berhasil Dihapus Secara Permanen');
    }
}
