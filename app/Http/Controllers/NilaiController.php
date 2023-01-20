<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Mengajar;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session('user')->role == 'guru') {
            $nilai = Nilai::whereHas('mengajar', function ($query){
                $query->where('guru_id', session('user')->id);
            })->get();
        }else {
            $nilai = Nilai::where('siswa_id', session('user')->id)->get();
        }
        return view('nilai.index', ['nilai' => $nilai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('nilai.create', [
        //     'siswa' => Siswa::all(),
        //     'mengajar' => Mengajar::all()
        // ]);
        $mengajar = Mengajar::Where('guru_id', session('user')->id);
        return view('nilai.create', [
            'mengajar' => $mengajar->get(),
            'siswa' => Siswa::whereIn('kelas_id', $mengajar->get('kelas_id'))->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_nilai = $request->validate([
            'mengajar_id' => 'required',
            'siswa_id' => 'required',
            'uh' => 'required|numeric',
            'uts' => 'required|numeric',
            'uas' => 'required|numeric'
        ]);
        $data_nilai['na'] = round(($request->uh + $request->uts + $request->uas)/3);
        Nilai::create($data_nilai);
        return redirect('/nilai/index')->with('success', 'Data Nilai Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        // return view('nilai.edit', [
        //     'nilai' => $nilai, 
        //     'mengajar' => Mengajar::all(),
        //     'siswa' => Siswa::all()
        // ]);
        $mengajar = Mengajar::Where('guru_id', session('user')->id);
        return view('nilai.edit', [
            'nilai' => $nilai,
            'mengajar' => $mengajar->get(),
            'siswa' => Siswa::whereIn('kelas_id', $mengajar->get('kelas_id'))->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        $data_nilai = $request->validate([
            'mengajar_id' => 'required',
            'siswa_id' => 'required',
            'uh' => 'required',
            'uts' => 'required',
            'uas' => 'required'
        ]);
        $data_nilai['na'] = round(($request->uh + $request->uts + $request->uas)/3);
        $nilai->update($data_nilai);
        return redirect('/nilai/index')->with('success', 'Data Nilai Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        $nilai->delete();
        return back()->with('success', "Data Nilai Berhasil Dihapus");
    }
}
