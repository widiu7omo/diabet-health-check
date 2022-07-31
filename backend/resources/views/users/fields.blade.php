<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>
<!-- Email Kerabat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email_kerabat', 'Email Kerabat Dekat:') !!}
    {!! Form::text('email_kerabat', null, ['class' => 'form-control']) !!}
    <small class="text-black-50">Mengirimkan notifikasi via email untuk mengingatkan jadwal checkup pasien</small>
</div>
<!-- Whatsapp Kerabat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Whatsapp:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
    <small class="text-black-50">Nomor HP yang sudah terdaftar Whatsapp</small>
</div>
<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>
<!-- Roles Field -->
<div class="form-group col-sm-6">
    {!! Form::label('roles[]', 'Role:') !!}
    {!! Form::select('roles[]', $role, $rolesSelected, ['class' => 'select2 form-control' , 'multiple'=>'multiple']) !!}
</div>
