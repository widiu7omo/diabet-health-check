<!-- Obat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('obat', 'Obat:') !!}
    {!! Form::text('obat', null, ['class' => 'form-control']) !!}
    <small class="text-black-50">Contoh: Parasetamol</small>
</div>

<!-- Jumlah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    {!! Form::number('jumlah', null, ['class' => 'form-control']) !!}
    <small class="text-black-50">Contoh: 10 kaplet</small>
</div>

<!-- Anjuran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('anjuran', 'Anjuran:') !!}
    {!! Form::text('anjuran', null, ['class' => 'form-control']) !!}
    <small class="text-black-50">Contoh: 3 kali sehari</small>
</div>
