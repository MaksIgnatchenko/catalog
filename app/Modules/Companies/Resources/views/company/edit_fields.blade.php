<!-- Images limit Field -->
<div class="form-group">
    <p>
        {{ Form::label('images_limit', 'Images limit: ') }}
        {!! Form::text('images_limit', $company->images_limit, ['class' => 'form-control', 'maxlength' => 20]) !!}
    </p>
    @if ($errors->has('images_limit'))
        <div class="text-red">{{ $errors->first('images_limit') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group text-right">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
</div>