<span wire:init="init">
    @if ($loadData)
    <table class="table">
        <thead>
            <tr>      
                <th scope="col">
                    № <span wire:click="sort('id')" class="badge bg-secondary"><i class="fa fa-compass" title="Change Sort"></i></span>
                    <input wire:model="searchId" type="text" class="form-control form-control-sm" id="id">
                </th>
                <th scope="col">
                    Departure Station Name <span wire:click="sort('departure_station_name')" class="badge bg-secondary"><i class="fa fa-compass" title="Change Sort"></i></span>
                    <input wire:model="searchdsn" type="text" class="form-control form-control-sm" id="dsn">
                </th>
                <th scope="col">
                    Return Station Name <span wire:click="sort('return_station_name')" class="badge bg-secondary"><i class="fa fa-compass" title="Change Sort"></i></span>
                    <input wire:model="searchrsn" type="text" class="form-control form-control-sm" id="rsn">
                </th>
                <th scope="col">
                    Covered Distance (km) <span wire:click="sort('covered_distance')" class="badge bg-secondary"><i class="fa fa-compass" title="Change Sort"></i></span>
                    <input wire:model="searchdistance" type="text" class="form-control form-control-sm" id="distance">
                </th>
                <th scope="col">
                    Duration (m) <span wire:click="sort('duration')" class="badge bg-secondary"><i class="fa fa-compass" title="Change Sort"></i></span>
                    <input wire:model="searchduration" type="text" class="form-control form-control-sm" id="duration">
                </th>
            </tr>
        </thead>                        
        <tbody>
            @foreach($journeys as $journey)
            <tr class="small">
                <td><a href="/journey/{{$journey->id}}">{{$journey->id}}</a></td>
                <td><a href="/station/{{$journey->departure_station_id}}">{{$journey->departure_station_name}}</a></td>
                <td><a href="/station/{{$journey->return_station_id}}">{{$journey->return_station_name}}</a></td>
                <td>{{round( ($journey->covered_distance / 1000), 1)}}</td>
                <td>{{round( ($journey->duration / 60), 1)}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="100%">
                    <livewire:journeytablepagination :page="$page">
                </td>
            </tr>    
        </tfoot>
    </table>    
    @else
    <span></span>
    @endif
</span>