<!-- Status Field -->
<div class="form-group">
    <p>
        {{ Form::label('Status', 'Status: ') }}
    </p>
    <p>
        {!! Form::checkbox('status', $privacyPolicy->status, $privacyPolicy->isActive(), ['id' => 'statusCheckbox', 'class' => 'custom-checkbox']) !!}
        {{ Form::label('statusCheckbox') }}
    </p>
    @if ($errors->has('status'))
        <div class="text-red">{{ $errors->first('status') }}</div>
    @endif
</div>

<!-- Payload English Field -->
<div class="form-group">
    <p>
        {{ Form::label('payload[' . LanguagesEnum::ENGLISH . ']', 'English: ') }}
        {!! Form::textarea('payload[' . LanguagesEnum::ENGLISH . ']', $privacyPolicy->getTranslation('payload', LanguagesEnum::ENGLISH, false), ['class' => 'form-control',  'maxlength' => 1000]) !!}
    </p>
    @if ($errors->has('payload[' . LanguagesEnum::ENGLISH . ']'))
        <div class="text-red">{{ $errors->first('payload[' . LanguagesEnum::ENGLISH . ']') }}</div>
    @endif
</div>

<!-- Payload Arabic Field -->
<div class="form-group">
    <p>
        {{ Form::label('payload[' . LanguagesEnum::ARABIC . ']', 'Arabic: ') }}
        {!! Form::textarea('payload[' . LanguagesEnum::ARABIC . ']', $privacyPolicy->getTranslation('payload', LanguagesEnum::ARABIC, false), ['class' => 'form-control arabic_input',  'maxlength' => 1000]) !!}
    </p>
    @if ($errors->has('payload[ar]'))
        <div class="text-red">{{ $errors->first('payload[' . LanguagesEnum::ARABIC . ']') }}</div>
    @endif
</div>

@if ($errors->has('payload'))
    <div class="text-red">{{ $errors->first('payload') }}</div>
@endif

<!-- HIDDEN CONTENT TYPE Field -->
{{ Form::hidden('content_type', \App\Modules\StaticContent\Enums\ContentTypeEnum::PRIVACY_POLICY) }}


<!-- Submit Field -->
<div class="form-group text-right">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
</div>

<script src="{{ asset('js/status_checkbox.js') }}"></script>