<!-- Checkup Field -->
<div class="col-sm-12">
    {!! Form::label('checkup', 'Checkup:') !!}
    <p>{{ $jadwalCheckup->checkup }}</p>
</div>

<!-- Tgl Checkup Field -->
<div class="col-sm-12">
    {!! Form::label('tgl_checkup', 'Tgl Checkup:') !!}
    <p>{{ $jadwalCheckup->tgl_checkup }}</p>
</div>

<!-- Lokasi Field -->
<div class="col-sm-12">
    {!! Form::label('lokasi', 'Lokasi:') !!}
    <p>{{ $jadwalCheckup->lokasi }}</p>
</div>

<!-- Catatan Field -->
<div class="col-sm-12">
    {!! Form::label('catatan', 'Catatan:') !!}
    <p>{{ $jadwalCheckup->catatan }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $jadwalCheckup->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $jadwalCheckup->updated_at }}</p>
</div>

