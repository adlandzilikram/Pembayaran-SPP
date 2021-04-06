@extends('template')
 
@section('content')
<div onclick="print()">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Show Pembayaran</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('pembayarans.index') }}"> Back</a>
            </div>
        </div>
    </div>
 
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID Pembayaran:</strong>
                {{ $pembayaran->id_pembayaran }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID Petugas:</strong>
                {{ $pembayaran->id_petugas }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NISN:</strong>
                {{ $pembayaran->nisn }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Bayar:</strong>
                {{ $pembayaran->tgl_bayar }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bulan Bayar:</strong>
                {{ $pembayaran->bulan_dibayar }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tahun Bayar:</strong>
                {{ $pembayaran->tahun_dibayar }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID SPP:</strong>
                {{ $pembayaran->id_spp }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jumlah Bayar:</strong>
                {{ $pembayaran->jumlah_bayar }}
            </div>
        </div>
    </div>
</div>
        <script>
            function.print(){
                window.print();
            }
        </script>
@endsection