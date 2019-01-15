<!-- Social resource Field -->
<div class="form-group">
    <p>
        {{ Form::label('social_resource', 'Social resource: ') }}
        {!! Form::select('social_resource', $socialResources, ['class' => 'form-control']) !!}
    </p>
    @if ($errors->has('social_resource'))
        <div class="text-red">{{ $errors->first('social_resource') }}</div>
    @endif
</div>

<!-- URL Field -->
<div class="form-group">
    <p>
        {{ Form::label('url' , 'Url: ') }}
        {!! Form::text('url', null, ['class' => 'form-control', 'maxlength' => 1000]) !!}
    </p>
    @if ($errors->has('url'))
        <div class="text-red">{{ $errors->first('url') }}</div>
    @endif
</div>

<!-- ALT Field -->
<div class="form-group">
    <p>
        {{ Form::label('alt' , 'Social icon alt text: ') }}
        {!! Form::text('alt', null, ['class' => 'form-control', 'maxlength' => 100]) !!}
    </p>
    @if ($errors->has('alt'))
        <div class="text-red">{{ $errors->first('alt') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group text-right">
    {!! Form::submit('Save', ['class' => 'btn btn-success', 'id' => 'save_button']) !!}
</div>
