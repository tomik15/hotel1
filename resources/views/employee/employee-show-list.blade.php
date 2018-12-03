@extends('layouts.app-employee')

@section('content')



    <div class="container" style="max-width:80%;">
        <div class="row">

            <div class="col-md-11 col-md-offset-2">
                <div class="panel panel-default">
                    <h1 align="center">Zoznam dostupnych izieb</h1>

                    <div class="panel-heading">
                        <div class="">
                            <div class="panel-body">
                             
                                <table id="rooms-table" class="table table-bordered table-striped table-condensed" border=1 width="400">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>
                                          
                                               Cislo
                                              
                                            </th>
                                                                                  

                                            <th >
                                                                                      
                                              Obsadenost izby
                                                
                                            </th>
                                             <th>                                          
                                              Pocet lozok
                                            </th>
                                            <th>                                         
                                              Kapacita izby
                                           </th>
                                            <th>
                                          
                                               Typ vybavy
                                             
                                            </th>
                                               <th>
                                          
                                                Cena(EUR)
                                             
                                            </th>
                                             <th>
                                          
                                                Registrovat
                                             
                                            </th>
                                             

                                           
                                          
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

                                               <th> <center><a class='btn-floating  waves-effect orange darken-4' href="{{route('employee\employee.registration.insert')}}"><i class='material-icons'>edit</i></a></center>
                                                 </th>

                                             

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
