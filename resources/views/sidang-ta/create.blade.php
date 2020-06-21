@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Tambah Data Sidang Tugas Akhir
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Manajemen TA</a></li>
            <li class="active">Tambah Data Sidang TA</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="box">
                <div class="box-body">
                    <div class="col-md-7">
                        <div class="box box-info ">
                            <div class="box-header with-border text-center">
                                <h3 class="box-title">Form Data Tugas Akhirk</h3>
                            </div>
                            {!! Form::open(['route' => 'sidang-ta.store', 'method' =>'POST']) !!}
                            @include('sidang-ta.form')
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="box box-info ">
                            <div class="box-header with-border text-center">
                                <h3 class="box-title">Info</h3>
                            </div>
                            <div class="box-body">
                                <span>Isi Judul Dengan Judul TA yang telah disetujui !</span><hr>
                                <span>Isi Semua Dokumen Yang Diperlukan, Unutk mendapatkan Dokumen Yang berkaitan dengan akademik silahkan menghubungi bagian akademik !</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
