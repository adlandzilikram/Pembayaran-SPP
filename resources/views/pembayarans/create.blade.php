@extends('template')
 
@section('content')

<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Create New Pembayaran</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="http://127.0.0.1:8000/pembayarans/"> Back</a>
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
 
<form action="{{ route('pembayarans.store') }}" method="POST">
    @csrf
 
     <div class="row">
        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID Petugas:</strong>
                <select name="id_petugas" class="form-control" id="id_petugas">
                <option value="">==-- Pilih Petugas--==</option>
                @foreach($user as $a)
                <option value="{{$a ->id_petugas}}">{{$a ->name}}</option>
                @endforeach
                </select>
                  </div>
        </div> -->

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NISN:</strong>
                <select onchange="getData()" name="nisn" class="form-control" id="nisn">
                <option value=""> ==-- Pilih Siswa --==</option>
                @foreach($viewsiswa as $b)
                <option value="{{$b ->nisn}}">{{$b ->nama}} - {{$b ->nisn}} - {{$b ->nominal}}</option>
                @endforeach
                </select>
                <!-- <input type="number" name="nisn" class="form-control" placeholder="NISN"> -->
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nominal:</strong>
                <input type="text" name="nominal" id="nominal" class="form-control" placeholder="nominal" readonly>
            </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Bulan Terakhir Bayar :</strong>
                   <input id="bulanTerakhir" type="text" class="form-control" name="bulan_akhir_bayar" placeholder="Bulan akhir Bayar" readonly>
                </div>
            </div>

        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal:</strong>
                <input type="date" name="tgl_bayar" class="form-control" placeholder="Tanggal Bayar">
            </div>
        </div> -->

        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bulan Bayar:</strong>
                <input type="text" name="bulan_dibayar" class="form-control" placeholder="bulan_bayar">
                <select name="bulan_dibayar" class="form-control" >
                <option value="disable"> -- Pilih Bulan --</option>
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
                </select>
            </div>
        </div> -->

        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tahun Bayar:</strong>
                <input type="number" name="tahun_dibayar" class="form-control" placeholder="Tahun Bayar">
            </div>
        </div> -->
        
        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID SPP:</strong>
                <select name="id_spp" class="form-control" id="id_spp">
                <option value=""> ==-- Pilih Tahun SPP -==</option>
                @foreach($spp as $s)
                <option value="{{$s ->id_spp}}">{{$s ->tahun}}</option>
                @endforeach
                </select>
                <input type="number" name="id_spp" class="form-control" placeholder="ID SPP">
            </div>
        </div> -->

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>jumlah Bayar:</strong>
                <input type="number" name="jumlah_bayar" class="form-control" placeholder="Jumlah Bayar">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
 
</form>
@endsection