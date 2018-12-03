@extends('layouts.app-employee')

@section('content')
  


<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

<div class="container" style="max-width:85%; float: right;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h1 align="center">Zoznam zakaznikov</h1>

                <div class="panel-heading">
                    <div class="">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-4 text-right">
                                    <form class="form-inline" action="{{ route('employee\employee.users.list')}}" method="get">
                                        <div class="form-group">
                                            {{ csrf_field()}}
                                            <input type="text" class="form-control" name="search" placeholder="E-mail">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success" type="submit">Vyhľadať</button>
                                        </div>
                                    </form>

                                </div>

                                <div class="col-md-6 col-md-offset-0">
                                    Zoradiť:
                                    <a href="{{ route('employee\employee.users.list', ['email' => request('email'), 'sort' => 'asc'])}}"><i class="mdi mdi-sort-ascending"></i></a>
                                    <a style="margin-left:15px;" href="{{ route('employee\employee.users.list', ['email' => request('email'), 'sort' => 'dsc'])}}"><i class="mdi mdi-sort-descending"></i></a>
                                </div>
                            </div>
                            <table id="users-table" class="table table-bordered table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Meno</th>
                                        <th>Priezvisko</th>
                                        <th>
                                             <a class='btn-floating waves-effect green darken-4' href="{{ route('employee\employee.users.list', ['email' => request('emal'), 'sort_email' => 'asc'])}}"><i class='material-icons'>arrow_upward</i></a>
                                        E-mail
                                         <a class='btn-floating waves-effect green darken-4' style="margin-left:15px;" href="{{ route('employee\employee.users.list', ['email' => request('email'), 'sort_email' => 'dsc'])}}"><i class='material-icons'>arrow_downward</i></a>
                                        </th>
                                        <th>Mobil</th>
                                        <th>Cislo_OP</th>
                                        <th>Vek</th>
                                        <th>Vymazanie</th>
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
                                         <th> <center><a class='btn-floating  waves-effect red darken-4' href="{{route('employee\employee.user.delete',$user->id)}}"><i class='material-icons'>delete</i></a></center></th>
                                        <th> <center><a class='btn-floating  waves-effect blue darken-4' href="{{route('employee\employee.user.update',$user->id)}}"><i class='material-icons'>edit</i></a></center> </th>
                                      
                                        
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
