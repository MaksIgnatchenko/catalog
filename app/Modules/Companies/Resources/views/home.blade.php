@extends('layouts.company_app')
@section('title', 'Dashboard')

@section('content')
    <div class="clearfix"></div>
    @include('flash::message')
    <div class="clearfix"></div>
    <div class="col-md-3 col-sm-4">
        <div class="pad box-pane-right bg-green"
             style="min-height: 400px; display: flex;justify-content: center;align-items: center;">
            <div class="description-block margin-bottom">
                <h5 class="description-header">Owner</h5>
                <h3 class="description-text">{{$dto->getCompanyOwnerEmail()}}</h3>
            </div>
        </div>
    </div>
@endsection

