<!-- Social resource Field -->
<div class="form-group">
    <p>
        {!! Form::label('social_resource', 'Social resource:') !!}
        {!! $socialLink->social_resource !!}
    </p>
</div>

<!-- URL Field -->
<div class="form-group">
    <p>
        {!! Form::label('url', 'Url:') !!}
        {!! $socialLink->url !!}
    </p>
</div>

<!-- ALT TEXT Field -->
<div class="form-group">
    <p>
        {!! Form::label('alt', 'Popup icon text:') !!}
        {!! $socialLink->alt !!}
    </p>
</div>