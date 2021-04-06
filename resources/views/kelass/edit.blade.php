@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Kelas</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ url('/kelass') }}"> Back</a>
            </div>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    <form action="{{ url('kelass/'.$kelas->id_kelas.'/update') }}" method="POST">
        @csrf
        @method('PUT')
 
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Kelas:</strong>
                    <input type="text" name="nama_kelas" value="{{ $kelas->nama_kelas }}" class="form-control" placeholder="Nama Kelas">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kompetensi Keahlian:</strong>
                    <textarea class="form-control" style="height:150px" name="kompetensi_keahlian" placeholder="Kompotensi Keahlian">{{ $kelas->kompetensi_keahlian }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
 
    </form>
@endsection