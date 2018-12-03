@extends('layouts.app-user')

@section('content')
  

    <div class="container" style="max-width:80%;">
        <div class="row">

            <div class="col-md-11 col-md-offset-2">
                <div class="panel panel-default">
                    <h1 align="center">Zoznam dostupnych sluzieb</h1>

                    <div class="panel-heading">
                        <div class="">
                            <div class="panel-body">
                                
                                <table id="sluzby-table" class="table table-bordered table-striped table-condensed">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>
                                         
                                              Nazov
                                            </th>
                                            <th>
                                    
                                         Opakovanie
                                            </th>

                                          

                                            <th>
                                             
                                              Cas
                                            </th>

                                              <th>
                                     
                                              Cena
                                            </th>

                                                                       
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
