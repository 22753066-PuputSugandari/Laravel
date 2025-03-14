<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('mapel')->get();
            
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('backend.mapel.action', ['id' => $row->id])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        // $mapels = DB::table('mapel')->get();
        return view('backend.mapel.index');
    }

    public function create()
    {
        return view('backend.mapel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:mapel',
        ]);

        DB::table('mapel')->insert([
            'name' => $request->name,
            'code' => $request->code,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('mapel')->with('success', 'Mata pelajaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mapel = DB::table('mapel')->where('id', $id)->first();
        if (!$mapel) {
            return redirect()->route('mapel.index')->with('error', 'Mata pelajaran tidak ditemukan.');
        }
        return view('backend.mapel.edit', compact('mapel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:mapel,code,' . $id,
        ]);

        $updated = DB::table('mapel')->where('id', $id)->update([
            'name' => $request->name,
            'code' => $request->code,
            'updated_at' => now(),
        ]);

        if (!$updated) {
            return redirect()->route('mapel.index')->with('error', 'Gagal memperbarui mata pelajaran.');
        }

        return redirect()->route('mapel')->with('success', 'Mata pelajaran berhasil diperbarui.');
    }

    public function delete($id)
    {
        $deleted = DB::table('mapel')->where('id', $id)->delete();

        if (!$deleted) {
            return redirect()->route('mapel')->with('error', 'Gagal menghapus mata pelajaran.');
        }

        return redirect()->route('mapel')->with('success', 'Mata pelajaran berhasil dihapus.');
    }
}
