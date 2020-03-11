@extends('layouts.frontend')
@section('content')
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Weather</h1>
        <p class="lead">Quickly get information about weather from few services. Such as Yandex, OpenWeatherMap etc</p>
    </div>

    <div class="card-deck mb-3 text-center">
        @foreach($servicesTemp as $city => $services)
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">{{ $city }}</h4>
                </div>
                <div class="card-body">
                    @foreach ($services as $serviceName => $temp)
                        <h1 class="card-title pricing-card-title">{{ $temp }} <small class="text-muted">/ {{$serviceName}}</small></h1>
                    @endforeach
                </div>
            </div>
        @endforeach()
    </div>
@endsection()