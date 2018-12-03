@extends('layouts.app-admin')

@section('content')



    <div class="container" style="max-width:80%;">
        <div class="row">

            <div class="col-md-11 col-md-offset-2">
                <div class="panel panel-default">
                    <h1 align="center">Zoznam registracii</h1>

                    <div class="panel-heading">
                        <div class="">
                            <div class="panel-body">
                             
                                <table id="registration-table" class="table table-bordered table-striped table-condensed">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>
                                         
                                              Meno
                                            </th>
                                            <th>
                                             
                                              Priezvisko
                                            </th>
                                            <th>
                                             
                                              Kontakt
                                            </th>

                                          

                                            <th>
                                          
                                              Cislo Izby
                                            </th>
                                          
                                            <th>
                                              SLuzba
                                            </th>  
                                            <th>
                                              Cena SLuzby
                                            </th>  
                                              <th>
                                           
                                              Sposob platby
                                            </th>


                                            <th>
                                           
                                              Dátum prichodu</th>
                                            <th>
                                             
                                              Dátum odchodu</th>
                                            <th>Vymazanie</th>
                                            <th>Editácie</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($registrations as $registration)
                                        <tr>
                                            <th>{{ $registration->id}}</th> 

                                        <th>{{$user=DB::table('users')->where('id',$registration->id_user)->first()->name}}</th> 

                                        <th>{{$user=DB::table('users')->where('id',$registration->id_user)->first()->surname}}</th> 
                                        <th>{{$user=DB::table('users')->where('id',$registration->id_user)->first()->email}}</th>                                     

                                            <th>{{$izba=DB::table('rooms')->where('id',$registration->id_rooms)->first()->cislo}}</th>

                                            
                                             <th>{{$sluzba=DB::table('sluzbies')->where('id',$registration->id_sluzby)->first()->nazov}}</th>
                                             <th>{{$sluzba=DB::table('sluzbies')->where('id',$registration->id_sluzby)->first()->cena}}</th>

                                            <th>{{ $registration->payments}}</th>
                                            <th>{{ $registration->date_of_arrival}}</th>
                                            <th>{{ $registration->date_of_departure}}</th>
                                             <th> <center><a class='btn-floating  waves-effect red darken-4' href="{{route('admin.registration.delete',$registration->id)}}"><i class='material-icons'>delete</i></a></center></th>
                                            <th> <center><a class='btn-floating  waves-effect blue darken-4' href="{{route('admin.registration.update',$registration->id)}}"><i class='material-icons'>edit</i></a></center>
                                              </th>


                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $registrations->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
