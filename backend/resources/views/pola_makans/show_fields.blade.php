<!-- Category Field -->
<div class="col-sm-12">
    {!! Form::label('category', 'Category:') !!}
    <p>{{ $polaMakan->category }}</p>
</div>

<!-- Dilarang Field -->
<div class="col-sm-12">
    {!! Form::label('dilarang', 'Dilarang:') !!}
    <p>{{ $polaMakan->dilarang }}</p>
</div>

<!-- Dianjurkan Field -->
<div class="col-sm-12">
    {!! Form::label('dianjurkan', 'Dianjurkan:') !!}
    <p>{{ $polaMakan->dianjurkan }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $polaMakan->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $polaMakan->updated_at }}</p>
</div>

