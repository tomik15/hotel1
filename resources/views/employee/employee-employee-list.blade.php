@extends('layouts.app-employee')

@section('content')
     

<div class="container" style="max-width: 80%; float: right;">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h1 align="center">Zoznam Zamestnancov Hotela</h1>

                <div class="panel-heading">
                    <div class="">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-4 text-right">
                                    <form class="form-inline" action="{{ route('employee\employee.employee.list')}}" method="get">
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
                                    <a href="{{ route('employee\employee.employee.list', ['email' => request('email'), 'sort' => 'asc'])}}"><i class="mdi mdi-sort-ascending"></i></a>
                                    <a style="margin-left:15px;" href="{{ route('employee\employee.employee.list', ['email' => request('email'), 'sort' => 'dsc'])}}"><i class="mdi mdi-sort-descending"></i></a>
                                </div>
                            </div>
                            <table id="users-table" class="table table-bordered table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Meno</th>
                                         <th>Pozicia</th>
                                        <th>
                                             <a class='btn-floating waves-effect green darken-4' href="{{ route('employee\employee.employee.list', ['email' => request('emal'), 'sort_email' => 'asc'])}}"><i class='material-icons'>arrow_upward</i></a>
                                        E-mail
                                         <a class='btn-floating waves-effect green darken-4' style="margin-left:15px;" href="{{ route('employee\employee.employee.list', ['email' => request('email'), 'sort_email' => 'dsc'])}}"><i class='material-icons'>arrow_downward</i></a>
                                        </th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <th>{{ $user->id}}</th>
                                        <th>{{ $user->name}}</th>
                                        <th>{{ $user->job_title}}</th>
                                        <th>{{ $user->email}}</th>
                                        
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
