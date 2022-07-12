@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jadwal Checkup Details</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('jadwalCheckups.index') }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('jadwal_checkups.show_fields')
                </div>
                <div class="row">
                    <div class="col-md-6 mt-2">
                        <a href="{{ route('jadwalCheckups.obat',$jadwalCheckup->id) }}"
                           class="btn btn-block btn-danger"><i class="fa fa-capsules"></i> Berikan Obat</a>
                    </div>
                    <div class="col-md-6 mt-2">
                        <a href="{{ route('jadwalCheckups.makan',$jadwalCheckup->id) }}"
                           class="btn btn-block btn-primary"><i class="fa fa-cookie-bite"></i> Anjuran Pola Makan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
