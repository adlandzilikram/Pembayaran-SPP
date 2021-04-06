@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
             <div class="container-fluid">
                 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                         <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000/pembayarans">Pembayaran</a>
                      </li>
                       <li class="nav-item">
                         <a class="nav-link active"  aria-current="page" href="http://127.0.0.1:8000/kelass">Kelas</a>
                       </li>                     
                </ul>
      
    </div>
  </div>
</nav>
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                  anda adalah Petugas
                  </div>                           
            </div>
        </div>
    </div>
</div>
@endsection