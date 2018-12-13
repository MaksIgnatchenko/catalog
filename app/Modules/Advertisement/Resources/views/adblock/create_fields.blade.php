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

<!-- Country Field -->
<div class="form-group">
    <p>
        {{ Form::label('country', 'Country: ') }}
        {!! Form::select('country_id', $countries, ['class' => 'form-control', 'id' => 'countrySelect']) !!}
    </p>
    @if ($errors->has('country_id'))
        <div class="text-red">{{ $errors->first('country_id') }}</div>
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