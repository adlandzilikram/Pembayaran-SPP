<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

 <!-- datatable -->
 

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js" integrity="sha512-/DXTXr6nQodMUiq+IUJYCt2PPOUjrHJ9wFrqpJ3XkgPNOZVfMok7cRw6CSxyCQxXn6ozlESsSh1/sMCTF1rL/g==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <!-- Select2 --> 
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Spp E learning
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                  
                    @if(auth()->user()->is_admin == 1)
                    <li class="nav-item">
                         <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000/siswas">Siswa</a>
                      </li>
                       <li class="nav-item">
                         <a class="nav-link active"  aria-current="page" href="http://127.0.0.1:8000/kelass">Kelas</a>
                       </li>
                       <li class="nav-item dropdown">
                     </li>
                        <li class="nav-item">
                        <a class="nav-link active"  aria-current="page" href="http://127.0.0.1:8000/petugass" >Petugas</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active"  aria-current="page" href="http://127.0.0.1:8000/spps" >SPP</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active"  aria-current="page" href="http://127.0.0.1:8000/pembayarans" >Pembayaran</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active"  aria-current="page" href="http://127.0.0.1:8000/historys" >History</a>
                        </li>
                      @elseif(auth()->user()->is_admin == 2)
                      <li class="nav-item">
                        <a class="nav-link active"  aria-current="page" href="http://127.0.0.1:8000/pembayarans" >Pembayaran</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active"  aria-current="page" href="http://127.0.0.1:8000/historys" >History</a>
                        </li>
                      @else
                      <li class="nav-item">
                        <a class="nav-link active"  aria-current="page" href="http://127.0.0.1:8000/historys" >History</a>
                        </li>
                    @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    <script>
        function getData(){
                    var nisn = $('#nisn').val();
                    console.log(nisn);

                    $.ajax({
                        url:"{{url('pembayaranGetdata/')}}" + '/' + nisn,
                        type:'GET',
                        success:function(data){
                            if(data['harga'] == null){
                                $('#nominal').val('belum pernah bayar'); 
                                 $('#bulanTerakhir').val('belum pernah bayar');
                            }else{
                                var isi = data['bulan'] + " " + data['tahun'];
                                 $('#nominal').val(data['harga']); 
                                 $('#bulanTerakhir').val(isi);
                            }    
                        }
                    })
                }
   </script>

<script>
$(document).ready(function(){ 
        // Initialize select2
        $("#nisn").select2();
    });
</script>

</body>
</html>
