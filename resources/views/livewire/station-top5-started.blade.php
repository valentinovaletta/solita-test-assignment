<span wire:init="init">
    @if ($loadData)

        @foreach($top5started as $i=>$station)
        <p>{{++$i}}) <a href="/station/{{$station->return_station_id}}">{{$station->return_station_name}}</a> ({{$station->count}})</p>
        @endforeach

    @else
    <span><h6>~</h6></span>
    @endif
</span>