<!-- Status Field -->
<div class="form-group">
    <p>
        {!! Form::label('status', 'Status:') !!}
        {!! $privacyPolicy->status !!}
    </p>
</div>

<!-- Description English Field -->
<div class="form-group">
    <p>
        {!! Form::label('description', 'Description:') !!}
        {!! $privacyPolicy->getTranslation('payload', 'en', false) !!}
    </p>
</div>

<!-- Description Arabic Field -->
<div class="form-group">
    <p>
        {!! Form::label('description', 'Description:') !!}
        {!! $privacyPolicy->getTranslation('payload', 'ar', false) !!}
    </p>
</div>