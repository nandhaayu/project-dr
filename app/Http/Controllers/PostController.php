<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostController extends Controller
{
    public function postAdmin()
    {
        $post = Post::latest()->paginate(5);
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::latest()->get();

        return view('backend.post.index', compact('post', 'jumlahNotifikasi', 'pendaftars'));
    }

    public function create()
    {
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::latest()->get();

        return view('backend.post.create', compact('jumlahNotifikasi', 'pendaftars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:45',
            'body' => 'required',
            'author_id' => 'required|exists:users,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->author_id = $request->author_id;
        $post->save();

        // Simpan image ke media library jika ada
        if ($request->hasFile('image')) {
            $post->addMediaFromRequest('image')->toMediaCollection('posts');
        }

        return redirect()->route('post.admin')->with('success', 'Postingan berhasil dibuat');
    }

    public function edit(Post $id)
    {
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::latest()->get();

        return view('backend.post.edit', [
            'id' => $id,
            'jumlahNotifikasi' => $jumlahNotifikasi,
            'pendaftars' => $pendaftars
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:45',
            'body' => 'required',
            'author_id' => 'required|exists:users,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->author_id = $request->author_id;
        $post->save();

        // Hapus gambar lama & tambahkan yang baru
        if ($request->hasFile('image')) {
            $post->clearMediaCollection('posts');
            $post->addMediaFromRequest('image')->toMediaCollection('posts');
        }

        return redirect()->route('post.admin')->with('success', 'Postingan berhasil diperbarui');
    }

    public function destroy(Post $id)
    {
        $id->clearMediaCollection('posts'); // hapus file gambar
        $id->delete();

        return redirect()->route('post.admin')->with('success', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|string|max:255',
        ]);

        $query = $request->input('query');
        $posts = Post::where('title', 'like', "%{$query}%")
            ->orWhere('body', 'like', "%{$query}%")
            ->paginate(10);

        return view('post', compact('posts', 'query'));
    }
}
