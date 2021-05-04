@extends('mahasiswas.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Karyawan</h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('mahasiswas.create') }}" class="btn btn-success">Tambah Mahasiswa</a>
            </div>    
        </div>    
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <form action="{{ url()->current() }}">
                <div class="pull-right">
                    <h6>Nama &nbsp;</h6>
                    <input type="text" class="typeahead form-control" name="nama">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <a href="{{ route('mahasiswas.index') }}" class="btn btn-success">reset</a>
                </div>
            </form>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Kode Tugas</th>
                <th>Gaji Pokok</th>
                <th>Lembur</th>
                <th>Tunjangan Jabatan</th>
                <th>Tunjangan Anak</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        @foreach ($mahasiswas as $karyawan)
            <tr>
                <td>{{ $karyawan->id }}</td>
                <td>{{ $karyawan->nama }}</td>
                <td>{{ $karyawan->jabatan }}</td>
                <td>{{ $karyawan->kd_tugas }}</td>
                <td>{{ $karyawan->gapok }}</td>
                <td>{{ $karyawan->lembur }}</td>
                <td>{{ $karyawan->tj_jabatan }}</td>
                <td>{{ $karyawan->tj_anak }}</td>
                <td>
                    <form action="{{route('mahasiswas.destroy', $karyawan->id)}}" method="POST">
                        {{-- <a class="btn btn-info" href="{{ route('mahasiswas.show', $karyawan->id)}}">Show</a> --}}
                        <a class="btn btn-primary" href="{{ route('mahasiswas.edit', $karyawan['id'])}}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Apakah Data Yakin Dihapus?')" class="btn btn-primary">Submit</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $mahasiswas->links() !!}    
@endsection