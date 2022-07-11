<!-- Pemeriksaan Field -->
<div class="col-sm-12">
    {!! Form::label('pemeriksaan', 'Pemeriksaan:') !!}
    <p>{{ $pemeriksaan->pemeriksaan }}</p>
</div>

<!-- Tgl Periksa Field -->
<div class="col-sm-12">
    {!! Form::label('tgl_periksa', 'Tgl Periksa:') !!}
    <p>{{ $pemeriksaan->tgl_periksa }}</p>
</div>

<!-- Detail Pembahasan Field -->
<div class="col-sm-12">
    {!! Form::label('detail_pembahasan', 'Detail Pembahasan:') !!}
    <p>{{ $pemeriksaan->detail_pembahasan }}</p>
</div>

<!-- Hasil Diagnosa Field -->
<div class="col-sm-12">
    {!! Form::label('hasil_diagnosa', 'Hasil Diagnosa:') !!}
    <p>{{ $pemeriksaan->hasil_diagnosa }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $pemeriksaan->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $pemeriksaan->updated_at }}</p>
</div>

