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
                            <a class="nav-link"
                               href="{{route('settings.notification')}}"
                               aria-controls="vert-tabs-profile" aria-selected="false">Notifikasi</a>
                            <a class="nav-link active"
                               href="{{route('settings.email')}}" aria-controls="vert-tabs-messages"
                               aria-selected="false">Email</a>
                        </div>
                    </div>
                    <div class="col-7 col-sm-9">
                        <div class="tab-content" id="vert-tabs-tabContent">
                            <form action="{{route('settings.email.save')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-4">
                                        <h6>Notifikasi Via Email</h6>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="email_enable_notification"
                                                       {{settings()->get("email_enable_notification")?"checked":""}}
                                                       value="1"
                                                       name="email_enable_notification">
                                                <label for="email_enable_notification" class="custom-control-label">Kirim
                                                    Notifikasi
                                                    ke Kerabat</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <h6>Pengiriman email ke kerabat</h6>
                                        <div class="form-group">
                                            <div class="input-group ">
                                                <input type="number" class="form-control"
                                                       value="{{settings()->get('email_jumlah_hari_sebelum_checkup',0)}}"
                                                       name="email_jumlah_hari_sebelum_checkup">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Hari sebelum checkup</span>
                                                </div>
                                            </div>
                                            <small class="text-black-50">Pengiriman notifikasi setelah checkup</small>
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
                                    <h6>Tes Email</h6>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control"
                                               placeholder="Masukkan email untuk melakukan tes email">
                                    </div>
                                    <small class="text-black-50">Masukkan email tes</small>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-primary">Tes Kirim Email</button>
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

            $('#email_enable_notification').on("change", function (e) {
                console.log(e.target.checked);
                $.ajax({
                    url: "{{route('settings.email.save')}}",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        "_token": csrf,
                        email_enable_notification: e.target.checked ? 1 : 0
                    },
                    success(res) {
                        console.log(res);
                    }
                });
            })
        })
    </script>
@endpush
