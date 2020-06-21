@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Master Data {{$title}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master Data</a></li>
            <li class="active">Data {{$title}}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                    <div class="box-body">
                        <div class="btn-group">
                            &nbsp;<a href="{{route('user.create')}}">
                                <button class="btn btn-block btn-primary btn-flat">Tambah Data</button>
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="table_user" class="table table-bordered table-striped">
                            <thead>
                            <tr align="center">
                                <th>No.</th>
                                <th>Nama {{$title}}</th>
                                <th>Identitas Login</th>
                                <th>Group Prodi</th>
                                <th>Aksi</th>
                            </tr>
                            <tbody>
                            @foreach($list_user as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->nama}}</td>
                                    <td>{{$user->no_identitas}}</td>
                                    <td>{{$user->prodi->nama_prodi}}</td>
                                    <td>
                                        <a href="{{route('user.edit', $user->id)}}"><i
                                                class="fa fa-pencil-square-o fa-lg" title="Update"></i></a> | <a
                                            href="index.php?menu=ee11cbb19052e40b07aac0ca060c23ee&act=delete&id_user=aw%3D%3D"><i
                                                class="fa fa-trash-o fa-lg" title="Delete"></i></a></td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
@endsection
@push('js')
    <script>
        $(function () {
            $("#table_user").DataTable();
        });
    </script>
@endpush
