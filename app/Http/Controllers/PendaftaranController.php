<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;

class PendaftaranController extends Controller
{
    public function __construct()
    {

        // Middleware hanya diterapkan untuk halaman yang butuh login
        $this->middleware('auth')->except(['create', 'store']);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pendaftaran::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($pendaftaran) {
                    return view('backend.pendaftaran.action', compact('pendaftaran'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.pendaftaran.index');
    }

    public function create()
    {
        return view('auth.create'); // Mengakses create.blade.php di dalam folder auth
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|string|unique:pendaftaran,nisn',
            'address' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'asal_sekolah' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'email' => 'required|email|unique:pendaftaran,email',
        ]);

        // Simpan data
        Pendaftaran::create($validatedData);

        return redirect()->route('pendaftaran')->with('success', 'Pendaftaran berhasil dikirim.');
    }

    public function edit($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('backend.pendaftaran.edit', compact('pendaftaran'));
    }

    public function update(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        // Validasi data dengan mengabaikan email & NISN yang sudah ada
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|string|unique:pendaftaran,nisn,' . $id,
            'address' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'asal_sekolah' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'email' => 'required|email|unique:pendaftaran,email,' . $id,
        ]);

        // Update data
        $pendaftaran->update($validatedData);

        return redirect()->route('pendaftaran')->with('success', 'Data pendaftaran berhasil diperbarui.');
    }
    public  function show($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('backend.pendaftaran.show', compact('pendaftaran'));
    }
    public function updateStatus(Request $request, $id)
{
    $pendaftaran = Pendaftaran::findOrFail($id);
    $pendaftaran->status = $request->status;
    $pendaftaran->save();

    return redirect()->back()->with('success', 'Status berhasil diperbarui');
}  
    public function delete($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();

        return redirect()->route('pendaftaran')->with('success', 'Data pendaftaran berhasil dihapus.');
    }

    public function exportPDF()
    {
        $pendaftaran = Pendaftaran::all();
        $pdf = Pdf::loadView('backend.pendaftaran.pdf', compact('pendaftaran'));

        return $pdf->download('data_pendaftaran.pdf');
    }
}