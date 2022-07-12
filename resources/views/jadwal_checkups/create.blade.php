@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Jadwal Checkup</h1>
                </div>
            </div>
        </div>
    </section>
    @if(isset($pemeriksaan))
        <div class="content px-3">
            <div class="card">
                <div class="card-header">
                    <h4>Data Pemeriksaan</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td style="width: 10%;">Pemeriksaan</td>
                            <td style="width: 1%;">:</td>
                            <td>{{$pemeriksaan->pemeriksaan}}</td>
                        </tr>
                        <tr>
                            <td style="width: 10%;">Tanggal Checkup</td>
                            <td style="width: 1%;">:</td>
                            <td>{{$pemeriksaan->tgl_periksa}}</td>
                        </tr>
                        <tr>
                            <td style="width: 10%;">Hasil Diagnosa</td>
                            <td style="width: 1%;">:</td>
                            <td>{{$pemeriksaan->hasil_diagnosa}}</td>
                        </tr>
                        <tr>
                            <td style="width: 10%;">Nama Pasien</td>
                            <td style="width: 1%;">:</td>
                            <td>{{$pemeriksaan->pasien->name}}</td>
                        </tr>
                        <tr>
                            <td style="width: 10%;">Nama Dokter</td>
                            <td style="width: 1%;">:</td>
                            <td>{{$pemeriksaan->dokter->name}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'jadwalCheckups.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('jadwal_checkups.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('jadwalCheckups.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
