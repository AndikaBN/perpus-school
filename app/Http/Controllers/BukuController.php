<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\Returbuku;
use App\Models\Setting;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $settings = Setting::first();
        $buku = Buku::query();

        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $buku->where('nama_buku', 'like', '%' . $searchTerm . '%');
        }

        $buku = $buku->paginate(10);

        return view('book.index', compact('settings', 'buku'));
    }

    // public function search(Request $request)
    // {
    //     $search = $request->get('search');
    //     $books = Buku::where('nama_buku', 'LIKE', "%{$search}%")
    //         ->orWhere('penulis', 'LIKE', "%{$search}%")
    //         ->get();

    //     return response()->json($books);
    // }

    // user-books
    public function userBooks(Request $request)
    {
        $settings = Setting::first();
        $bukuQuery = Buku::query();

        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $bukuQuery->where('nama_buku', 'like', '%' . $searchTerm . '%');
        }

        // Hanya ambil data sekali, tanpa paginasi atau duplikasi
        $buku = $bukuQuery->paginate(10);

        return view('book.user-books', compact('settings', 'buku'));
    }


    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'book_title' => 'required|string',
            'author' => 'required|string',
            'release_year' => 'required|string',
            'ebook_path' => 'nullable|file|mimes:pdf,epub|max:20480',
            'cover_path' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle e-book upload
        $ebookPath = null;
        if ($request->hasFile('ebook')) {
            $ebookPath = $request->file('ebook')->store('ebooks', 'public');
        }

        // Handle cover upload
        $coverPath = null;
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
        }


        Buku::create([
            'nama_buku' => $validatedData['book_title'],
            'penulis' => $validatedData['author'],
            'tahun_rilis' => $validatedData['release_year'],
            'ebook_path' => $ebookPath,
            'cover_path' => $coverPath,
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $settings = Setting::first();
        $buku = Buku::findOrFail($id);

        return view('book.show', compact('settings', 'buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::findOrFail($id);

        $buku->peminjaman()->delete();
        // $buku->returbuku()->delete();

        $buku->delete();

        return redirect()->route('buku.index')
            ->with('success', 'Data Buku berhasil dihapus.');
    }
}
