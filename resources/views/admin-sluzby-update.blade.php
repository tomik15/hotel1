@extends('layouts.app-admin')

@section('content')
   

    <div class="container" style="max-width:80%; margin-top: 40px;">
        <form action="{{ route('admin.sluzby.updateSluzby',$sluzby->id) }}" method="post">

            <div class="form-group">
                {{ csrf_field()}}
                <label for="Nazov">Nazov</label>
                <input type="text" class="form-control" name="nazov" placeholder="Enter nazov:string" value={{ $sluzby->nazov }}>
            </div>

            <div class="form-group">
                <label for="Priezvisko">Opakovanie</label>
                <input type="text" class="form-control" name="opakovanie" placeholder="Enter opakovanie:integer" value={{ $sluzby->opakovanie }}>
            </div>

            <div class="form-group">
              <label for="Izba">Cas</label>
                <input type="text" class="form-control" name="cas" placeholder="Enter cas:integer in format HHMM" value={{ $sluzby->cas }}>
            </div>
            <div class="form-group">
              <label for="cena">Cena</label>
                <input type="text" class="form-control" name="cena" placeholder="Enter cena:integer" value={{ $sluzby->cena }}>
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

             <button type="submit" class="btn btn-primary" href="{{route('admin.sluzby.list')}}" >Odoslať</button>
             
             
            
        </form>

    </div>

@endsection
