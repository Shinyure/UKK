@extends('layouts.tabelabsen')

@section('content')

@if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
@endif

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Absensi Pegawai</title>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
                                        <td>{{ $item->nip }}</td> 
                                        <td>{{ $item->nama }}</td> 
                                        <td>
                                            <input type="hidden" name="senin[{{ $loop->index }}]" value="0">
                                            <input type="checkbox" name="senin[{{ $loop->index }}]" value="1" {{ $item->senin ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="hidden" name="selasa[{{ $loop->index }}]" value="0">
                                            <input type="checkbox" name="selasa[ $loop->index ]" value="1" {{ $item->selasa ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="hidden" name="rabu[{{ $loop->index }}]" value="0">
                                            <input type="checkbox" name="rabu[ $loop->index ]" value="1" {{ $item->rabu ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="hidden" name="kamis{{ $loop->index }}]" value="0">
                                            <input type="checkbox" name="kamis[ $loop->index ]" value="1" {{ $item->kamis ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="hidden" name="jumat[{{ $loop->index }}]" value="0">
                                            <input type="checkbox" name="jumat[ $loop->index ]" value="1" {{ $item->jumat ? 'checked' : '' }}>
                                        </td>
                                        <td>{{ date('F', strtotime($item->bulan)) }}</td> 
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>

                        <!-- Tombol Save -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bulanModal">
                            Save
                        </button>

                        <!-- Modal Pilih Bulan -->
                        <div class="modal fade" id="bulanModal" tabindex="-1" aria-labelledby="bulanModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="bulanModalLabel">Pilih Bulan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="saveAbsensiForm" action="{{ route('absensi.store') }}" method="POST">
                                            @csrf
                                            
                                            <div class="form-group">
                                                <label for="bulan">Pilih Bulan</label>
                                                <select class="form-control" id="bulan" name="bulan" required>
                                                    <option value="January">January</option>
                                                    <option value="February">February</option>
                                                    <option value="March">March</option>
                                                    <option value="April">April</option>
                                                    <option value="May">May</option>
                                                    <option value="June">June</option>
                                                    <option value="July">July</option>
                                                    <option value="August">August</option>
                                                    <option value="September">September</option>
                                                    <option value="October">October</option>
                                                    <option value="November">November</option>
                                                    <option value="December">December</option>
                                                </select>
                                            </div>
                                            
                                            @foreach($absensi as $absen)
                                            <input type="hidden" name="nip[]" value="{{ $absen->nip }}">
                                            <input type="hidden" name="nama[]" value="{{ $absen->nama }}">
                                            @endforeach
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" form="saveAbsensiForm" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>

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
