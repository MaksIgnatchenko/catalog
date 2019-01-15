<!-- Status Field -->
<div class="form-group">
    <p>
        {!! Form::label('status', 'Status:') !!}
        {!! $whoWeAre->status !!}
    </p>
</div>

<!-- Description English Field -->
<div class="form-group">
    <p>
        {!! Form::label('description', 'Description:') !!}
        {!! $whoWeAre->getTranslation('payload', 'en', false) !!}
    </p>
</div>

<!-- Description Arabic Field -->
<div class="form-group">
    <p>
        {!! Form::label('description', 'Description:') !!}
        {!! $whoWeAre->getTranslation('payload', 'ar', false) !!}
    </p>
</div>