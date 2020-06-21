@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Tambah Data User
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Manajemen User</a></li>
            <li class="active">Tambah Data User</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="box">
                <div class="box-body">
                    <div class="col-md-7">
                        <div class="box box-info ">
                            <div class="box-header with-border text-center">
                                <h3 class="box-title">Form Data User</h3>
                            </div>
                            {!! Form::open(['route' => 'user.store', 'method' =>'POST']) !!}
                            @include('users.form')
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="box box-info ">
                            <div class="box-header with-border text-center">
                                <h3 class="box-title">Info</h3>
                            </div>
                            <div class="box-body">
                                <span>Isi Judul Dengan Judul Kerja Praktek Yang Anda Ambil !</span><hr>
                                <span>Isi Bagian Pembimbing dengan pembimbing yang telah anda pilih !</span><hr>
                                <span>Silahkan upload bukti Kwitansi Pembayaran Bimbingan KP !</span><hr>
                                <span>Silahkan upload bukti Kwitansi Pembayaran Buku Pedoman KP !</span><hr>
                                <span>Silahkan upload KRS semerter Yang sedang ditempuh !</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
