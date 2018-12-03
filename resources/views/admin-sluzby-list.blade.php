@extends('layouts.app-admin')

@section('content')
  

    <div class="container" style="max-width:80%;">
        <div class="row">

            <div class="col-md-11 col-md-offset-2">
                <div class="panel panel-default">
                    <h1 align="center">Zoznam sluzieb</h1>

                    <div class="panel-heading">
                        <div class="">
                            <div class="panel-body">
                              
                                <table id="sluzby-table" class="table table-bordered table-striped table-condensed">
                                    <thead>
                                        <tr>
                                          <th>ID</th>
                                          <th>Nazov</th> 
                                          <th>Opakovanie</th>                       
                                          <th>Cas vykonu</th>                        
                                             <th>
                                              <a class='btn-floating waves-effect green darken-4' href="{{ route('admin.sluzby.list', ['cena' => request('cena'), 'sort_cena' => 'asc'])}}"><i class='material-icons'>arrow_upward</i></a>
                                              Cena(EUR)
                                              <a class='btn-floating waves-effect green darken-4' style="margin-left:15px;" href="{{ route('admin.sluzby.list', ['cena' => request('cena'), 'sort_cena' => 'dsc'])}}"><i class='material-icons'>arrow_downward</i></a>
                                             
                                            </th>

                                          
                                            <th>Vymazanie</th>
                                            <th>Editácie</th>
                                                                                   
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sluzby as $reg)
                                        <tr>
                                            <th>{{ $reg->id}}</th> 
                                            <th>{{ $reg->nazov}}</th>
                                            <th>{{ $reg->opakovanie}}</th>
                                            <th>{{ $reg->cas}}</th>
                                            <th>{{ $reg->cena}}</th>   
                                          
                                             <th> <center><a class='btn-floating  waves-effect red darken-4' href="{{route('admin.sluzby.delete',$reg->id)}}"><i class='material-icons'>delete</i></a></center></th>
                                                <th> <center><a class='btn-floating  waves-effect blue darken-4' href="{{route('admin.sluzby.update',$reg->id)}}"><i class='material-icons'>edit</i></a></center>
                                              </th>
                                                                               
                                            

                                            

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $sluzby ->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
