<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <!-- 00. Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid col-md-7">
            <div class="navbar-brand">Simple To Do List</div>
            <!-- 
            <div class="navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Akun Saya
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                            <li><a class="dropdown-item" href="#">Update Data</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        -->
        </div>
    </nav>
    
    <div class="container mt-4">
        <!-- 01. Content-->
        <h1 class="text-center mb-4">To Do List</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
             <div class="card mb-3">
                <div class="card-body">

                    {{-- Ini tuh ngecek kalo di session ada yang namanya succes ga  --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- KALO ADA ERROR BAKAL TAMPIL DI SINI --}} 
                    @if ($errors->any()) 
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error ) {{-- BUAT NAMPILIN APA AJA ERROR NYA --}}
                                    <li>
                                        {{$error}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- 02. Form input data -->
                                         {{-- TAMBAH URL "url('/tudu')"  DI ACTION BIAR BISA AKSES SI WEB HALAMAN NYA, dan yang diakses nya cumman method post aja --}}
                                         {{-- tambahan biar ga bingung jadi manggilnya pake nama yng udah dikasih di route, manggilnya pake route --}}
                    <form id="todo-form" action="{{ route('tudu.post') }}" method="post"> <!--NAH INI YANG JADI POST NYA-->
                        @csrf <!--INI BUAT NANDAIN KALO FIRM YANG INI VALID, DAN DIDALAMNYA INI ADA TAMBAHAN INPUTAN DAN BANYAK ATTRIBUT-->
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="task" id="todo-input"
                                placeholder="Tambah task baru" required value="{{old('task')}}"> <!-- VALUE INI BUAT NAMPILIN APA AJA YANG DIINPUTKAN SEBELUMNYA -->
                            <button class="btn btn-primary" type="submit">
                                Simpan
                            </button>
                        </div>
                    </form>
                  </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <!-- 03. Searching -->
                        <form id="todo-form" action="" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" value="" 
                                    placeholder="masukkan kata kunci">
                                <button class="btn btn-secondary" type="submit">
                                    Cari
                                </button>
                            </div>
                        </form>  
                        
                        <ul class="list-group mb-4" id="todo-list">
                            @foreach ($data as $item) <!-- Ngambilnya dari $data yang ada di controller depan di index-->
                            <!-- 04. Display Data -->
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="task-text">{{ $item->task }}</span> <!-- NAH INI  NGAMBIL DARI DATA YANG DIJADIIN ITEM, NGAMBIL KOLOM TASK-->
                                <input type="text" class="form-control edit-input" style="display: none;"
                                    value="{{ $item->task }}">
                                <div class="btn-group">
                                    <button class="btn btn-danger btn-sm delete-btn">✕</button>
                                    <button class="btn btn-primary btn-sm edit-btn" data-bs-toggle="collapse"
                                                                {{-- nah  ini awaknya collapse-1. pas diklik semua data jadi keluar biar ga semua, cmn yg diklik aja jadi looping nya sesuai indexx yg cuman di klik aja     --}}
                                        data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="false">✎</button>
                                </div>
                            </li>
                            <!-- 05. Update Data -->
                            <li class="list-group-item collapse" id="collapse-{{ $loop->index }}">
                                                <!-- INI BUAT ROUTE BUAT AKSES KE HALAMAN NYA ATAU TERHUBUNG-->
                                <form action="{{ url('/tudu' .$item->id) }}" method="POST">
                                    @csrf
                                    @method('put') <!-- buat ngubah method post jadi put-->
                                    <div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="task"
                                                value="{{ $item->task }}">
                                            <button class="btn btn-outline-primary" type="button">Update</button>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="radio px-2">
                                            <label>
                                                <input type="radio" value="1" name="is_done" {{ $item->is_done == '1'?'checked':'' }}> Selesai
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" value="0" name="is_done" {{ $item->is_done == '0'?'checked':'' }}> Belum
                                            </label>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            @endforeach
                        </ul>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (popper.js included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>