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
{!! Form::open(['route' => 'result', 'method' => 'GET']) !!}
                <!-- Name Field -->
                <div class="form-group">
                    <p>
                        {!! Form::text('search', null, ['class' => 'form-control', 'maxlength' => 100]) !!}
                    </p>
                    @if ($errors->has('search'))
                        <div class="text-red">{{ $errors->first('search') }}</div>
                    @endif
                </div>

                {{--<!-- Country Field -->--}}
                {{--<div class="form-group">--}}
                    {{--<p>--}}
                        {{--{!! Form::select('country_id', $dto->getCountries(), ['class' => 'form-control'], ['placeholder' => 'Select country']) !!}--}}
                    {{--</p>--}}
                    {{--@if ($errors->has('country_id'))--}}
                        {{--<div class="text-red">{{ $errors->first('country_id') }}</div>--}}
                    {{--@endif--}}
                {{--</div>--}}

                {{--<!-- City Field -->--}}
                {{--<div class="form-group">--}}
                    {{--<p>--}}
                        {{--{!! Form::select('city_id', [], ['class' => 'form-control'], ['placeholder' => 'Select city']) !!}--}}
                    {{--</p>--}}
                    {{--@if ($errors->has('city_id'))--}}
                        {{--<div class="text-red">{{ $errors->first('city_id') }}</div>--}}
                    {{--@endif--}}
                {{--</div>--}}

                <!-- Submit Field -->
                <div class="form-group text-right">
                    {!! Form::submit('Search', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

</body>
</html>
