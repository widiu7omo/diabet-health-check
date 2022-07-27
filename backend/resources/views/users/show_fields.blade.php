<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $user->email }}</p>
</div>

@if($user->email_kerabat != null)
    <!-- Email Kerabat Field -->
    <div class="col-sm-12">
        {!! Form::label('email_kerabat', 'Email Kerabat:') !!}
        <p>{{ $user->email_kerabat }}</p>
    </div>
@endif
@if($user->token_fcm != null)
    <!-- Firebase Token Push Notification -->
    <div class="col-sm-12">
        {!! Form::label('token_fcm', 'Firebase Notification Token:') !!}
        <p>{{ $user->token_fcm }}</p>
    </div>
@endif

<!-- Password Field -->
<div class="col-sm-12">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $user->password }}</p>
</div>

