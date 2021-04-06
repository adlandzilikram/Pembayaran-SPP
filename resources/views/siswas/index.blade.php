@extends('layouts.app')
 
@section('content')
<style>
.warna {
  background-color: #716C6A;
  color: white;
  }
  </style>
<<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card warna">
            <br>
            <br>
          
             <div class="row justify-content-center">
                <h3>Data Siswa</h3>
             </div>
                <div class="center">
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('siswas.create') }}"> Create Siswa</a>
            </div>
            </div>
            </div>
          
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
 
    <table class="table table-bordered">
    <thead>
        <tr class="table-secondary">
            <th width="20px" class="text-center">No</th>
            <th>NISN</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>ID Kelas</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>ID SPP</th>
            <th>Tahun</th>
            <th>Nominal</th>
            <th>Nama Kelas</th>
            <th>Kompetensi Keahlian</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        </thead>
        @foreach ($view as $siswa)
        <tbody>
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $siswa->nisn }}</td>
            <td>{{ $siswa->nis }}</td>
            <td>{{ $siswa->nama }}</td>
            <td>{{ $siswa->id_kelas }}</td>
            <td>{{ $siswa->alamat }}</td>
            <td>{{ $siswa->no_telp }}</td>
            <td>{{ $siswa->id_spp }}</td>
            <td>{{ $siswa->tahun }}</td>
            <td>{{ $siswa->nominal }}</td>
            <td>{{ $siswa->nama_kelas }}</td>
            <td>{{ $siswa->kompetensi_keahlian }}</td>
            <td class="text-center">
                <form action="{{ route('siswas.destroy',$siswa->nisn) }}" method="POST">
 
                    <a class="btn btn-info btn-sm" href="{{ url('siswas/'.$siswa->nisn.'/show') }}">Show</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ url('siswas/'.$siswa->nisn.'/edit') }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        </tbody>
        @endforeach
    </table>
 
    {!! $siswas->links() !!}
 
@endsection