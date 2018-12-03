@extends('layouts.app-admin')

@section('content')


<div class="container" style="max-width:80%; float: right;">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h1 align="center">Zoznam Zamestnancov Hotela</h1>

                <div class="panel-heading">
                    <div class="">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-4 text-right">
                                    <form class="form-inline" action="{{ route('admin.employee.list')}}" method="get">
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
                                    <a href="{{ route('admin.employee.list', ['email' => request('email'), 'sort' => 'asc'])}}"><i class="mdi mdi-sort-ascending"></i></a>
                                    <a style="margin-left:15px;" href="{{ route('admin.employee.list', ['email' => request('email'), 'sort' => 'dsc'])}}"><i class="mdi mdi-sort-descending"></i></a>
                                </div>
                            </div>
                            <table id="employees-table" class="table table-bordered table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Meno</th>
                                         <th>Pozicia</th>
                                     <th>
                                             <a class='btn-floating waves-effect green darken-4' href="{{ route('admin.employee.list', ['email' => request('emal'), 'sort_email' => 'asc'])}}"><i class='material-icons'>arrow_upward</i></a>
                                        E-mail
                                         <a class='btn-floating waves-effect green darken-4' style="margin-left:15px;" href="{{ route('admin.employee.list', ['email' => request('email'), 'sort_email' => 'dsc'])}}"><i class='material-icons'>arrow_downward</i></a>
                                        </th>

                                        <th>Vymazanie</th>
                                        <th>Editácie</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                    <tr>
                                        <th>{{ $employee->id}}</th>
                                        <th>{{ $employee->name}}</th>
                                        <th>{{ $employee->job_title}}</th>
                                        <th>{{ $employee->email}}</th>
                                         <th> <center><a class='btn-floating  waves-effect red darken-4' href="{{route('admin.employee.delete',$employee->id)}}"><i class='material-icons'>delete</i></a></center></th>
                                           <th> <center><a class='btn-floating  waves-effect blue darken-4' href="{{route('admin.employee.update',$employee->id)}}"><i class='material-icons'>edit</i></a></center>
                                      </th>
                                     
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $employees ->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
     
 </div>
@endsection
