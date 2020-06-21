@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Dashboard
            <small>Utama</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Mahasiswa</span>
                        <span class="info-box-number">{{$jumlah_mahasiswa}} Orang</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-book"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Dosen</span>
                        <span class="info-box-number">{{$jumlah_dosen}} Orang</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-university"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Prodi</span>
                        <span class="info-box-number">{{$jumlah_prodi}} Prodi</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Admin</span>
                        <span class="info-box-number">{{$jumlah_admin}} Admin</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>
        </div>
    </section>
@endsection
