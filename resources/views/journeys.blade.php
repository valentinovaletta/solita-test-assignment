@extends('layouts.app')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Journeys</h6>
                <div class="table-responsive">
                    <livewire:journeytable :page="$page">
                </div>
            </div>
        </div>
    </div>
</div>
@stop
