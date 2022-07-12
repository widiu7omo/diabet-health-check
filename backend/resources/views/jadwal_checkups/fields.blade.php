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
<!-- Pasiens Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pasien_id', 'Nama Pasiens:') !!}
    {!! Form::select('pasien_id', $pasiens,$selectedPasiens, ['class' => 'select2 form-control','id'=>"pasien_id",'required'=>'true']) !!}
</div>
@if(!isset($pemeriksaan))
    <!-- Pemeriksaan Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('pemeriksaan_id', 'Hasil Pemeriksaan:') !!}
        {!! Form::select('pemeriksaan_id', $pemeriksaans,$selectedPemeriksaans, ['class' => 'select2 form-control','id'=>"pemeriksaan_id",'required'=>'true']) !!}
    </div>
@endif
@role('Admin')
<!-- Pasiens Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dokter_id', 'Nama Dokter Pemeriksa:') !!}
    {!! Form::select('dokter_id', $dokters,$selectedDokters, ['class' => 'select2 form-control','id'=>"dokter_id",'required'=>'true']) !!}
</div>
@endrole
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
<!-- Status Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('status', 'Status Checkup:') !!}
    {!! Form::select('status', ['dijadwalkan'=>'dijadwalkan', 'selesai'=>'selesai', 'terlewat'=>'terlewat'],$selectedStatus, ['class' => 'form-control','placeholder'=>'Pilih status Checkup']) !!}
</div>
<!-- Catatan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('catatan', 'Catatan:') !!}
    {!! Form::textarea('catatan', null, ['class' => 'form-control']) !!}
</div>
