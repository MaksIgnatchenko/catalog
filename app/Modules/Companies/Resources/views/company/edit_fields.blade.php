<!-- Company's images limit Field -->
<div class="form-group">
    <p>
        {{ Form::label('company_images_limit', 'Company\'s images limit: ') }}
        {!! Form::text('company_images_limit', $company->company_images_limit, ['class' => 'form-control', 'maxlength' => 20]) !!}
    </p>
    @if ($errors->has('company_images_limit'))
        <div class="text-red">{{ $errors->first('company_images_limit') }}</div>
    @endif
</div>

<!-- Team's images limit Field -->
<div class="form-group">
    <p>
        {{ Form::label('team_images_limit', 'Team\'s images limit: ') }}
        {!! Form::text('team_images_limit', $company->team_images_limit, ['class' => 'form-control', 'maxlength' => 20]) !!}
    </p>
    @if ($errors->has('team_images_limit'))
        <div class="text-red">{{ $errors->first('team_images_limit') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group text-right">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
</div>