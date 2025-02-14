<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    function postAdmin () {
        $post = Post::all();
        return view('backend.post.index', compact('post'));
    }

    function create () {
        return view('backend.post.create');
    }

    public function store(Request $request)
    {
        // Validasi input tanpa slug
        $request->validate([
            'title' => 'required|max:45',
            'body' => 'required',
            'author_id' => 'required|exists:users,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
        ], [
            'title.required' => 'title wajib diisi',
            'title.max' => 'title maksimal 45 karakter',
            'body.required' => 'body wajib diisi',
            'author_id.required' => 'Author ID wajib diisi',
            'author_id.exists' => 'Author ID tidak valid',
            'image.max' => 'image maksimal 2 MB',
            'image.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
            'image.image' => 'File harus berbentuk image'
        ]);
    
        // Jika file image ada yang terupload
        if (!empty($request->image)) {
            $fileName = 'image-' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/artikel'), $fileName);
        } else {
            $fileName = 'nophoto.jpg';
        }
    
        // Insert tanpa slug
        DB::table('posts')->insert([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $fileName,
            'author_id' => $request->author_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    
        return redirect()->route('post.admin');
    }



    public function edit(Post $id) {
        return view('backend.post.edit', compact('id'));
    }

    public function update(Request $request, string $id)
{
    $request->validate([
        'title' => 'required|max:45',
        'body' => 'required',
        'author_id' => 'required|exists:users,id',
        'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    ], [
        'title.required' => 'title Wajib diisi',
        'body.required' => 'body wajib diisi',
        'author_id.required' => 'Author ID wajib diisi',
        'author_id.exists' => 'Author ID tidak valid',
        'image.max' => 'image maksimal 2 MB',
        'image.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
        'image.image' => 'File harus berbentuk image'
    ]);

    // Ambil data image lama
    $imageLama = DB::table('posts')->select('image')->where('id', $id)->first();
    
    // Jika ada image baru yang di-upload
    if (!empty($request->image)) {
        // Hapus image lama jika ada
        if (!empty($imageLama->image)) unlink(public_path('storage/artikel/' . $imageLama->image));

        // Simpan image baru
        $fileName = 'image-' . $id . '.' . $request->image->extension();
        $request->image->move(public_path('storage/artikel'), $fileName);
    } else {
        $fileName = $imageLama->image; // Gunakan image lama jika tidak ada image baru
    }

    // Update data tanpa slug
    DB::table('posts')->where('id', $id)->update([
        'title' => $request->title,
        'body' => $request->body,
        'author_id' => $request->author_id,
        'image' => $fileName,
    ]);
                
    return redirect()->route('post.admin');
}

    public function destroy(Post $id) {
        $id->delete();
        return redirect()->route('post.admin')->with('succes', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $request->validate([
            'query' => 'required|string|max:255',
        ], [
            'query.required' => 'Kata kunci pencarian tidak boleh kosong.',
            'query.max' => 'Kata kunci pencarian maksimal 255 karakter.',
        ]);

        $posts = Post::where('title', 'like', "%{$query}%")
            ->orWhere('body', 'like', "%{$query}%")
            ->paginate(10);

        return view('post', compact('posts', 'query'));
    }
}
