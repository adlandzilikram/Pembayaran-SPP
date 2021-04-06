@extends('layouts.app')
 
@section('content')
<style>
.warna {
  background-color: #716C6A;
  color: white;
  }
  </style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card warna">
            <br>
            <br>
             <div class="row justify-content-center">
                <h3>Data Petugas</h3>
             </div>
                <div class="center">
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('petugass.create') }}"> Create Petugas</a>
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
            <th>Username</th>
            <th>Password</th>
            <th>Nama Petugas</th>
            <th>Level</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        </thead>
        @foreach ($petugass as $petugas)
        <tbody>
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $petugas->username }}</td>
            <td>{{ $petugas->password }}</td>
            <td>{{ $petugas->nama_petugas }}</td>
            <td>{{ $petugas->level }}</td>
            <td class="text-center">
                <form action="{{ route('petugass.destroy',$petugas->id_petugas) }}" method="POST">
 
                    <a class="btn btn-info btn-sm" href="{{ url('petugass/'.$petugas->id_petugas.'/show') }}">Show</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ url('petugass/'.$petugas->id_petugas.'/edit') }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        </tbody>
        @endforeach
    </table>
 
    {!! $petugass->links() !!}
 
@endsection