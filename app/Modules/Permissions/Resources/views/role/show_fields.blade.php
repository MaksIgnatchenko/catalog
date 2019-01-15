<!-- Name Field -->
<div class="form-group">
    <p>
        {!! Form::label('name', 'Name:') !!}
        {!! $role->display_name !!}
    </p>
</div>

<!-- Description Field -->
<div class="form-group">
    <p>
        {!! Form::label('description', 'Description:') !!}
        {!! $role->description !!}
    </p>
</div>

<!-- Permissions Field -->
<div class="form-group">
    <p>
        {!! Form::label('permissions', 'Permissions:') !!}
    </p>
    @foreach($role->permissions as $permission)
        <p>
            {{ $permission->display_name }}
        </p>
    @endforeach
</div>

