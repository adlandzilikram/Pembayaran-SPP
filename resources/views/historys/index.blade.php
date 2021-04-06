@extends('layouts.app')
 
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <title>Document</title>
</head>
<body>

<style>
.warna {
  background-color: #716C6A;
  color: white;
  }
  </style>
<div class="container"   >
    <div class="row justify-content-center">
        <div class="col-md-12" >
            <div class="card warna">
            <br>
            <br>
            
             <div class="row justify-content-center" >
                <h3>History Pembayaran</h3>
             </div>
                <div class="center">
                
          <br>
          <br>
            </div>
            </div>
            <a href="{{route('history.export')}}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
 
    <table id="example" class="display" style="width:50%"> 
        <thead>
        <tr class="table-secondary">
            <th width="20px" class="text-center">No</th>
            <th>ID Petugas</th>
            <th>NISN</th>
            <th>Tanggal</th>
            <th>Bulan Dibayar</th>
            <th>Tahun Dibayar</th>
            <th>ID SPP</th>
            <th>Jumlah_bayar</th>
            <th>Nama Petugas</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Tahun</th>
            <th>Nominal</th>
        </tr>
        </thead>
        
        <tbody>
        @foreach ($viewbayar as $view)
        <tr>
        
            <td class="text-center">{{ ++$i }}</td>

            <td>{{ $view->id_petugas }}</td>
            <td>{{ $view->nisn }}</td>
            <td>{{ $view->tgl_bayar }}</td>
            <td>{{ $view->bulan_dibayar }}</td>
            <td>{{ $view->tahun_dibayar }}</td>
            <td>{{ $view->id_spp }}</td>
            <td>{{ $view->jumlah_bayar }}</td>
            <td>{{ $view->name }}</td>
            <td>{{ $view->nis }}</td>
            <td>{{ $view->nama }}</td>
            <td>{{ $view->nama_kelas }}</td>
            <td>{{ $view->tahun }}</td>
            <td>{{ $view->nominal }}</td>
           
        </tr>
        @endforeach
        </tbody>
        
    </table>
    <script>
        $(document).ready(function() {
        $('#example').DataTable();
        } );
    </script>
 
  
@endsection
</body>
</html>