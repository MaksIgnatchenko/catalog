<!-- Status Field -->
<div class="form-group">
    <p>
        {!! Form::label('status', 'Status:') !!}
        {!! $ourVision->status !!}
    </p>
</div>

<!-- Description English Field -->
<div class="form-group">
    <p>
        {!! Form::label('description', 'Description:') !!}
        {!! $ourVision->getTranslation('payload', 'en', false) !!}
    </p>
</div>

<!-- Description Arabic Field -->
<div class="form-group">
    <p>
        {!! Form::label('description', 'Description:') !!}
        {!! $ourVision->getTranslation('payload', 'ar', false) !!}
    </p>
</div>