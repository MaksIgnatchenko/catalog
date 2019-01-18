@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="clearfix"></div>
    @include('flash::message')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Features in progress</h3>
        </div>
    </div>
    <div class="col-md-3 col-sm-4">
        <div class="pad box-pane-right bg-green"
             style="min-height: 400px; display: flex;justify-content: center;align-items: center;">
            <div class="description-block margin-bottom">
                <h5 class="description-header">Count of achievements</h5>
                <h3 class="description-text">{{$statistic->getAchievementsCount()}}</h3>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
@endsection
