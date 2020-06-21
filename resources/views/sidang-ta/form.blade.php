<div class="box-body">
    <div class="form-group">
        {!! Form::label('Judul Ta', null, ['class' => 'control-label']) !!}
        {!! Form::select('id_ta',$list_ta,null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Dokumen Form Pengajuan Sidang Tugas Akhir', null, ['class' => 'control-label']) !!}
        {!! Form::file('dok_form_pengajuan_sidang_ta',null, array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Dokumen Trasnkrip Nilai', null, ['class' => 'control-label']) !!}
        {!! Form::file('dok_transkrip_nilai',null, array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Dokumen Keterangan Lulus Praktikum', null, ['class' => 'control-label']) !!}
        {!! Form::file('dok_ket_lulus_praktikum',null, array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Kwitansi Pembayaran Sidang Tugas Akhir', null, ['class' => 'control-label']) !!}
        {!! Form::file('dok_pem_sidang_ta',null, array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Dokumen Keterangan Bebas UKT', null, ['class' => 'control-label']) !!}
        {!! Form::file('dok_ket_bebas_ukt',null, array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Kartu Tanda Lahir (AKTE KELAHIRAN)', null, ['class' => 'control-label']) !!}
        {!! Form::file('dok_akta_lahir',null, array('class'=>'form-control')) !!}
    </div><div class="form-group">
        {!! Form::label('Ijazah SMA', null, ['class' => 'control-label']) !!}
        {!! Form::file('dok_ijazah_sma',null, array('class'=>'form-control')) !!}
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

