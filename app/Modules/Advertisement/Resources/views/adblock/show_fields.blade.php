<!-- Name Field -->
<div class="form-group">
    <p>
        {!! Form::label('name', 'Name:') !!}
        {!! $type->name !!}
    </p>
</div>

<!-- Speciality Field -->
<div class="form-group">
    <p>
        {{ Form::label('speciality', 'Speciality: ') }}
        {!! $type->speciality->name !!}
    </p>
</div>

<!-- Description Field -->
<div class="form-group">
    <p>
        {!! Form::label('description', 'Description:') !!}
        {!! $type->description !!}
    </p>
</div>
