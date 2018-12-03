@extends('layouts.app-employee')

@section('content')
   

    <div class="container" style="max-width:80%; margin-top: 40px">
        <form action="{{ route('employee\employee.sluzby.insertSluzby') }}" method="post">

            <div class="form-group">
                {{ csrf_field()}}
                <label for="Nazov">Nazov</label>
                <input type="text" class="form-control" name="nazov" placeholder="Enter nazov:string">
            </div>

            <div class="form-group">Opakovanie</label>
                <input type="text" class="form-control" name="opakovanie" placeholder="Enter opakovanie:integer">
            </div>

            <div class="form-group">
              <label for="Izba">Cas vykonu</label>
                <input type="text" class="form-control" name="cas" placeholder="Enter cas:integer in format HHMM">
            </div>
            <div class="form-group">
              <label for="cena">Cena</label>
                <input type="text" class="form-control" name="cena" placeholder="Enter cena:integer">
            </div>         
             

            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                </label>
            </div>
              @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    <br>
                @endif

             <button type="submit" class="btn btn-primary" href="{{route('employee\employee.sluzby.list')}}" >Odoslať</button>
             
             
            
        </form>

    </div>

@endsection
