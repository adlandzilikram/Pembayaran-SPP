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


 <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-12">
             <div class="card warna" >
             <br>
             <br>
              <div class="row justify-content-center">
                 <h3 >Pembayaran</h3>
              </div>
                 <div class="center">
             <div class="float-right">
                 <a class="btn btn-success" href="{{ route('pembayarans.create') }}"> Pembayaran</a>
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
  
     <table id="example" class="display" style="width:100%"> 
         <thead>
         <tr class="table-secondary">
             <th width="20px" class="text-center">No</th>
             <th>ID Petugas</th>
             <th>NISN</th>
             <th>Nama</th>
             <th>Tanggal</th>
             <th>Bulan Bayar</th>
             <th>Tahun Bayar</th>
             <th>ID SPP</th>
             <th>Jumlah_bayar</th>
             <th width="280px"class="text-center">Action</th>
         </tr>
         </thead>
         @foreach ($viewpembayarans as $pembayaran)
         <tbody>
         <tr>
             <td class="text-center">{{ ++$i }}</td>
             <td>{{ $pembayaran->id_petugas }}</td>
             <td>{{ $pembayaran->nisn }}</td>
             <td>{{ $pembayaran->nama }}</td>
             <td>{{ $pembayaran->tgl_bayar }}</td>
             <td>{{ $pembayaran->bulan_dibayar }}</td>
             <td>{{ $pembayaran->tahun_dibayar }}</td>
             <td>{{ $pembayaran->id_spp }}</td>
             <td>Rp.{{ $pembayaran->jumlah_bayar }}</td>
             <td class="text-center">
                 <form action="{{ route('pembayarans.destroy',$pembayaran->id_pembayaran) }}" method="POST">
  
                     <a class="btn btn-primary btn-sm" href="{{ url('pembayarans/'.$pembayaran->id_pembayaran.'/edit') }}">Edit</a>
  
                     <a class="btn btn-info btn-sm" href="{{ url('pembayarans/'.$pembayaran->id_pembayaran.'/show') }}">Show</a>
 
                     @csrf
                     @method('DELETE')
  
                     <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                 </form>
             </td>
         </tr>
         </tbody>
         @endforeach
         </table>
    <script>
        $(document).ready(function() {
        $('#example').DataTable();
        } );
    </script>
     {!! $viewpembayarans->links() !!}
  
 @endsection
</body>
</html>