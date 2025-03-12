<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = DB::table('techer')->paginate(5);
        return view('teacher.index', compact('teachers')); // Kirim ke view
    }

    public function create()
    {
        return view('teacher.create'); // Gunakan folder 'techer'
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:techer,email',
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'gender' => 'required|string',
            'status' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = 'default.jpg';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        DB::table('techer')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'status' => $request->status,
            'image' => $imageName
        ]);

        return redirect()->route('techer')->with('success', 'Teacher berhasil ditambahkan');
    }

    public function show($id)
    {
        $teacher = DB::table('techer')->where('id', $id)->first();

        if (!$teacher) {
            return redirect()->route('techer')->with('error', 'Data tidak ditemukan');
        }

        return view('teacher.show', compact('teacher'));
    }

    public function edit($id)
    {
        $teacher = DB::table('techer')->where('id', $id)->first();

        if (!$teacher) {
            return redirect()->route('teacher.index')->with('error', 'Data tidak ditemukan');
        }

        return view('teacher.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:techer,email,' . $id,
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'gender' => 'required|string',
            'status' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $teacher = DB::table('techer')->where('id', $id)->first();

        if (!$teacher) {
            return redirect()->route('techer')->with('error', 'Data tidak ditemukan');
        }

        $imageName = $teacher->image;

        if ($request->hasFile('image')) {
            if ($teacher->image && $teacher->image !== 'default.jpg' && File::exists(public_path('images/' . $teacher->image))) {
                File::delete(public_path('images/' . $teacher->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        DB::table('techer')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'status' => $request->status,
            'image' => $imageName
        ]);

        return redirect()->route('techer')->with('success', 'Teacher berhasil diperbarui');
    }

    public function delete($id)
    {
        $teacher = DB::table('techer')->where('id', $id)->first();

        if (!$teacher) {
            return redirect()->route('techer')->with('error', 'Data tidak ditemukan');
        }

        if ($teacher->image && $teacher->image !== 'default.jpg' && File::exists(public_path('images/' . $teacher->image))) {
            File::delete(public_path('images/' . $teacher->image));
        }

        DB::table('techer')->where('id', $id)->delete();

        return redirect()->route('techer')->with('success', 'Data guru berhasil dihapus.');
    }
}
