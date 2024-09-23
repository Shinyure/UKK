@extends('layouts.tabelabsen')

@section('content')

@if(session('success'))
    <p class="alert alert-success">{{session('success')}}</p>
@endif

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Absensi Pegawai</title>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    
    table, th, td {
        border: 1px solid black;
    }

    th {
        font-weight: bolder;
        font-size: 22px;
        text-align: center;
    }

    td {
        text-align: center;
        font-size: 20px;
    }

    th, td {
        padding: 10px;
    }

    .btn {
        float: right;
        margin-right: 20px;
    }

    /* Mengatur lebar per kolom */
    table th:nth-child(1), table td:nth-child(1) { /* Kolom NIP */
        width: 120px;
    }

    table th:nth-child(2), table td:nth-child(2) { /* Kolom Nama */
        width: 170px;
    }

</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">ATR/BPN RI</h1>

                    </div>

                    <h1 class="h3 mb-2 text-gray-800">Absensi</h1>
                    
                    <!-- Input Search untuk Nama -->
                    <input type="text" id="searchInput" onkeyup="searchName()" placeholder="Cari nama..." class="form-control mb-3" style="max-width: 300px;">

                    <!-- DataTales Example -->
                    <div class="table-responsive">
                        <form action="{{ route('absensi.store') }}" method="POST">
                            @csrf
                            
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Senin</th>
                                        <th>Selasa</th>
                                        <th>Rabu</th>
                                        <th>Kamis</th>
                                        <th>Jumat</th>
                                        <th>Bulan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($absensi as $item)
                                    <tr>
                                        <td>{{ $item->karyawan->nip }}</td>
                                        <td>{{ $item->karyawan->nama }}</td>
                                        <td>{{ $item->senin ? '✔' : '✘' }}</td>
                                        <td>{{ $item->selasa ? '✔' : '✘' }}</td>
                                        <td>{{ $item->rabu ? '✔' : '✘' }}</td>
                                        <td>{{ $item->kamis ? '✔' : '✘' }}</td>
                                        <td>{{ $item->jumat ? '✔' : '✘' }}</td>
                                        <td><span>{{ date('F') }}</span></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
        </div>
    </div>

    <script>
        function searchName() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let table = document.querySelector("table tbody");
            let rows = table.getElementsByTagName("tr");

            for (let i = 0; i < rows.length; i++) {
                let td = rows[i].getElementsByTagName("td")[1]; 
                if (td) {
                    let txtValue = td.textContent || td.innerText;
                    if (txtValue.toLowerCase().indexOf(input) > -1) {
                        rows[i].style.display = ""; 
                    } else {
                        rows[i].style.display = "none"; 
                    }
                }
            }
        }
    </script>

</body>

@endsection
