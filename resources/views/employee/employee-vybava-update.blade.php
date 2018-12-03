@extends('layouts.app-employee')

@section('content')
    

    <div class="container" style="max-width:80%; margin-top: 40px">
        <form action="{{ route('employee\employee.vybava.updateVybava',$vybava->id) }}" method="post">
            <div class="form-group">
                {{ csrf_field()}}
                <label for="meno">Stav</label>
                <input type="text" class="form-control" name="stav" placeholder="Enter stav:string" value="{{$vybava->stav}}" >
            </div>
            <div class="form-group">
              <label for="email">Typ</label>
                <input type="text" class="form-control" name="typ"  placeholder="Enter typ:string"  value="{{$vybava->typ}}" >
            </div>

            <div class="form-group">
              <label for="job_title">Cena </label>
                <input type="text" class="form-control" name="cena" placeholder="Enter cena:integer"  value="{{$vybava->cena}}" >
            </div>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    <br>
                @endif
            <button type="submit" class="btn btn-primary"  href="{{route('employee\employee.vybava.list')}}">Odoslať</button> <!-- cesta bars nejde !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
        </form>

    </div>

@endsection
