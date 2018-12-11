<!-- Name Field -->
<div class="form-group">
    <p>
        {{ Form::label('name', 'Name: ') }}
        {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 20]) !!}
    </p>
    @if ($errors->has('name'))
        <div class="text-red">{{ $errors->first('name') }}</div>
    @endif
</div>

<!-- Speciality Field -->
<div class="form-group">
    <p>
        {{ Form::label('speciality', 'Speciality: ') }}
        {!! Form::select('speciality_id', $specialities, ['class' => 'form-control', 'maxlength' => 300]) !!}
    </p>
    @if ($errors->has('speciality_id'))
        <div class="text-red">{{ $errors->first('speciality_id') }}</div>
    @endif
</div>

<!-- Description Field -->
<div class="form-group">
    <p>
        {{ Form::label('description', 'Description: ') }}
        {!! Form::textarea('description', null, ['class' => 'form-control', 'maxlength' => 300]) !!}
    </p>
    @if ($errors->has('description'))
        <div class="text-red">{{ $errors->first('description') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group text-right">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
</div>