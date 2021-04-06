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
                <h3>Data SPP</h3>
             </div>
                <div class="center">
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('spps.create') }}"> Create SPP</a>
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
            <th>Tahun</th>
            <th>Nominal</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
    </thead>
        @foreach ($spps as $spp)
        <tbody>
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $spp->tahun }}</td>
            <td>{{ $spp->nominal }}</td>
            <td class="text-center">
                <form action="{{ route('spps.destroy',$spp->id_spp) }}" method="POST">
 
                    <a class="btn btn-info btn-sm" href="{{ url('spps/'.$spp->id_spp.'/show') }}">Show</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ url('spps/'.$spp->id_spp.'/edit') }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        </tbody>
        @endforeach
    </table>
 
    {!! $spps->links() !!}
 
@endsection