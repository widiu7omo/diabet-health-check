<!-- Dokter Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dokter_id', 'Dokter:') !!}
    {!! Form::select('dokter_id',$dokters, $selectedDokters, ['class' => 'form-control custom-select']) !!}
</div>
<!-- Hari Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hari', 'Hari:') !!}
    {!! Form::select('hari',$days, $selectedDay, ['class' => 'form-control custom-select']) !!}
</div>
<!-- Jam Mulai Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jam_mulai', 'Jam Mulai:') !!}
    {!! Form::text('jam_mulai', null, ['class' => 'form-control']) !!}
</div>

<!-- Jam Selesai Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jam_selesai', 'Jam Selesai:') !!}
    {!! Form::text('jam_selesai', null, ['class' => 'form-control']) !!}
</div>
@push('page_scripts')
<script>
    $(document).ready(function(){
        var jamMulai = document.getElementById("jam_mulai");
        var jamSelesai = document.getElementById('jam_selesai');
        var pickerMulai = new Picker(jamMulai, {
            format: 'HH:mm',
        });
        var pickerSelesai = new Picker(jamSelesai, {
            format: 'HH:mm',
        });
    })
</script>
@endpush