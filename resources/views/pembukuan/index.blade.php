@extends('layouts.tabelbuku')

@section('content')

@if(session('success'))
    <p class="alert alert-success">{{session('success')}}</p>
@endif

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Absensi Pegawai</title>

<style>
    .row-header {
        font-weight: bold;
        font-size: 25px;
        text-align: center;
        background-color: #f8f9fa;
        padding: 10px;
    }

    .row-content {
        font-size: 25px;
        font-weight: 800;
        padding: 15px;
        border-bottom: 1px solid #ddd;
    }

    .row-content .action-btn {
        text-align: right;
    }

    .container-fluid {
        max-width: 100%;
        margin: 0 auto;
    }

    .content-box {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #ccc;
    }

    .content-box:last-child {
        border-bottom: none;
    }

    .keterangan {
        flex: 1;
        font-size: 25px;
        font-weight: 800;
        color: black;
    }

    .btn-info {
        font-size: 20px;
        padding: 8px 12px;
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
                    <h1 class="h3 mb-2 text-gray-800">Pembukuan Absen</h1>

                    <!-- Content Example (without table) -->
                    <div class="content-list">
                        <div class="row-header">
                            <div class="row">
                                <div class="col-8">Keterangan</div>
                                <div class="col-4">Action</div>
                            </div>
                        </div>
                        
                        <!-- List Items -->
                        <div class="content-box">
                            <div class="keterangan">Januari</div>
                            <div class="action-btn">
                                <a href="{{ route('pembukuan.januari') }}" class="btn btn-info">Show</a>
                            </div>
                        </div>

                        <div class="content-box">
                            <div class="keterangan">Februari</div>
                            <div class="action-btn">
                                <a href="{{ route('pembukuan.februari') }}" class="btn btn-info">Show</a>
                            </div>
                        </div>

                        <div class="content-box">
                            <div class="keterangan">Maret</div>
                            <div class="action-btn">
                                <a href="{{ route('pembukuan.maret') }}" class="btn btn-info">Show</a>
                            </div>
                        </div>

                        <div class="content-box">
                            <div class="keterangan">April</div>
                            <div class="action-btn">
                                <a href="{{ route('pembukuan.april') }}" class="btn btn-info">Show</a>
                            </div>
                        </div>

                        <div class="content-box">
                            <div class="keterangan">Mei</div>
                            <div class="action-btn">
                                <a href="{{ route('pembukuan.mei') }}" class="btn btn-info">Show</a>
                            </div>
                        </div>

                        <div class="content-box">
                            <div class="keterangan">Juni</div>
                            <div class="action-btn">
                                <a href="{{ route('pembukuan.juni') }}" class="btn btn-info">Show</a>
                            </div>
                        </div>

                        <div class="content-box">
                            <div class="keterangan">Juli</div>
                            <div class="action-btn">
                                <a href="{{ route('pembukuan.juli') }}" class="btn btn-info">Show</a>
                            </div>
                        </div>

                        <div class="content-box">
                            <div class="keterangan">Agustus</div>
                            <div class="action-btn">
                                <a href="{{ route('pembukuan.agustus') }}" class="btn btn-info">Show</a>
                            </div>
                        </div>

                        <div class="content-box">
                            <div class="keterangan">September</div>
                            <div class="action-btn">
                                <a href="{{ route('pembukuan.september') }}" class="btn btn-info">Show</a>
                            </div>
                        </div>

                        <div class="content-box">
                            <div class="keterangan">Oktober</div>
                            <div class="action-btn">
                                <a href="{{ route('pembukuan.oktober') }}" class="btn btn-info">Show</a>
                            </div>
                        </div>

                        <div class="content-box">
                            <div class="keterangan">November</div>
                            <div class="action-btn">
                                <a href="{{ route('pembukuan.november') }}" class="btn btn-info">Show</a>
                            </div>
                        </div>

                        <div class="content-box">
                            <div class="keterangan">Desember</div>
                            <div class="action-btn">
                                <a href="{{ route('pembukuan.desember') }}" class="btn btn-info">Show</a>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
@endsection
