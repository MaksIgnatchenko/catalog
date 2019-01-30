<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Admin Dashboard" name="description"/>
    <meta content="ThemeDesign" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <title>test</title>
</head>

<body class="fixed-left">

@include('flash::message')
{!! Form::open(['route' => 'publicOutgoingMessagesToCompany.store', 'method' => 'POST', 'files' => true]) !!}
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Send message to company</h3>
            </div>
            <div class="box-body">
                <!-- Recipient Field -->
                {{ Form::hidden('recipientable_id', $dto->getRecipientId()) }}

                <!-- Name Field -->
                <div class="form-group">
                    <p>
                        {{ Form::label('name', 'Full name: ') }}
                        {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 100]) !!}
                    </p>
                    @if ($errors->has('name'))
                        <div class="text-red">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <!-- Phone Field -->
                <div class="form-group">
                    <p>
                        {{ Form::label('phone', 'Phone: ') }}
                        {!! Form::text('phone', null, ['class' => 'form-control', 'maxlength' => 100]) !!}
                    </p>
                    @if ($errors->has('phone'))
                        <div class="text-red">{{ $errors->first('phone') }}</div>
                    @endif
                </div>

                <!-- Email Field -->
                <div class="form-group">
                    <p>
                        {{ Form::label('email', 'Email: ') }}
                        {!! Form::text('email', null, ['class' => 'form-control', 'maxlength' => 100]) !!}
                    </p>
                    @if ($errors->has('email'))
                        <div class="text-red">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <!-- Message Field -->
                <div class="form-group">
                    <p>
                        {{ Form::label('message', 'Message: ') }}
                        {!! Form::textarea('message', null, ['class' => 'form-control', 'maxlength' => 10000]) !!}
                    </p>
                    @if ($errors->has('message'))
                        <div class="text-red">{{ $errors->first('message') }}</div>
                    @endif
                </div>

                <!-- File Field -->
                <div class="form-group">
                    <p>
                        {{ Form::label('file', 'Attach file: ') }}
                    </p>
                    {!! Form::file('file', null, ['class' => 'form-control']) !!}
                    @if ($errors->has('file'))
                        <div class="text-red">{{ $errors->first('file') }}</div>
                    @endif
                </div>

                <!-- Submit Field -->
                <div class="form-group text-right">
                    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

</body>
</html>
