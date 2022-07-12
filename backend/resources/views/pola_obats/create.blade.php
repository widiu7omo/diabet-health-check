@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Pola Obat</h1>
                </div>
            </div>
        </div>
    </section>
    @if(isset($jadwalCheckup))
        <div class="content px-3">
            <div class="card">
                <div class="card-header">
                    <h4>Data Checkup</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td style="width: 10%;">Checkup</td>
                            <td style="width: 1%;">:</td>
                            <td>{{$jadwalCheckup->checkup}}</td>
                        </tr>
                        <tr>
                            <td style="width: 10%;">Tanggal Checkup</td>
                            <td style="width: 1%;">:</td>
                            <td>{{$jadwalCheckup->tgl_checkup}}</td>
                        </tr>
                        <tr>
                            <td style="width: 10%;">Lokasi</td>
                            <td style="width: 1%;">:</td>
                            <td>{{$jadwalCheckup->lokasi}}</td>
                        </tr>
                        <tr>
                            <td style="width: 10%;">Nama Pasien</td>
                            <td style="width: 1%;">:</td>
                            <td>{{$jadwalCheckup->pasien->name}}</td>
                        </tr>
                        <tr>
                            <td style="width: 10%;">Nama Dokter</td>
                            <td style="width: 1%;">:</td>
                            <td>{{$jadwalCheckup->dokter->name}}</td>
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

            {!! Form::open(['route' => 'polaObats.store']) !!}
            <div class="card-header">
                <h4>Pemberian Obat</h4>
            </div>
            <div class="card-body">

                <div class="row">
                    @include('pola_obats.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('polaObats.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
