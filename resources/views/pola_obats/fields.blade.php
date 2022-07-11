<!-- Obat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('obat', 'Obat:') !!}
    {!! Form::text('obat', null, ['class' => 'form-control']) !!}
</div>

<!-- Jumlah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    {!! Form::number('jumlah', null, ['class' => 'form-control']) !!}
</div>

<!-- Anjuran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('anjuran', 'Anjuran:') !!}
    {!! Form::text('anjuran', null, ['class' => 'form-control']) !!}
</div>