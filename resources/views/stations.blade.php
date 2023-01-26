@extends('layouts.app')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Stations</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nimi</th>
                                <th scope="col">Namn</th>
                                <th scope="col">Name</th>
                                <th scope="col">Osoite</th>
                                <th scope="col">Adress</th>
                                <th scope="col">Kaupunki</th>
                                <th scope="col">Stad</th>
                                <th scope="col">Operaattor</th>
                                <th scope="col">Kapasiteet</th>
                                <th scope="col">X,Y</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stations as $station)
                            <tr class="small">
                                <td><a href="/station/{{$station->ID}}">{{$station->Nimi}}</a></td>
                                <td>{{$station->Namn}}</td>
                                <td>{{$station->Name}}</td>
                                <td>{{$station->Osoite}}</td>
                                <td>{{$station->Adress}}</td>
                                <td>{{$station->Kaupunki}}</td>
                                <td>{{$station->Stad}}</td>
                                <td>{{$station->Operaattor}}</td>    
                                <td>{{$station->Kapasiteet}}</td>                                         
                                <td>{{$station->x, $station->y}}</td>                                                                              
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="9"> 
                                    <div class="btn-toolbar" role="toolbar">
                                        @if($stations->currentPage() > 1)
                                        <div class="btn-group me-2" role="group" aria-label="First group">
                                            <a type="button" href="/journeys?page=1" class="btn btn-primary"><i class="fa fa-arrow-left ms-2"></i> 1</a>
                                            @if($stations->currentPage() > 2)
                                            <a type="button" href="/stations?page={{($stations->currentPage()-1)}}" class="btn btn-primary">{{($stations->currentPage()-1)}}</a>
                                            @endif
                                        </div>
                                        @endif

                                        <div class="btn-group me-2" role="group" aria-label="Second group">
                                            <a type="button" href="/stations?page={{($stations->currentPage())}}" class="btn btn-secondary">{{($stations->currentPage())}}</a>
                                        </div>

                                        @if($stations->currentPage() < $stations->lastPage())
                                        <div class="btn-group" role="group" aria-label="Third group">
                                            @if($stations->currentPage() < ($stations->lastPage()-1))
                                            <a type="button" href="/stations?page={{($stations->currentPage()+1)}}" class="btn btn-info">{{($stations->currentPage()+1)}}</a>
                                            @endif
                                            <a type="button" href="/stations?page={{($stations->lastPage())}}" class="btn btn-info">{{($stations->lastPage())}} <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>    
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
