<!-- Name Field -->
<div class="form-group">
    <p>
        {!! Form::label('name', 'Name:') !!}
        {!! $supervisor->name !!}
    </p>
</div>

<!-- Description Field -->
<div class="form-group">
    <p>
        {!! Form::label('email', 'Email:') !!}
        {!! $supervisor->email !!}
    </p>
</div>

<!-- Roles Field -->
<div class="form-group">
    <p>
        {!! Form::label('roles', 'Roles:') !!}
    </p>
    @foreach($supervisor->roles as $role)
        <p>
            {{ $role->display_name }}
        </p>
    @endforeach
</div>
