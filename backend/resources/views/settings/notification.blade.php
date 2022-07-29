@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Pengaturan</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-5 col-sm-3">
                        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                             aria-orientation="vertical">
                            <a class="nav-link"
                               href="{{route('settings.reminder')}}"
                               aria-controls="vert-tabs-home" aria-selected="true">Reminder</a>
                            <a class="nav-link active"
                               href="{{route('settings.notification')}}"
                               aria-controls="vert-tabs-profile" aria-selected="false">Notifikasi</a>
                            <a class="nav-link"
                               href="{{route('settings.email')}}" aria-controls="vert-tabs-messages"
                               aria-selected="false">Email</a>
                        </div>
                    </div>
                    <div class="col-7 col-sm-9">
                        <div class="tab-content" id="vert-tabs-tabContent">
                            <form action="{{route('settings.notification.save')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-4">
                                        <h6>Waktu Notifikasi</h6>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="setelah_checkup"
                                                       {{settings()->get("setelah_checkup")?"checked":""}}
                                                       value="1"
                                                       name="setelah_checkup">
                                                <label for="setelah_checkup" class="custom-control-label">
                                                    Setelah Melakukan Checkup</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="sebelum_checkup"
                                                       {{settings()->get("sebelum_checkup")?"checked":""}}
                                                       value="1"
                                                       name="sebelum_checkup">
                                                <label for="sebelum_checkup" class="custom-control-label">
                                                    Sebelum Checkup</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input"
                                                       name="terlewat_checkup" type="checkbox"
                                                       id="terlewat_checkup"
                                                       {{settings()->get("terlewat_checkup")?"checked":""}}
                                                       value="1">
                                                <label for="terlewat_checkup" class="custom-control-label">
                                                    Checkup Terlewat</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <h6>Jumlah Hari Notifikasi</h6>
                                        <div class="form-group">
                                            <div class="input-group ">
                                                <input type="number"
                                                       value="{{settings()->get("notifikasi_hari_setelah",0)}}"
                                                       name="notifikasi_hari_setelah" class="form-control">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Hari setelah Checkup</span>
                                                </div>
                                            </div>
                                            <small class="text-black-50">Pengiriman notifikasi setelah checkup</small>
                                            <div class="mb-3"></div>
                                            <div class="input-group">
                                                <input type="number"
                                                       value="{{settings()->get("notifikasi_hari_sebelum",0)}}"
                                                       name="notifikasi_hari_sebelum" class="form-control">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Hari sebelum Checkup</span>
                                                </div>
                                            </div>
                                            <small class="text-black-50">Pengiriman notifikasi sebelum checkup</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 float-right" style="margin-bottom: 32px">
                                        <button type="submit" class="btn btn-primary" id="sumbit">Simpan</button>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <h6>Tes Notifikasi</h6>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input id="tokenFCM" type="text" class="form-control"
                                               placeholder="Masukkan token untuk melakukan tes notifikasi">
                                    </div>
                                    <small class="text-black-50">Masukkan token</small>

                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" id="title" class="form-control"
                                               placeholder="Judul Notifikasi">
                                    </div>
                                    <small class="text-black-50">Masukkan judul notifikasi</small>

                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" id="content" class="form-control"
                                               placeholder="Konten Notifikasi">
                                    </div>
                                    <small class="text-black-50">Masukkan konten notifikasi</small>

                                </div>
                                <div class="col-12">
                                    <button id="btn-test-notifikasi" class="btn btn-primary">Tes Kirim Notifikasi
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('third_party_scripts')
    <script>
        $(document).ready(function () {
            var csrf = $("[name='_token']").val();
            $('#btn-test-notifikasi').on('click', function () {
                var tokenFCM = $('#tokenFCM').val();
                var notifTitle = $("#title").val();
                var notifContent = $("#content").val();
                $.ajax({
                    url: "{{route('settings.notification.test')}}",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        "_token": csrf,
                        tokenFCM,
                        notifTitle, notifContent
                    },
                    success(res) {
                        console.log(res);
                    }
                });
            });
            $('#setelah_checkup').on("change", function (e) {
                $.ajax({
                    url: "{{route('settings.notification.save')}}",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        "_token": csrf,
                        setelah_checkup: e.target.checked ? 1 : 0
                    },
                    success(res) {
                        console.log(res);
                    }
                });
            })
            $('#sebelum_checkup').on("change", function (e) {
                $.ajax({
                    url: "{{route('settings.notification.save')}}",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        "_token": csrf,
                        sebelum_checkup: e.target.checked ? 1 : 0
                    },
                    success(res) {
                        console.log(res);
                    }
                });
            })
            $('#terlewat_checkup').on("change", function (e) {
                $.ajax({
                    url: "{{route('settings.notification.save')}}",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        "_token": csrf,
                        terlewat_checkup: e.target.checked ? 1 : 0
                    },
                    success(res) {
                        console.log(res);
                    }
                });
            })
        })
    </script>
@endpush
