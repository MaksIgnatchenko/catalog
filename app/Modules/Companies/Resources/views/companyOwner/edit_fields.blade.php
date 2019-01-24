<!-- Email Field -->
<div class="form-group">
    <p>
        {{ Form::label('email', 'Email: ') }}
        {{ $companyOwner->email }}
    </p>
</div>

<!-- Current Password Field -->
<div class="form-group">
    <p>
        {{ Form::label('current_password', 'Current password: ') }}
        {!! Form::password('current_password', ['placeholder'=>'Password', 'class'=>'form-control', 'maxlength' => 50, 'autocomplete' => 'off']) !!}
    </p>
    @if ($errors->has('current_password'))
        <div class="text-red">{{ $errors->first('current_password') }}</div>
    @endif
</div>

<!-- New Password Field -->
<div class="form-group">
    <p>
        {{ Form::label('password', 'New password: ') }}
        {!! Form::password('password', ['placeholder'=>'Password', 'class'=>'form-control', 'maxlength' => 50, 'autocomplete' => 'off']) !!}
    </p>
    @if ($errors->has('password'))
        <div class="text-red">{{ $errors->first('password') }}</div>
    @endif
</div>

<!-- New Password confirmation Field -->
<div class="form-group">
    <p>
        {{ Form::label('password_confirmation', 'New password confirmation: ') }}
        {!! Form::password('password_confirmation', ['placeholder'=>'Password', 'class'=>'form-control', 'maxlength' => 50, 'autocomplete' => 'off']) !!}
    </p>
    @if ($errors->has('password_confirmation'))
        <div class="text-red">{{ $errors->first('password_confirmation') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group text-right">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
</div>