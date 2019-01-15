<!-- Name Field -->
<div class="form-group">
    <p>
        {{ Form::label('name', 'Name: ') }}
        {!! Form::text('name', $supervisor->name, ['class' => 'form-control', 'maxlength' => 50]) !!}
    </p>
    @if ($errors->has('name'))
        <div class="text-red">{{ $errors->first('name') }}</div>
    @endif
</div>

<!-- Email Field -->
<div class="form-group">
    <p>
        {{ Form::label('email', 'Email: ') }}
        {!! Form::text('email', $supervisor->email, ['class' => 'form-control', 'maxlength' => 50]) !!}
    </p>
    @if ($errors->has('email'))
        <div class="text-red">{{ $errors->first('email') }}</div>
    @endif
</div>

<!-- Password Field -->
<div class="form-group">
    <p>
        {{ Form::label('password', 'Password: ') }}
        {!! Form::text('password', null, ['class' => 'form-control', 'maxlength' => 50]) !!}
    </p>
    @if ($errors->has('password'))
        <div class="text-red">{{ $errors->first('password') }}</div>
    @endif
</div>

<!-- Password confirmation Field -->
<div class="form-group">
    <p>
        {{ Form::label('password_confirmation', 'Password confirmation: ') }}
        {!! Form::text('password_confirmation', null, ['class' => 'form-control', 'maxlength' => 50]) !!}
    </p>
    @if ($errors->has('password_confirmation'))
        <div class="text-red">{{ $errors->first('password_confirmation') }}</div>
    @endif
</div>

<!-- Roles Field -->
<div class="form-group">
    <p>
        {{ Form::label('Roles', 'Roles: ') }}
    </p>
    @foreach ($roles as $role)
        <p>
            {!! Form::checkbox('roles[]', $role->id, false, ['id' => 'permission_' . $role->id, 'class' => 'custom-checkbox']) !!}
            {{ Form::label('permission_' . $role->id, $role->display_name . ': ') }}
        </p>
    @endforeach
</div>

<!-- Submit Field -->
<div class="form-group text-right">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
</div>
