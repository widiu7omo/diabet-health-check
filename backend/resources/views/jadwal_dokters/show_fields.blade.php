<!-- Hari Field -->
<div class="col-sm-12">
    {!! Form::label('hari', 'Hari:') !!}
    <p>{{ $jadwalDokter->hari }}</p>
</div>

<!-- Jam Mulai Field -->
<div class="col-sm-12">
    {!! Form::label('jam_mulai', 'Jam Mulai:') !!}
    <p>{{ $jadwalDokter->jam_mulai }}</p>
</div>

<!-- Jam Selesai Field -->
<div class="col-sm-12">
    {!! Form::label('jam_selesai', 'Jam Selesai:') !!}
    <p>{{ $jadwalDokter->jam_selesai }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $jadwalDokter->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $jadwalDokter->updated_at }}</p>
</div>

