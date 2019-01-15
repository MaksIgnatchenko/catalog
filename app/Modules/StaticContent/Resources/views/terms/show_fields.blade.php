<!-- Status Field -->
<div class="form-group">
    <p>
        {!! Form::label('status', 'Status:') !!}
        {!! $term->status !!}
    </p>
</div>

<!-- Description English Field -->
<div class="form-group">
    <p>
        {!! Form::label('description', 'Description:') !!}
        {!! $term->getTranslation('payload', 'en', false) !!}
    </p>
</div>

<!-- Description Arabic Field -->
<div class="form-group">
    <p>
        {!! Form::label('description', 'Description:') !!}
        {!! $term->getTranslation('payload', 'ar', false) !!}
    </p>
</div>