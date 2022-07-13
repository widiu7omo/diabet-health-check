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
                            <a class="nav-link active"
                               href="{{route('settings.reminder')}}"
                               aria-controls="vert-tabs-home" aria-selected="true">Reminder</a>
                            <a class="nav-link"
                               href="{{route('settings.notification')}}"
                               aria-controls="vert-tabs-profile" aria-selected="false">Notifikasi</a>
                            <a class="nav-link"
                               href="{{route('settings.email')}}" aria-controls="vert-tabs-messages"
                               aria-selected="false">Email</a>
                        </div>
                    </div>
                    <div class="col-7 col-sm-9">
                        <div class="tab-content" id="vert-tabs-tabContent">
                            <form action="{{route('settings.reminder.save')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-4">
                                        <h6>Waktu Pengiriman Reminder</h6>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input"
                                                       type="checkbox"
                                                       id="reminder_enable"
                                                       value="1"
                                                       {{settings()->get("reminder_enable")?"checked":""}}
                                                       name="reminder_enable">
                                                <label for="reminder_enable" class="custom-control-label">Aktifkan
                                                    Reminder</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <h6>Rentan Waktu</h6>
                                        <div class="form-group">
                                            <div class="mb-3"></div>
                                            <div class="input-group">
                                                <input value="{{settings()->get("reminder_rentan_waktu",0)}}"
                                                       type="number" name="reminder_rentan_waktu" class="form-control">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Hari Sekali</span>
                                                </div>
                                            </div>
                                            <small class="text-black-50">Pengiriman reminder kata-kata motivasi</small>
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
                                    <h6>Tes Reminder</h6>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" id="tokenFCM" name="tokenfcm" class="form-control"
                                               placeholder="Masukkan token untuk melakukan tes reminder">
                                    </div>
                                    <small class="text-black-50">Masukkan token</small>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-primary" id="test-kirim">Tes Kirim Reminder</button>
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
            $('#test-kirim').on('click', function () {
                var tokenFCM = $('#tokenFCM').val();
                $.ajax({
                    url: "{{route('settings.reminder.test')}}",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        "_token": csrf,
                        tokenFCM
                    },
                    success(res) {
                        console.log(res);
                    }
                });
            });
            $('#reminder_enable').on("change", function (e) {
                console.log(e.target.checked);
                $.ajax({
                    url: "{{route('settings.reminder.save')}}",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        "_token": csrf,
                        reminder_enable: e.target.checked ? 1 : 0
                    },
                    success(res) {
                        console.log(res);
                    }
                });
            })
        })
    </script>
@endpush
