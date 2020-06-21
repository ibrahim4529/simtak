<div class="box-body">
    <div class="form-group">
        {!! Form::label('Judul Laporan', null, ['class' => 'control-label']) !!}
        {!! Form::textarea('judul_laporan',null, array('class'=>'form-control', 'placeholder'=>'Judul Laporan', 'rows'=> '3')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Dokumen Form Pengajuan Yudisium', null, ['class' => 'control-label']) !!}
        {!! Form::file('dok_form_pengajuan_yudisium',null, array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Dokumen CV', null, ['class' => 'control-label']) !!}
        {!! Form::file('dok_cv',null, array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Dokumen Keterangan Bebas Keuagan', null, ['class' => 'control-label']) !!}
        {!! Form::file('dok_ket_bebas_keuangan',null, array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Kwitansi Pembayaran Bebas Pustaka (*Prodi)', null, ['class' => 'control-label']) !!}
        {!! Form::file('dok_pem_sidang_ta',null, array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Dokumen Keterangan Bebas PUSTAKA(*perpus)', null, ['class' => 'control-label']) !!}
        {!! Form::file('dok_ket_bebas_pustaka',null, array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Dokumen Keterangan Bebas LAB', null, ['class' => 'control-label']) !!}
        {!! Form::file('dok_ket_bebas_lab',null, array('class'=>'form-control')) !!}
    </div><div class="form-group">
        {!! Form::label('Dokumen Keterangan Bebas Revisi', null, ['class' => 'control-label']) !!}
        {!! Form::file('dok_ket_bebas_revisi',null, array('class'=>'form-control')) !!}
    </div>
    @if(Auth::user()->isAdmin())
        <div class="form-group">
            {!! Form::label('Status', null, ['class' => 'control-label']) !!}
            {!! Form::select('status',['pengajuan' =>'Pengajuan', 'revisi' => 'Revisi','setujui' => 'Setujui', 'tinjau_ulang' => 'Tinjau Ulang', 'tolak' => 'Tolak'],null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Keterangan',null, ['class' =>" control-label"]) !!}
            {!! Form::textarea('keterangan',null, ['class' => 'form-control', 'rows' =>'3']) !!}
        </div>
    @endif
</div>
<!-- /.box-body -->
<div class="box-footer">
    <button type="submit" class="btn btn-info pull-right">Simpan</button>
</div>

