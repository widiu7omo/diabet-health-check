@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pemeriksaan Details</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('pemeriksaans.index') }}">
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
                    @include('pemeriksaans.show_fields')
                </div>
                <div class="row">
                    <div class="col-12">
                        <a class="btn btn-primary" href="{{route('pemeriksaan.jadwalkan',$pemeriksaan->id)}}"><i
                                class="fa fa-calendar-alt mr-2"></i>Jadwalkan
                            Checkup</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
