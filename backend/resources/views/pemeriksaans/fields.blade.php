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
<!-- Pasiens Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pasien_id', 'Nama Pasiens:') !!}
    {!! Form::select('pasien_id', $pasiens,$selectedPasiens, ['class' => 'select2 form-control','id'=>"pasien_id",'required'=>'true']) !!}
</div>

@role('Admin')
<!-- Pasiens Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dokter_id', 'Nama Dokter Pemeriksa:') !!}
    {!! Form::select('dokter_id', $dokters,$selectedDokters, ['class' => 'select2 form-control','id'=>"dokter_id",'required'=>'true']) !!}
</div>
@endrole
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

@push('page_scripts')
<script>
    $(document).ready(function(){
        var inputPemeriksaan = $("[name='pemeriksaan']");
        var selectPasien = $("[name='pasien_id']");
        var selectedPasienName = $("[name='pasien_id'] option:selected").text();
            inputPemeriksaan.val("Pemeriksaan pasien "+selectedPasienName);
            selectPasien.on("change",function(){
                selectedPasienName = $(this).children("option:selected").text();
                inputPemeriksaan.val("Pemeriksaan pasien "+selectedPasienName);
            })
    })
</script>
@endpush