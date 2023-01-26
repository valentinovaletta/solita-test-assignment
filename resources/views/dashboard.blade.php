@extends('layouts.app')

@section('average')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <a href="/journeys"
                    <p class="mb-2">Total Journeys</p>
                    <livewire:journeycount />
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                    <a href="/stations"
                    <p class="mb-2">Total Stations</p>
                    <h6 class="mb-0">{{$station}}</h6>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Average distance</p>
                    <h6 class="mb-0">{{$avgDistance}} meters </h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Average duration</p>
                    <h6 class="mb-0">{{$avgDuration}} seconds</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Journeys</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>      
                                <th scope="col">Id</th>
                                <th scope="col">Departure Station Name</th>
                                <th scope="col">Departure Time</th>
                                <th scope="col">Return Station Name</th>
                                <th scope="col">Return Time</th>
                                <th scope="col">Covered Distance (km)</th>
                                <th scope="col">Duration (m)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($journeys as $journey)
                            <tr class="small">
                                <td><a href="/journey/{{$journey->id}}">{{$journey->id}}</a></td>
                                <td><a href="/station/{{$journey->departure_station_id}}">{{$journey->departure_station_name}}</a></td>
                                <td>{{$journey->departure_time}}</td>
                                <td><a href="/station/{{$journey->return_station_id}}">{{$journey->return_station_name}}</a></td>
                                <td>{{$journey->return_time}}</td>
                                <td>{{round( ($journey->covered_distance / 1000), 1)}}</td>
                                <td>{{round( ($journey->duration / 60), 1)}}</td>                                         
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop