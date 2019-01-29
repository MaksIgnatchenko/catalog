<!-- SenderType Field -->
<div class="form-group">
    <p>
        {!! Form::label('sender_type', 'Sender type:') !!}
        {!! $dto->getSenderType() !!}
    </p>
</div>

<!-- SenderName Field -->
<div class="form-group">
    <p>
        {!! Form::label('name', 'Name:') !!}
        {!! $dto->getSenderName() !!}
    </p>
</div>

<!-- Purpose Field -->
<div class="form-group">
    <p>
        {!! Form::label('purpose', 'Purpose:') !!}
        {!! $dto->getPurpose() !!}
    </p>
</div>

<!-- Email Field -->
<div class="form-group">
    <p>
        {!! Form::label('email', 'Email:') !!}
        {!! $dto->getEmail() !!}
    </p>
</div>

<!-- Phone Field -->
<div class="form-group">
    <p>
        {!! Form::label('phone', 'Phone:') !!}
        {!! $dto->getPhone() !!}
    </p>
</div>

<!-- Message Field -->
<div class="form-group">
    <p>
        {!! Form::label('message', 'Message:') !!}
    </p>
    <p>
        {!! $dto->getMessage() !!}
    </p>
</div>

@if($dto->getLinkToAttachedFile())
    <!-- Attached File Field -->
    <div class="form-group">
        <p>
            {!! Form::label('file', 'Attached file:') !!}
        </p>
        <p>
            {!! Html::link($dto->getLinkToAttachedFile(), 'Download file') !!}
        </p>
    </div>
@endif