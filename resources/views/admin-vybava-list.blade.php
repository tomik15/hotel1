@extends('layouts.app-admin')

@section('content')
  


    <div class="container" style="max-width:80%;">
        <div class="row">

            <div class="col-md-11 col-md-offset-2">
                <div class="panel panel-default">
                    <h1 align="center">Zoznam vybavy</h1>

                    <div class="panel-heading">
                        <div class="">
                            <div class="panel-body">
                                <div class="row">
                                  <!--Vyhladavanie-->
                            

                                </div>
                                <table id="vybava-table" class="table table-bordered table-striped table-condensed">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                             <th>
                                              <a class='btn-floating waves-effect green darken-4' href="{{ route('admin.vybava.list', ['stav' => request('stav'), 'sort_stav' => 'asc'])}}"><i class='material-icons'>arrow_upward</i></a>
                                               Stav
                                              <a class='btn-floating waves-effect green darken-4' style="margin-left:15px;" href="{{ route('admin.vybava.list', ['stav' => request('stav'), 'sort_stav' => 'dsc'])}}"><i class='material-icons'>arrow_downward</i></a>
                                             
                                            </th>
                                             <th>
                                              <a class='btn-floating waves-effect green darken-4' href="{{ route('admin.vybava.list', ['typ' => request('typ'), 'sort_typ' => 'asc'])}}"><i class='material-icons'>arrow_upward</i></a>
                                               Typ
                                              <a class='btn-floating waves-effect green darken-4' style="margin-left:15px;" href="{{ route('admin.vybava.list', ['typ' => request('typ'), 'sort_typ' => 'dsc'])}}"><i class='material-icons'>arrow_downward</i></a>
                                             
                                            </th>
                                       
                                            <th>
                                              <a class='btn-floating waves-effect green darken-4' href="{{ route('admin.vybava.list', ['cena' => request('cena'), 'sort_cena' => 'asc'])}}"><i class='material-icons'>arrow_upward</i></a>
                                               Cena(Eur)
                                              <a class='btn-floating waves-effect green darken-4' style="margin-left:15px;" href="{{ route('admin.vybava.list', ['cena' => request('cena'), 'sort_cena' => 'dsc'])}}"><i class='material-icons'>arrow_downward</i></a>
                                             
                                            </th>
                                              <th>Vymazanie</th>
                                              <th>Editácie</th>
                                                                                   
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vybava as $reg)
                                        <tr>
                                            <th>{{ $reg->id}}</th> 
                                            <th>{{ $reg->stav}}</th>
                                            <th>{{ $reg->typ}}</th>
                                            <th>{{ $reg->cena}}</th>
                                             <th> <center><a class='btn-floating  waves-effect red darken-4' href="{{route('admin.vybava.delete',$reg->id)}}"><i class='material-icons'>delete</i></a></center></th>
                                                 <th> <center><a class='btn-floating  waves-effect blue darken-4' href="{{route('admin.vybava.update',$reg->id)}}"><i class='material-icons'>edit</i></a></center>
                                                 </th>
                                                                                 

                                            

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $vybava ->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
