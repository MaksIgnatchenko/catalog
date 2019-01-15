<!-- Name Field -->
<div class="form-group">
    <p>
        {{ Form::label('name', 'Name: ') }}
        {!! Form::text('name', $role->name, ['class' => 'form-control', 'maxlength' => 50]) !!}
    </p>
    @if ($errors->has('name'))
        <div class="text-red">{{ $errors->first('name') }}</div>
    @endif
</div>

<!-- Permissions Field -->
<div class="form-group">
    <p>
        {{ Form::label('Permissions', 'Permissions: ') }}
    </p>
    @foreach ($permissions as $permission)
        <p>
            {!! Form::checkbox('permissions[]', $permission->id, in_array($permission->id, $selectedPermissions), ['id' => 'permission_' . $permission->id, 'class' => 'custom-checkbox']) !!}
            {{ Form::label('permission_' . $permission->id, $permission->display_name . ': ') }}
        </p>
    @endforeach
</div>

<!-- Description Field -->
<div class="form-group">
    <p>
        {{ Form::label('description', 'Description: ') }}
        {!! Form::textarea('description', $role->description, ['class' => 'form-control',  'maxlength' => 300]) !!}
    </p>
    @if ($errors->has('description'))
        <div class="text-red">{{ $errors->first('description') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group text-right">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
</div>
