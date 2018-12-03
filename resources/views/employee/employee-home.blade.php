@extends('layouts.app-employee')

@section('content')
 

              
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card jumbotron" style="margin-top: 40px; text-align: center; font-size: 28px;">
                <div class="card-header">Employee Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as Employee!
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
