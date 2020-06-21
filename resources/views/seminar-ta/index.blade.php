@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Daftar TA
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Manajemen Kp dan Ta</a></li>
            <li class="active">Daftar Ta</li>
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
        @if($list_seminar_ta->isEmpty() && Auth::user()->isMahasiswa())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Pengumuman!</h4>
                Silahkan Ajukan Untuk Mengikuti Seminar Tugas Akhir anda untuk melanjutkan tahapan berikutya!
            </div>
        @elseif(Auth::user()->isMahasiswa() && !Auth::user()->selesai_seminar_ta())
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Pengumuman!</h4>
                Silahkan Selesaikan pengajuan Ta anda sampai disetujui untuk melanjutkan!
            </div>
        @else
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Pengumuman!</h4>
                Selamat Seminar TA Anda Teleh Disetujui!
            </div>
        @endif
        <div class="row">
            <div class="col-xs-12">
                <!-- /.box -->

                <div class="box">
                    @if(Auth::user()->isMahasiswa() &&  (!Auth::user()->selesai_seminar_ta()))
                        <div class="box-body">
                            <div class="btn-group">
                                &nbsp;<a href="{{route('seminar-ta.create')}}" data-toggle="modal"
                                         class="config">
                                    <button class="btn btn-block btn-primary btn-flat">Tambah Data Seminar TA</button>
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
                                <th>Bidang Ta</th>
                                <th>Judul Ta</th>
                                <th>Status</th>
                                @if(!Auth::user()->selesai_seminar_ta())
                                    <th>Aksi</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list_seminar_ta as $seminar_ta)
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <a href="{{route('seminar-ta.edit', $seminar_ta->id)}}">{{$seminar_ta->tugas_akhir->user->no_identitas}}</a>
                                    </td>
                                    <td>{{$seminar_ta->tugas_akhir->user->nama}}</td>
                                    <td>{{$seminar_ta->tugas_akhir->user->prodi->nama_prodi}}</td>
                                    <td>{{$seminar_ta->tugas_akhir->bidang_ta}}</td>
                                    <td>{{$seminar_ta->tugas_akhir->judul_ta}}</td>
                                    <td class="text-uppercase">{{$seminar_ta->status}}</td>
                                    @if(!Auth::user()->selesai_seminar_ta())
                                        <td align="center">
                                            {!! Form::open(['method' => 'DELETE','route' => ['seminar-ta.destroy', $seminar_ta->id],'style'=>'display:inline']) !!}
                                            {!! Form::button('<i class="fa fa-trash fa-lg"></i>', ['class' => 'btn btn-sm btn-danger', 'type' =>'submit', 'title' =>'Hapus']) !!}
                                            {!! Form::close() !!}</i>
                                            @if(Auth::user()->isAdmin())
                                            {!! Form::open(['method' => 'PATCH','route' => ['seminar-ta.update', $seminar_ta->id],'style'=>'display:inline']) !!}
                                            {!! Form::input('hidden', 'status', 'setujui') !!}
                                            {!! Form::button('<i class="fa fa-check fa-lg"></i>', ['class' => 'btn btn-sm btn-success', 'type' =>'submit', 'title' =>'Setujui']) !!}
                                            {!! Form::close() !!}</i>
                                            @endif
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
