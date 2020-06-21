@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Master Data Program Studi
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master Data</a></li>
            <li class="active">Data Program Studi</li>
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
                            &nbsp;<a href="?menu=32b404761d910d277789cd91076d1459&act=tambah" data-toggle="modal"
                                     class="config">
                                <button class="btn btn-block btn-primary btn-flat">Tambah Data</button>
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="table_prodi" class="table table-bordered table-striped">
                            <thead>
                            <tr align="center">
                                <th>id.</th>
                                <th>Kode Program Studi</th>
                                <th>Nama Program Studi</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list_prodi as $prodi)
                                <tr>
                                    <td>{{$prodi->id}}</td>
                                    <td>{{$prodi->kd_prodi}}</td>
                                    <td>{{$prodi->nama_prodi}}</td>
                                    <td>
                                        <a href="index.php?menu=32b404761d910d277789cd91076d1459&act=edit&id_prodi=aQ%3D%3D"><i
                                                class="fa fa-pencil-square-o fa-lg" title="Update"></i></a> | <a
                                            href="index.php?menu=32b404761d910d277789cd91076d1459&act=delete&id_prodi=aQ%3D%3D"><i
                                                class="fa fa-trash-o fa-lg" title="Delete"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section>
@endsection
@push('js')
    <script !src="">
        $(function () {
            $("#table_prodi").DataTable();
        });
    </script>
@endpush
