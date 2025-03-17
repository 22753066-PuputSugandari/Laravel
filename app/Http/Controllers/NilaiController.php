<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class NilaiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('nilai')
                ->join('students', 'nilai.student_id', '=', 'students.id')
                ->join('techer', 'nilai.techer_id', '=', 'techer.id') // Perbaikan di sini
                ->join('mapel', 'nilai.mapel_id', '=', 'mapel.id')
                ->select('nilai.*', 'students.name as student_name', 'techer.name as teacher_name', 'mapel.name as mapel_name')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('student', function ($row) {
                    return $row->student_name ?? '-';
                })
                ->addColumn('techer', function ($row) { 
                    return $row->techer_name ?? '-';
                })
                ->addColumn('mapel', function ($row) {
                    return $row->mapel_name ?? '-';
                })
                ->addColumn('action', function ($row) {
                    return view('backend.nilai.action', ['id' => $row->id])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.nilai.index');
    }

    public function create()
    {
        $students = DB::table('students')->get();
        $teachers = DB::table('techer')->get(); 
        $mapels = DB::table('mapel')->get();

        return view('backend.nilai.create', compact('students', 'teachers', 'mapels'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'techer_id' => 'required|exists:techer,id', 
            'mapel_id' => 'required|exists:mapel,id',
            'nilai' => 'required|integer|min:0|max:100',
        ]);

        DB::table('nilai')->insert([
            'student_id' => $request->student_id,
            'techer_id' => $request->techer_id, 
            'mapel_id' => $request->mapel_id,
            'nilai' => $request->nilai,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('nilai')->with('success', 'Nilai berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $nilai = DB::table('nilai')->where('id', $id)->first();
        $students = DB::table('students')->get();
        $teachers = DB::table('techer')->get(); 
        $mapels = DB::table('mapel')->get();

        if (!$nilai) {
            return redirect()->route('nilai')->with('error', 'Nilai tidak ditemukan.');
        }

        return view('backend.nilai.edit', compact('nilai', 'students', 'teachers', 'mapels'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'techer_id' => 'required|exists:techer,id', 
            'mapel_id' => 'required|exists:mapel,id',
            'nilai' => 'required|integer|min:0|max:100',
        ]);

        $updated = DB::table('nilai')->where('id', $id)->update([
            'student_id' => $request->student_id,
            'techer_id' => $request->techer_id, 
            'mapel_id' => $request->mapel_id,
            'nilai' => $request->nilai,
            'updated_at' => now(),
        ]);

        if (!$updated) {
            return redirect()->route('nilai')->with('error', 'Gagal memperbarui nilai.');
        }

        return redirect()->route('nilai')->with('success', 'Nilai berhasil diperbarui.');
    }

    public function delete($id)
    {
        $deleted = DB::table('nilai')->where('id', $id)->delete();

        if (!$deleted) {
            return redirect()->route('nilai')->with('error', 'Gagal menghapus nilai.');
        }

        return redirect()->route('nilai')->with('success', 'Nilai berhasil dihapus.');
    }
}
