@extends('layouts.app-user')

@section('content')
  


<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    <div class="container" style="max-width: 80%;">
            <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h1 align="center">Moje Udaje</h1>

                <div class="panel-heading">
                    <div class="">
                        <div class="panel-body">
                       

                       
                            <table id="users-table" class="table table-bordered table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Meno</th>
                                        <th>Priezvisko</th>
                                        <th>
                                   
                                        E-mail
                                        
                                        </th>
                                        <th>Mobil</th>
                                        <th>Cislo_OP</th>
                                        <th>Vek</th>
                                       
                                        <th>Editácie</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <th>{{ $user->id}}</th>
                                        <th>{{ $user->name}}</th>
                                         <th>{{ $user->surname}}</th>
                                        <th>{{ $user->email}}</th>
                                        <th>{{ $user->mobil}}</th>
                                        <th>{{ $user->cislo_OP}}</th>
                                        <th>{{ $user->vek}}</th>
                                       
                                       <th> <center><a class='btn-floating  waves-effect blue darken-4' href="{{route('user\user.user.update',$user->id)}}"><i class='material-icons'>edit</i></a></center> </th>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users ->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
