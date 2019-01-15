<!-- Status Field -->
<div class="form-group">
    <p>
        {!! Form::label('status', 'Status:') !!}
        {!! $help->status !!}
    </p>
</div>

<!-- Description English Field -->
<div class="form-group">
    <p>
        {!! Form::label('description', 'Description:') !!}
        {!! $help->getTranslation('payload', 'en', false) !!}
    </p>
</div>

<!-- Description Arabic Field -->
<div class="form-group">
    <p>
        {!! Form::label('description', 'Description:') !!}
        {!! $help->getTranslation('payload', 'ar', false) !!}
    </p>
</div>