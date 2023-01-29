@extends('layouts.app')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-6">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <h5>{{$stations->first()->Nimi}} </h5>
                    <h5>({{$stations->first()->Namn}} | {{$stations->first()->Name}})</h5>
                    <p>{{$stations->first()->Osoite}} | {{$stations->first()->Adress}}</p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-3">
                    <p>Total number of journeys starting from the station</p>
                        <livewire:journeysstartedsum :stationId="$stations->first()->ID">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p>Total number of journeys ending at the station</p>
                    <livewire:journeysendedsum :stationId="$stations->first()->ID">
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-arrow-up fa-3x text-primary"></i>
                <div class="ms-3">
                    <p>The average distance of a journey starting from the station</p>
                    <livewire:stationstartaveragedistance :stationId="$stations->first()->ID">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-arrow-down fa-3x text-primary"></i>
                <div class="ms-3">
                    <p>The average distance of a journey ending at the station</p>
                    <livewire:stationendaveragedistance :stationId="$stations->first()->ID">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <div class="ms-3">
                    <p>Top 5 most popular return stations for journeys starting from the station</p>
                    <livewire:stationtop5started :stationId="$stations->first()->ID">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <div class="ms-3">
                    <p>Top 5 most popular departure stations for journeys ending at the station</p>
                    <livewire:stationtop5ended :stationId="$stations->first()->ID">
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded p-4">
                @if(isset($stations->first()->x) and isset($stations->first()->y))
                <x-maps-leaflet 
                    :centerPoint="['lat' => $stations->first()->y, 'long' => $stations->first()->x]" 
                    :markers="[['lat' => $stations->first()->y, 'long' => $stations->first()->x]]"
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

<script>
    window.onload = function () {
    
        const JournesEndedSum = document.getElementById('JournesEndedSum');
        const JournesStartedSum = document.getElementById('JournesStartedSum');
    
        const AverageStarted = document.getElementById('AverageStarted');
        const AverageEnded = document.getElementById('AverageEnded');

        var intervalId = null;
        let j = 0;
    
        intervalId = setInterval(myCallback, 100);
        function myCallback()
        {
            JournesStartedSum.innerHTML = '~' + j++;
            JournesEndedSum.innerHTML = '~' + j++;

            AverageStarted.innerHTML = '~' + j++;
            AverageEnded.innerHTML = '~' + j++;

            if(j >= 10000) {
            clearInterval(intervalId);
            }

        }
    };

</script>
    