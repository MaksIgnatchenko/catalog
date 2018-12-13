<!-- AdType Field -->
<div class="form-group">
    <p>
        {{ Form::label('type', 'Ad block type: ') }}
    </p>
        {!! Form::select('type', $types, ['class' => 'form-control']) !!}
    @if ($errors->has('type'))
        <div class="text-red">{{ $errors->first('type') }}</div>
    @endif
</div>

<!-- AdPosition Field -->
<div class="form-group">
    <p>
        {{ Form::label('position', 'Ad block position: ') }}
    </p>
        {!! Form::select('position', [null => 'Select position'], ['class' => 'form-control']) !!}
    @if ($errors->has('position'))
        <div class="text-red">{{ $errors->first('position') }}</div>
    @endif
</div>

<!-- Country Field -->
<div class="form-group">
    <p>
        {{ Form::label('country', 'Country: ') }}
    </p>
        {!! Form::select('country_id', $countries, ['class' => 'form-control']) !!}
    @if ($errors->has('country_id'))
        <div class="text-red">{{ $errors->first('country_id') }}</div>
    @endif
</div>

<!-- City Field -->
<div class="form-group">
    <p>
        {{ Form::label('city', 'City: ') }}
    </p>
        {!! Form::select('city_id', [null => 'All cities'], ['class' => 'form-control']) !!}
    @if ($errors->has('country_id'))
        <div class="text-red">{{ $errors->first('city_id') }}</div>
    @endif
</div>

<!-- Image Field -->
<div class="form-group">
    <p>
        {{ Form::label('image', 'Image: ') }}
    </p>
        {!! Form::file('image', null, ['class' => 'form-control', 'maxlength' => 300]) !!}
    @if ($errors->has('image'))
        <div class="text-red">{{ $errors->first('image') }}</div>
    @endif
</div>

<!-- URL Field -->
<div class="form-group">
    <p>
        {{ Form::label('url', 'Url: ') }}
    </p>
        {!! Form::text('url', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
    @if ($errors->has('url'))
        <div class="text-red">{{ $errors->first('url') }}</div>
    @endif
</div>

<!-- Appear Start Field -->
<div class="form-group">
    <p>
        {{ Form::label('appear_start', 'Appear start date: ') }}
        {!! Form::date('appear_start', null, ['class' => 'form-control']) !!}
    </p>

@if ($errors->has('appear_start'))
        <div class="text-red">{{ $errors->first('appear_start') }}</div>
    @endif
</div>

<!-- Days to show Field -->
<div class="form-group">
    <p>
        {{ Form::label('appear_finish', 'Days to show: ') }}
        {!! Form::text('appear_finish', null, ['class' => 'form-control']) !!}
    </p>
@if ($errors->has('appear_finish'))
        <div class="text-red">{{ $errors->first('appear_finish') }}</div>
    @endif
</div>

<!-- Description Field -->
<div class="form-group">
    <p>
        {{ Form::label('description', 'Description: ') }}
    </p>
        {!! Form::textarea('description', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
    @if ($errors->has('description'))
        <div class="text-red">{{ $errors->first('description') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group text-right">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
</div>
