<!-- TEXT ENGLISH Field -->
<div class="form-group">
    <p>
        {{ Form::label('payload[en]', 'English: ') }}
        {!! Form::textarea('payload[en]', null, ['class' => 'form-control', 'maxlength' => 500]) !!}
    </p>
    @if ($errors->has('payload[en]'))
        <div class="text-red">{{ $errors->first('payload[en]') }}</div>
    @endif
</div>

<!-- TEXT ARABIC Field -->
<div class="form-group">
    <p>
        {{ Form::label('payload[ar]', 'Arabic: ') }}
        {!! Form::textarea('payload[ar]', null, ['class' => 'form-control', 'maxlength' => 500]) !!}
    </p>
    @if ($errors->has('payload[ar]'))
        <div class="text-red">{{ $errors->first('payload[ar]') }}</div>
    @endif
</div>

<!-- HIDDEN STATUS Field -->
{{ Form::hidden('status', 'active') }}

<!-- HIDDEN CONTENT TYPE Field -->
{{ Form::hidden('content_type', 'who_we_are') }}

<!-- Submit Field -->
<div class="form-group text-right">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
</div>
