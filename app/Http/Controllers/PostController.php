<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    function postAdmin () {
        $post = Post::orderBy('created_at', 'desc')->paginate(5);
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::orderBy('created_at', 'desc')->get();

        return view('backend.post.index', compact('post', 'jumlahNotifikasi', 'pendaftars'));
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
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ], [
            'title.required' => 'Title wajib diisi',
            'title.max' => 'Title maksimal 45 karakter',
            'body.required' => 'Body wajib diisi',
            'author_id.required' => 'Author ID wajib diisi',
            'author_id.exists' => 'Author ID tidak valid',
            'image.max' => 'Image maksimal 2 MB',
            'image.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
            'image.image' => 'File harus berbentuk image'
        ]);

        // Jika file image ada yang terupload
        if ($request->hasFile('image')) {
            // Simpan gambar menggunakan store() di folder 'public/artikel'
            $fileName = $request->image->store('artikel', 'public');
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
            'title.required' => 'Title wajib diisi',
            'body.required' => 'Body wajib diisi',
            'author_id.required' => 'Author ID wajib diisi',
            'author_id.exists' => 'Author ID tidak valid',
            'image.max' => 'Image maksimal 2 MB',
            'image.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
            'image.image' => 'File harus berbentuk image'
        ]);

        // Ambil data image lama
        $imageLama = DB::table('posts')->select('image')->where('id', $id)->first();
        
        // Jika ada image baru yang di-upload
        if ($request->hasFile('image')) {
            // Hapus image lama jika ada
            if ($imageLama && file_exists(public_path('storage/artikel/' . $imageLama->image))) {
                unlink(public_path('storage/artikel/' . $imageLama->image));
            }

            // Simpan image baru menggunakan store()
            $fileName = $request->image->store('artikel', 'public');
        } else {
            // Jika tidak ada image baru, gunakan image lama
            $fileName = $imageLama->image;
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
