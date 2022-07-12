<!-- Obat Field -->
<div class="col-sm-12">
    {!! Form::label('obat', 'Obat:') !!}
    <p>{{ $polaObat->obat }}</p>
</div>

<!-- Jumlah Field -->
<div class="col-sm-12">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    <p>{{ $polaObat->jumlah }}</p>
</div>

<!-- Anjuran Field -->
<div class="col-sm-12">
    {!! Form::label('anjuran', 'Anjuran:') !!}
    <p>{{ $polaObat->anjuran }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $polaObat->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $polaObat->updated_at }}</p>
</div>

