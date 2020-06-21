@extends('layouts.app')

@section('content')
    <div class="register-box">
        <div class="register-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Register a new membership</p>

            <form action="{{route('register')}}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input name="nama" type="text" class="form-control" placeholder="Nama Lengkap">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input name="no_identitas" type="text" class="form-control" placeholder="Nim">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input name="password" type="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input name="password_confirmation" type="password" class="form-control"
                           placeholder="Retype password">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="form-group">
                    <select name="id_prodi" class="form-control">
                        <option>Pilih Prodi</option>
                        @foreach($list_prodi as $prodi)
                            <option value="{{$prodi->id}}">{{$prodi->nama_prodi}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="jenis_kelamin" class="form-control">
                        <option>Pilih Jenis Kelamin</option>
                        <option value="laki-laki">Laki Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-xs-4 pull-right">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <a href="{{route('login')}}" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div>
@endsection
