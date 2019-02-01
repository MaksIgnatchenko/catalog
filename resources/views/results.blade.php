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

@foreach($companies as $company)
    <div>
        {{ $company->name }}
    </div>
@endforeach

{{ $companies->appends(request()->except('page'))->links() }}

</body>
</html>
