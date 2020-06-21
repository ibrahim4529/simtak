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

    @if(Auth::user()->isAdmin())
        <section class="content">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Mahasiswa</span>
                            <span class="info-box-number">
		  {{$jumlah['mahasiswa']}} Orang          </span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-book"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Dosen</span>
                            <span class="info-box-number">
          {{$jumlah['dosen']}} Orang          </span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-university"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Prodi</span>
                            <span class="info-box-number">
          {{$jumlah['prodi']}} Prodi        </span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Admin</span>
                            <span class="info-box-number">
          {{$jumlah['admin']}} Admin
          </span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>
                <!-- /.col -->
                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

            </div>
            <div class="row">
                <!-- Left col -->
                <div class="col-md-8">
                    <div class="box box-success">
                        <div class="box-header with-border text-center">
                            <h3 class="box-title">Selamat Datang di Sistem Informasi Tugas Akhir</h3>
                        </div>
                        <div class="box-body">
                            <span class="info-box-text">Nama : {{Auth::user()->nama}}</span>
                            <span class="info-box-text">Status : {{Auth::user()->level_user->nama}} Sejak {{Auth::user()->created_at->diffForHumans()}}</span>
                            <span class="info-box-text">Jurusan : {{Auth::user()->prodi->nama_prodi}}</span>
                            <div class="info-box-content">
                                <div class="info-box">
                                    <span class="info-box-icon"><i class="fa fa-graduation-cap"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Mengurus : {{$jumlah['mahasiswa']}} Mahasiswa</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                    </div>
                </div>
                <div class="col-md-4">
                @foreach($selesai as $key => $value)<!-- /.col -->
                    <div
                        class="info-box @if($value == 0) bg-red @elseif($value > 0 && $value < ( $value/2)) bg-yellow @else bg-success @endif">
                        <span class="info-box-icon"><i class="fa fa-graduation-cap"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Daftar {{$key}}</span>
                            <span class="info-box-number">
          {{$value}} dari {{$jumlah['mahasiswa']}}  </span>
                            <div class="progress">
                                <div class="progress-bar"
                                     style="width: {{intval($value/$jumlah['mahasiswa']*100)}}%"></div>
                            </div>
                            <span class="progress-description">
            {{intval($value/$jumlah['mahasiswa']*100)}}% Selesai
          </span>
                        </div><!-- /.info-box-content -->
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    @else
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="info-box bg-aqua-active">
                        <span class="info-box-icon"><i class="fa fa-graduation-cap"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Nama Lengkap : {{Auth::user()->nama}}</span>
                            <span class="info-box-text">Nim : {{Auth::user()->no_identitas}}</span>
                            <span class="info-box-text">Prodi : {{Auth::user()->prodi->nama_prodi}}</span>
                            <span class="info-box-text">Jenis Kelamin : {{Auth::user()->jenis_kelamin}}</span>
                            <span
                                class="info-box-text">Status : {{Auth::user()->level_user->nama}} Sejak {{Auth::user()->created_at->diffForHumans()}}</span>
                        </div><!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="fa fa-graduation-cap"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Progress Penyelesaian Tugas Ahir Sampai Yudisium</span>
                            <span class="info-box-number">
          {{$jumlah_tahap}} dari {{sizeof($tahap)}} Tahap     </span>
                            <div class="progress">
                                <div class="progress-bar"
                                     style="width: {{intval(($jumlah_tahap/sizeof($tahap))*100)}}%"></div>
                            </div>
                            <span class="progress-description">
            {{intval(($jumlah_tahap/sizeof($tahap))*100)}}% Tahap Selesai
          </span>
                        </div><!-- /.info-box-content -->
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($tahap as $key => $value)
                    <div class="col-md-3">
                        <div class="info-box @if($value) bg-green @else bg-yellow-active @endif">
                            <span class="info-box-icon"><i class="fa fa-graduation-cap"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{$key}}</span>
                                <span class="info-box-text">Status: @if($value) Selesai @else Belum
                                    Selesai @endif</span>
                                @if(!$value)
                                    <button class="btn btn-flat pull-right btn-success">Selesaikan</button>
                                @endif
                            </div><!-- /.info-box-content -->
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
@endsection
