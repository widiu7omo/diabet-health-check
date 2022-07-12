@if(!isset($jadwalCheckup))
    <!-- Pemeriksaan Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('pemeriksaan_id', 'Hasil Pemeriksaan:') !!}
        {!! Form::select('pemeriksaan_id', $pemeriksaans,$selectedPemeriksaan, ['class' => 'form-control']) !!}
        <small class="text-black-50">Pilih Pemeriksaan</small>
    </div>
    <!-- Jadwal Checkup Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('jadwal_id', 'Hasil Checkup:') !!}
        {!! Form::select('jadwal_id', $jadwals,$selectedJadwal, ['class' => 'form-control']) !!}
        <small class="text-black-50">Pilih jadwal </small>
    </div>
@else
    {!! Form::hidden('pemeriksaan_id', $jadwalCheckup->pemeriksaan->id) !!}
    {!! Form::hidden('jadwal_id', $jadwalCheckup->id) !!}
@endif
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
