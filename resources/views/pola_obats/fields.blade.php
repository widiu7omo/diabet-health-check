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
