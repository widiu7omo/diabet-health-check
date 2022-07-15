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
@else
    {!! Form::hidden('pemeriksaan_id', $pemeriksaan->id) !!}
@endif
@role('Admin')
<!-- Pasiens Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dokter_id', 'Nama Dokter Pemeriksa:') !!}
    {!! Form::select('dokter_id', $dokters,$selectedDokters, ['class' => 'select2 form-control','id'=>"dokter_id",'required'=>'true']) !!}
</div>
@endrole

<!-- Lokasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('antrian', 'Antrian:') !!}
    {!! Form::text('antrian', null, ['class' => 'form-control','type'=>'number']) !!}
    <small class="text-black-50">Akan digenerate otomatis setelah anda memilih tanggal dan dokter</small>
</div>
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
@push('page_scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            var csrf = $("[name='_token']").val();

            $("[name='dokter_id']").on('change', function () {
                console.log("change");
            });
            $('#tgl_checkup').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                useCurrent: true,
                sideBySide: true
            }).on('dp.change', function (e) {
                $.ajax({
                    url: '{{route('jadwalCheckups.generateAntrian')}}',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        "_token": csrf,
                        date: e.target.value,
                    },
                    success(res) {
                        if (res.success) {
                            var dokterDom = $('#dokter_id');
                            var pickedDoctor = res.pickedDoctor;
                            var optionsDokter = [];
                            if (res.dokters.length === 0) {
                                optionsDokter = [`<option>Tidak ada jadwal dokter dihari ${res.day}</option>`]
                            }
                            if (!pickedDoctor) {
                                optionsDokter = [`<option>Tidak ada jam operasional dokter di jam ${res.hour}</option>`]
                            } else {
                                optionsDokter = res.dokters.map(function (item) {
                                    return `<option value="${item.dokter.id}">${item.dokter.name} - (Jampel ${item.jadwal})</option>`
                                });
                            }
                            dokterDom.empty().append(optionsDokter.join(''))
                            if (pickedDoctor) {
                                dokterDom.val(pickedDoctor.dokter.id).change();
                                if (res.jadwalTerakhir != null) {
                                    $('[name="antrian"]').val(parseInt(res.jadwalTerakhir.antrian) + 1);
                                } else {
                                    $('[name="antrian"]').val(1)
                                }
                            }
                        }
                    }
                });
            })
        })

    </script>
@endpush
