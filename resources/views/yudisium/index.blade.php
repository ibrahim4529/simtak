@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Daftar Yusidium
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Data Transaksi</a></li>
            <li class="active">Daftar Yusidium</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @if ($message = Session::get('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Message!</h4>
                {{$message}} !
            </div>
        @endif
        @if($list_yudisium->isEmpty() && Auth::user()->isMahasiswa())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Pengumuman!</h4>
                Silahkan Ajukan Tugas Akhir anda untuk melanjutkan tahapan berikutya!
            </div>
        @elseif(Auth::user()->isMahasiswa() && !Auth::user()->selesai_yudisium())
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Pengumuman!</h4>
                Silahkan Selesaikan pengajuan Ta anda sampai disetujui untuk melanjutkan!
            </div>
        @else
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Pengumuman!</h4>
                Selamat Yudisium Anda Teleh Disetujui!
            </div>
        @endif
        <div class="row">
            <div class="col-xs-12">
                <!-- /.box -->

                <div class="box">
                    @if(Auth::user()->isMahasiswa() && !Auth::user()->selesai_yudisium())
                        <div class="box-body">
                            <div class="btn-group">
                                &nbsp;<a href="{{route('yudisium.create')}}">
                                    <button class="btn btn-block btn-primary btn-flat">Ajukan Data Yudisium</button>
                                </a>
                            </div>
                        </div>
                    @endif
                    <div class="box-body">
                        <table id="table_yudisium" class="table table-bordered table-striped">
                            <thead>
                            <tr align="center">
                                <th>No.</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Prodi</th>
                                <th>Judul Laporan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list_yudisium as $yudisium)
                                <tr>
                                    <td>{{$yudisium->id}}</td>
                                    <td>
                                        <a href="{{route('yudisium.edit', $yudisium->id)}}">{{$yudisium->user->no_identitas}}</a>
                                    </td>
                                    <td>{{$yudisium->user->nama}}</td>
                                    <td>{{$yudisium->user->prodi->nama_prodi}}</td>
                                    <td>{{$yudisium->judul_laporan}}</td>
                                    <td class="text-uppercase">{{$yudisium->status}}</td>
                                    <td align="center">
                                        {!! Form::open(['method' => 'DELETE','route' => ['yudisium.destroy', $yudisium->id],'style'=>'display:inline']) !!}
                                        {!! Form::button('<i class="fa fa-trash fa-lg"></i>', ['class' => 'btn btn-sm btn-danger', 'type' =>'submit', 'title' =>'Hapus']) !!}
                                        {!! Form::close() !!}</i>
                                        @if(Auth::user()->isAdmin())
                                        {!! Form::open(['method' => 'PATCH','route' => ['yudisium.update', $yudisium->id],'style'=>'display:inline']) !!}
                                        {!! Form::input('hidden', 'status', 'setujui') !!}
                                        {!! Form::button('<i class="fa fa-check fa-lg"></i>', ['class' => 'btn btn-sm btn-success', 'type' =>'submit', 'title' =>'Setujui']) !!}
                                        {!! Form::close() !!}</i>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->        <!-- /.content -->
@endsection
@push('js')
    <script>
        $(function () {
            $("#table_yudisium").DataTable({
                "language": {
                    "emptyTable": "Belum Ada Mahasiswa yang yudisium"
                }
            });
        })
    </script>
@endpush
