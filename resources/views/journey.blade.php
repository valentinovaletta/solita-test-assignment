@extends('layouts.app')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-6">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Journey from <strong><a href="/station/{{$journey->first()->departure_station_id}}">{{$journey->first()->departure_station_name}}</a></strong> to <strong><a href="/station/{{$journey->first()->return_station_id}}">{{$journey->first()->return_station_name}}</a></strong></p>
                    <p class="mb-2">Took {{round( ($journey->first()->duration / 60), 1)}} minutes</p>
                    <p class="mb-2">Covered {{round( ($journey->first()->covered_distance / 1000), 1)}} kilometres</p>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded p-4">
                @if(isset($departure_station_XY->first()->y) and isset($return_station_XY->first()->y) and isset($return_station_XY->first()->x) and isset($return_station_XY->first()->x))
                <x-maps-leaflet 
                    :centerPoint="['lat' => $departure_station_XY->first()->y, 'long' => $departure_station_XY->first()->x]" 
                    :markers="[
                        ['lat' => $departure_station_XY->first()->y, 'long' => $departure_station_XY->first()->x],
                        ['lat' => $return_station_XY->first()->y, 'long' => $return_station_XY->first()->x]
                    ]"
                >
                </x-maps-leaflet>
                @else
                <p>There is no enough information to render a map.</p>
                @endif
            </div>
        </div>        
    </div>
</div>

@stop
