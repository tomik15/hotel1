@extends('layouts.app-employee')

@section('content')
  


    <div class="container" style="max-width:80%;">
        <div class="row">

            <div class="col-md-11 col-md-offset-2">
                <div class="panel panel-default">
                    <h1 align="center">Zoznam izieb</h1>

                    <div class="panel-heading">
                        <div class="">
                            <div class="panel-body">
                                
                                <table id="rooms-table" class="table table-bordered table-striped table-condensed">
                                    <thead>
                                        <tr>
                                           <th>ID</th>
                                            <th>
                                           <a class='btn-floating waves-effect green darken-4' href="{{ route('employee\employee.rooms.list', ['cislo' => request('cislo'), 'sort_cislo' => 'asc'])}}"><i class='material-icons'>arrow_upward</i></a>
                                               Cislo
                                              <a class='btn-floating waves-effect green darken-4' style="margin-left:15px;" href="{{ route('employee\employee.rooms.list', ['cislo' => request('cislo'), 'sort_cislo' => 'dsc'])}}"><i class='material-icons'>arrow_downward</i></a>
                                            </th>
                                           
                                            <th >
                                            <a class='btn-floating waves-effect green darken-4' href="{{ route('employee\employee.rooms.list', ['obsadenost_izby' => request('obsadenost_izby'), 'sort_obsadenost_izby' => 'asc'])}}"><i class='material-icons'>arrow_upward</i></a>                                           
                                              Obsadenost izby
                                                 <a class='btn-floating waves-effect green darken-4' style="margin-left:15px;" href="{{ route('employee\employee.rooms.list', ['obsadenost_izby' => request('obsadenost_izby'), 'sort_obsadenost_izby' => 'dsc'])}}"><i class='material-icons'>arrow_downward</i>
                                            </th>
                                             <th>                                          
                                              Pocet lozok
                                            </th>
                                            <th>                                         
                                             Max kapacita izby
                                           </th>
                                            <th>
                                           <a class='btn-floating waves-effect green darken-4' href="{{ route('employee\employee.rooms.list', ['typ_vybavy' => request('typ_vybavy'), 'sort_typ_vybavy' => 'asc'])}}"><i class='material-icons'>arrow_upward</i></a>
                                               Typ vybavy
                                              <a class='btn-floating waves-effect green darken-4' style="margin-left:15px;" href="{{ route('employee\employee.rooms.list', ['typ_vybavy' => request('typ_vybavy'), 'sort_typ_vybavy' => 'dsc'])}}"><i class='material-icons'>arrow_downward</i></a>
                                            </th>
                                            <th>                                         
                                            Cena izby(EUR)
                                           </th>

                                            <th>Vymazanie</th>
                                            <th>Editácie</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rooms as $room)
                                        <tr>
                                            <th>{{ $room->id}}</th> 
                                             <th>{{ $room->cislo}}</th>
                                            
                                            <th>{{ $room->obsadenost_izby}}</th>
                                            <th>{{ $room->pocet_rezervovanych_lozok}}</th>
                                            <th>{{ $room->max_kapacita_izby}}</th>
                                            <th>{{$vybava=DB::table('vybavas')->where('id',$room->id_vybavy)->first()->typ}}</th>
                                             <th>{{$vybava=DB::table('vybavas')->where('id',$room->id_vybavy)->first()->cena}}</th>

                                            <th> <center><a class='btn-floating  waves-effect red  darken-4' href="{{route('employee\employee.room.delete',$room->id)}}"><i class='material-icons'>delete</i></a></center></th>
                                            <th> <center><a class='btn-floating  waves-effect blue darken-4' href="{{route('employee\employee.room.update',$room->id)}}"><i class='material-icons'>edit</i></a></center></th>


                                            

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $rooms ->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
