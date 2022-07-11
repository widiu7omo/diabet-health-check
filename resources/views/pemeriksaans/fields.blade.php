<!-- Pemeriksaan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pemeriksaan', 'Pemeriksaan:') !!}
    {!! Form::text('pemeriksaan', null, ['class' => 'form-control']) !!}
</div>

<!-- Tgl Periksa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tgl_periksa', 'Tgl Periksa:') !!}
    {!! Form::text('tgl_periksa', null, ['class' => 'form-control','id'=>'tgl_periksa']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tgl_periksa').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Detail Pembahasan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('detail_pembahasan', 'Detail Pembahasan:') !!}
    {!! Form::textarea('detail_pembahasan', null, ['class' => 'form-control']) !!}
</div>

<!-- Hasil Diagnosa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hasil_diagnosa', 'Hasil Diagnosa:') !!}
    {!! Form::text('hasil_diagnosa', null, ['class' => 'form-control']) !!}
</div>