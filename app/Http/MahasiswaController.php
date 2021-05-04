<?php

namespace praktikkum2\Http\Controllers;

use praktikkum2\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller

{
public function index(request $request)
{
	$karyawans = Mahasiswa::latest()->paginate(10);
	return view('mahasiswas.index', compact('mahasiswas'))->with('i', (request()->input('page', 1) - 1) * 5);
}
public function store(Request $request)
{
//
$request->validate([
'nama' => 'required',
'nim' => 'required',
'email' => 'required',
]);
Mahasiswa::create($request->all());
return redirect()->route('mahasiswas.index')->with('success','mahasiswa berhasil ditambahkan.');
}

public function edit(Karyawan $karyawan)
{
//
return view('karyawans.edit',compact('karyawan'));
}

public function update(Request $request, Karyawan $karyawan)
{
//
$request->validate([
'nama' => 'required',
'jabatan' => 'required',
'kd_tugas' => 'required',
'gapok' => 'required',
]);
$karyawan->update($request->all());
return redirect()->route('karyawans.index')
->with('success','Karyawan berhasil diubah.');

}

public function destroy(Karyawan $karyawan){
	$karyawan->delete();
	return redirect()->route('karyawans.index')->with('success','Karyawan berhasil dihapus');
}
}