<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreStudentRequest;

class StudentController extends Controller
{
    public function index()
    {
        $students = DB::table('students')->paginate(5);
        return view('student.index', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(StoreStudentRequest $request)
    {
        // Cek apakah ada gambar yang diunggah
        $imageName = 'default.jpg';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        DB::table('students')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'class' => $request->class,
            'address' => $request->address,
            'gender' => $request->gender,
            'status' => $request->status,
            'image' => $imageName,
        ]);

        return redirect()->route('student')->with('success', 'Data siswa berhasil ditambahkan.');
    }
    public function show($id)    
    {
        $student = DB::table('students')->where('id', $id)->first();
        return view('student.show', compact('student'));
    }

    public function edit($id)
    {
        $student = DB::table('students')->where('id', $id)->first();
        return view('student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'phone' => 'required|numeric',
            'class' => 'required|integer',
            'address' => 'required|string',
            'gender' => 'required|string',
            'status' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $student = DB::table('students')->where('id', $id)->first();

        $imageName = $student->image; 
        if ($request->hasFile('image')) {
            
            if ($student->image && $student->image !== 'default.jpg' && File::exists(public_path('images/' . $student->image))) {
                File::delete(public_path('images/' . $student->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        DB::table('students')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'class' => $request->class,
            'address' => $request->address,
            'gender' => $request->gender,
            'status' => $request->status,
            'image' => $imageName,
        ]);

        return redirect()->route('student')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function delete($id)
    {
        $student = DB::table('students')->where('id', $id)->first();
        
        // Hapus gambar jika bukan default
        if ($student->image && $student->image !== 'default.jpg' && File::exists(public_path('images/' . $student->image))) {
            File::delete(public_path('images/' . $student->image));
        }

        DB::table('students')->where('id', $id)->delete();
        return redirect()->route('student')->with('success', 'Data siswa berhasil dihapus.');
    }
}
