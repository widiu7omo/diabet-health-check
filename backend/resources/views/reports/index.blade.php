@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Report</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::query('type') == null ? 'active':null }} {{ Request::query('type') == 'pemeriksaan'? "active":null }}"
                           href="{{route("reports.index",['type'=>'pemeriksaan'])}}"
                           aria-selected="true">Report Pemeriksaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::query('type') == 'checkup' ? "active":null }}"
                           href="{{route("reports.index",['type'=>'checkup'])}}"
                           aria-controls="custom-tabs-five-overlay-dark" aria-selected="false">Report Checkup</a>
                    </li>
                </ul>
            </div>
            <div class="card-body p-2">
                @include('reports.table')

                <div class="card-footer clearfix">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

