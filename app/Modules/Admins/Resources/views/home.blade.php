@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="clearfix"></div>
    @include('flash::message')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Achievements map</h3>
        </div>
        <div class="box-body no-padding">
            <div class="row">
                <div class="col-md-9 col-sm-8">
                    <div id="map" style="width: 100%; height: 400px"></div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="pad box-pane-right bg-green"
                         style="min-height: 400px; display: flex;justify-content: center;align-items: center;">
                        <div class="description-block margin-bottom">
                            <h5 class="description-header">Count of achievements</h5>
                            <h3 class="description-text"></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection
