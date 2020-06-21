@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Daftar TA
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Manajemen KP dan TA</a></li>
            <li class="active">Daftar TA</li>
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
        @if($list_pengajuan_ta->isEmpty() && Auth::user()->isMahasiswa())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Pengumuman!</h4>
                Silahkan Ajukan Tugas Akhir anda untuk melanjutkan tahapan berikutya!
            </div>

        @elseif(Auth::user()->isMahasiswa() && !Auth::user()->selesai_ta())
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Pengumuman!</h4>
                Silahkan Selesaikan pengajuan Ta anda sampai disetujui untuk melanjutkan!
            </div>
        @else
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Pengumuman!</h4>
                Selamat Pengajuan TA Anda Teleh Disetujui!
            </div>
        @endif
        <div class="row">
            <div class="col-xs-12">
                <!-- /.box -->

                <div class="box">
                    @if(Auth::user()->isMahasiswa() && !Auth::user()->selesai_ta())
                        <div class="box-body">
                            <div class="btn-group">
                                &nbsp;<a href="{{route('ta.create')}}">
                                    <button class="btn btn-block btn-primary btn-flat">Tambah Data Tugas Akhir</button>
                                </a>
                            </div>
                        </div>
                    @endif
                    <div class="box-body">
                        <table id="table_kp" class="table table-bordered table-striped">
                            <thead>
                            <tr align="center">
                                <th>No.</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Prodi</th>
                                <th>Bidang TA</th>
                                <th>Judul TA</th>
                                <th>Status</th>
                                @if(!Auth::user()->selesai_ta())
                                    <th>Aksi</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list_pengajuan_ta as $pengajuan_ta)
                                <tr>
                                    <td>{{$pengajuan_ta->id}}</td>
                                    <td>
                                        <a href="{{route('ta.edit', $pengajuan_ta->id)}}">{{$pengajuan_ta->user->no_identitas}}</a>
                                    </td>
                                    <td>{{$pengajuan_ta->user->nama}}</td>
                                    <td>{{$pengajuan_ta->user->prodi->nama_prodi}}</td>
                                    <td>{{$pengajuan_ta->bidang_ta}}</td>
                                    <td>{{$pengajuan_ta->judul_ta}}</td>
                                    <td class="text-uppercase">{{$pengajuan_ta->status}}</td>
                                    @if(!Auth::user()->selesai_ta())
                                        <td align="center"><a
                                                href="index.php?menu=5e223ef9ccb741abf1e6bbb26a0bbaa1&act=delete&id_pkp=aGo%3D"><i
                                                    class="fa fa-trash-o fa-lg" title="Delete"></i></a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['ta.destroy', $pengajuan_ta->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->        <!-- /.content -->
@endsection
@push('js')
    <script>
        $(function () {
            $("#table_kp").DataTable();
        })
    </script>
@endpush
