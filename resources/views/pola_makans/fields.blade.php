<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::text('category', null, ['class' => 'form-control']) !!}
    <small class="text-black-50">Contoh: makan siang, makan malam, snack</small>
</div>

<!-- Dilarang Field -->
<div class="form-group col-sm-12">
    {!! Form::label('dilarang', 'Dilarang:') !!}
    {!! Form::textarea('dilarang', null, ['class' => 'form-control']) !!}
</div>

<!-- Dianjurkan Field -->
<div class="form-group col-sm-12">
    {!! Form::label('dianjurkan', 'Dianjurkan:') !!}
    {!! Form::textarea('dianjurkan', null, ['class' => 'form-control']) !!}
</div>
