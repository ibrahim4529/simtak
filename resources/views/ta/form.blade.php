<div class="box-body">
    <div class="form-group">
        {!! Form::label('Judul Tugas Akhir',null, ['class' =>" control-label"]) !!}
        {!! Form::textarea('judul_ta',null, ['class' => 'form-control', 'rows' =>'3']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Bidang Tugas Akhir',null, ['class' =>" control-label"]) !!}
        {!! Form::textarea('bidang_ta',null, ['class' => 'form-control', 'rows' =>'3']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Pembimbing 1', null, ['class' => 'control-label']) !!}
        {!! Form::select('id_pembimbing_1',$list_pembimbing,null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) !!}
    </div><div class="form-group">
        {!! Form::label('Pembimbing 2', null, ['class' => 'control-label']) !!}
        {!! Form::select('id_pembimbing_2',$list_pembimbing,null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Kwitansi Pembayaran Bimbingan Tugas Akhir', null, ['class' => 'control-label']) !!}
        {!! Form::file('dok_pem_bim_ta',null, array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Kwitansi Pembelian Buku Pedoman Tugas Akhir', null, ['class' => 'control-label']) !!}
        {!! Form::file('dok_pem_buku_pedoman',null, array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Kartu Rencana Studi (KRS)', null, ['class' => 'control-label']) !!}
        {!! Form::file('dok_krs',null, array('class'=>'form-control')) !!}
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

