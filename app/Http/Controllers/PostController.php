<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
     // Menampilkan semua post
     public function index() {
        return "Menampilkan daftar post";
    }

    // Menampilkan form tambah post
    public function create() {
        return "Form tambah post";
    }

    // Menyimpan post baru
    public function store(Request $request) {
        return "Post berhasil disimpan";
    }

    // Menampilkan satu post
    public function show($id) {
        return "Menampilkan post dengan ID: $id";
    }

    // Menampilkan form edit post
    public function edit($id) {
        return "Form edit post dengan ID: $id";
    }

    // Memperbarui post
    public function update(Request $request, $id) {
        return "Post dengan ID: $id berhasil diperbarui";
    }

    // Menghapus post
    public function destroy($id) {
        return "Post dengan ID: $id berhasil dihapus";
    }
}
