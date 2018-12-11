<!-- Name Field -->
<div class="form-group">
    <p>
        {{ Form::label('name', 'Name: ') }}
        {!! Form::text('name', $speciality->name, ['class' => 'form-control', 'maxlength' => 20]) !!}
    </p>
    @if ($errors->has('name'))
        <div class="text-red">{{ $errors->first('name') }}</div>
    @endif
</div>

<!-- Category Field -->
<div class="form-group">
    <p>
        {{ Form::label('category', 'Category: ') }}
        {!! $speciality->category->name !!}
    </p>
</div>

<!-- Description Field -->
<div class="form-group">
    <p>
        {{ Form::label('description', 'Description: ') }}
        {!! Form::textarea('description', $speciality->description, ['class' => 'form-control', 'maxlength' => 300]) !!}
    </p>
    @if ($errors->has('description'))
        <div class="text-red">{{ $errors->first('description') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group text-right">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
</div>