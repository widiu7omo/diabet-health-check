<!-- Checkup Field -->
<div class="form-group col-sm-6">
    {!! Form::label('checkup', 'Checkup:') !!}
    {!! Form::text('checkup', null, ['class' => 'form-control']) !!}
</div>

<!-- Tgl Checkup Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tgl_checkup', 'Tgl Checkup:') !!}
    {!! Form::text('tgl_checkup', null, ['class' => 'form-control','id'=>'tgl_checkup']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tgl_checkup').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Lokasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lokasi', 'Lokasi:') !!}
    {!! Form::text('lokasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Catatan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('catatan', 'Catatan:') !!}
    {!! Form::textarea('catatan', null, ['class' => 'form-control']) !!}
</div>