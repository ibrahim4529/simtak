<div class="box-body">
    <div class="form-group has-feedback">
        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        {!! Form::text('no_identitas', null, ['class' => 'form-control']) !!}
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        {!! Form::password('password', ['class' => 'form-control']) !!}
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        {!! Form::password('password_confirmation', ['class' =>'form-control', 'placeholer'=>'Retry Password']) !!}
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
    </div>
    <div class="form-group">
       {!! Form::select('id_prodi', $list_prodi, null,['class' => 'form-control', 'placeholder' => 'Pilih Prodi']) !!}
    </div>
    <div class="form-group">
        {!! Form::select('id_level_user', $list_level, null,['class' => 'form-control', 'placeholder' => 'Pilih Level User']) !!}
    </div>
    <div class="form-group">
        {!! Form::select('jenis_kelamin', ['laki-laki' => 'Laki-Laki','perempuan' =>'Perempuan' ], null,['class' => 'form-control', 'placeholder' => 'Pilih Jenis Kelamin']) !!}

    </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
    <button type="submit" class="btn btn-info pull-right">Simpan</button>
</div>

