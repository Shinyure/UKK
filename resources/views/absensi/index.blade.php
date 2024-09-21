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
    /* Memperbesar ukuran checkbox */
    input[type="checkbox"] {
        width: 25px;    
        height: 25px;
    }

    /* Hapus ikon kalender dan gantikan dengan teks */
    td.tanggal-row:first-child input[type="date"] {
        display: none; /* Sembunyikan input type date */
    }


    input[type="date"]::-webkit-calendar-picker-indicator {
        opacity: 0; /* Menyembunyikan picker default */
    }

        /* Mengatur lebar per kolom */
    table th:nth-child(1), table td:nth-child(1) { /* Kolom NIP */
        width: 120px;
    }

    table th:nth-child(2), table td:nth-child(2) { /* Kolom Nama */
        width: 170px;
    }

    table th:nth-child(3), table th:nth-child(4), 
    table th:nth-child(5), table th:nth-child(6), 
    table th:nth-child(7), table td:nth-child(3), 
    table td:nth-child(4), table td:nth-child(5), 
    table td:nth-child(6), table td:nth-child(7) { /* Kolom Hari */
        width: 20px;
    }

    table th:nth-child(8), table td:nth-child(8) { /* Kolom Tanggal */
        width: 10px;
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
                                            <th>Tanggal</th> <!-- Tambahkan kolom Tanggal -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($karyawan as $item)
                                        <tr>
                                            <td>{{ $item->nip }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <!-- Ubah kolom hari menjadi checkbox -->
                                            <td>
                                                <input type="hidden" name="senin[{{ $item->nip }}]" value="0">
                                                <input type="checkbox" name="senin[{{ $item->nip }}]" value="1">
                                            </td>
                                            <td>
                                                <input type="hidden" name="selasa[{{ $item->nip }}]" value="0">
                                                <input type="checkbox" name="selasa[{{ $item->nip }}]" value="1">
                                            </td>
                                            <td>
                                                <input type="hidden" name="rabu[{{ $item->nip }}]" value="0">
                                                <input type="checkbox" name="rabu[{{ $item->nip }}]" value="1">
                                            </td>
                                            <td>
                                                <input type="hidden" name="kamis[{{ $item->nip }}]" value="0">
                                                <input type="checkbox" name="kamis[{{ $item->nip }}]" value="1">
                                            </td>
                                            <td>
                                                <input type="hidden" name="jumat[{{ $item->nip }}]" value="0">
                                                <input type="checkbox" name="jumat[{{ $item->nip }}]" value="1">
                                            </td>

                                        <!-- Kolom tanggal hanya tampil di baris pertama -->
                                            @if ($loop->first)
                                                <td class="tanggal-row"></td> <!-- Menampilkan rentang tanggal di sini -->
                                            @else
                                                <td></td> <!-- Baris lainnya kosong untuk kolom tanggal -->
                                            @endif
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
            // Ambil input
            let input = document.getElementById("searchInput").value.toLowerCase();
            // Ambil tabel
            let table = document.querySelector("table tbody");
            // Ambil semua baris dari tabel
            let rows = table.getElementsByTagName("tr");

            // Looping melalui semua baris dan sembunyikan yang tidak cocok
            for (let i = 0; i < rows.length; i++) {
                let td = rows[i].getElementsByTagName("td")[1]; // Kolom nama ada di index ke-1
                if (td) {
                    let txtValue = td.textContent || td.innerText;
                    if (txtValue.toLowerCase().indexOf(input) > -1) {
                        rows[i].style.display = ""; // Tampilkan baris yang cocok
                    } else {
                        rows[i].style.display = "none"; // Sembunyikan baris yang tidak cocok
                    }
                }
            }
        }
    </script>

    <script>
        // Fungsi untuk mendapatkan tanggal Senin minggu ini
        function getMonday(d) {
            d = new Date(d);
            var day = d.getDay(),
                diff = d.getDate() - day + (day === 0 ? -6 : 1); // Menyesuaikan jika hari Minggu
            return new Date(d.setDate(diff));
        }

        // Fungsi untuk menghitung tanggal Senin dan Jumat minggu ini
        function getWeekRange() {
            let today = new Date();
            let monday = getMonday(today);
            let friday = new Date(monday);
            friday.setDate(monday.getDate() + 4); // Jumat adalah 4 hari setelah Senin

            // Format bulan dalam 3 huruf (contoh: 'Sept')
            let month = monday.toLocaleString('en-US', { month: 'short' });
            
            // Dapatkan tanggal hari Senin dan Jumat
            let startDay = monday.getDate();
            let endDay = friday.getDate();

            // Gabungkan dalam format "MMM-DD/DD"
            return `${month}-${startDay}/${endDay}`;
        }

        // Fungsi untuk menampilkan tanggal range hanya di baris pertama
        function displayWeekRange() {
            let weekRange = getWeekRange(); // Dapatkan rentang tanggal minggu ini
            let firstRowDateCell = document.querySelector('tbody tr:first-child td.tanggal-row'); // Kolom tanggal pada baris pertama

            if (firstRowDateCell) {
                firstRowDateCell.textContent = weekRange; // Set teks range minggu
            }
        }

        // Panggil fungsi setelah halaman dimuat
        window.onload = displayWeekRange;
    </script>


</body>

@endsection
