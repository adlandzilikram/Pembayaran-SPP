@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Siswa</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ url('/siswas') }}"> Back</a>
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
 
    <form action="{{ url('siswas/'.$siswa->nisn.'/update') }}" method="POST">
        @csrf
        @method('PUT')
 
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NISN:</strong>
                    <input type="number" name="nisn" value="{{ $siswa->nisn }}" class="form-control" placeholder="NISN">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NIS:</strong>
                    <input type="number" name="nis" value="{{ $siswa->nis }}" class="form-control" placeholder="NIS">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama:</strong>
                    <input type="text" name="nama" value="{{ $siswa->nama }}" class="form-control" placeholder="Nama">
                </div>
            </div>
            <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ID Kelas:</strong>
                    <input type="number" name="id_kelas" value="{{ $siswa->id_kelas }}" class="form-control" placeholder="ID Kelas">
                </div>
            </div> -->

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID Kelas:</strong>
                <!-- <input type="number" name="id_distributor" class="form-control" placeholder="ID Distributor"> -->
                <select name="id_kelas" class="form-control" id="id_kelas">
                @foreach($kelas as $kelas)
                <option value="{{ $kelas->id_kelas }}">{{$kelas ->nama_kelas}}</option>
                @endforeach
                </select>
             </div>
        </div>

        
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alamat:</strong>
                    <input type="text" name="alamat" value="{{ $siswa->alamat }}" class="form-control" placeholder="Alamat">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>No Telepon:</strong>
                    <input type="number" name="no_telp" value="{{ $siswa->no_telp }}" class="form-control" placeholder="No Telepon">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ID SPP:</strong>
                    <select name="id_spp" class="form-control" id="id_spp">
                @foreach($spp as $spp)
                <option value="{{ $spp->id_spp }}">{{$spp ->tahun}}</option>
                @endforeach
                </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
 
    </form>
@endsection