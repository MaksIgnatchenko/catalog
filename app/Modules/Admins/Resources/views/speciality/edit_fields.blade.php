<!-- Name Field -->
<div class="form-group">
    <p>
        {{ Form::label('name', 'Name: ') }}
        {!! Form::text('name', $speciality->name, ['class' => 'form-control']) !!}
    </p>
    @if ($errors->has('name'))
        <div class="text-red">{{ $errors->first('name') }}</div>
    @endif
</div>

<!-- Description Field -->
<div class="form-group">
    <p>
        {{ Form::label('description', 'Description: ') }}
        {!! Form::text('description', $speciality->description, ['class' => 'form-control']) !!}
    </p>
    @if ($errors->has('description'))
        <div class="text-red">{{ $errors->first('description') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group text-right">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
</div>