@extends('layouts.app-user')

@section('content')
   

    <div style="width:500px;display:inline-block">
        <form action="{{ route('user\user.sluzby.insertSluzby') }}" method="post">

            <div class="form-group">
                {{ csrf_field()}}
                <label for="Nazov">nazov</label>
                <input type="text" class="form-control" name="nazov" placeholder="Nazov">
            </div>

            <div class="form-group">
                <label for="Priezvisko">opakovanie</label>
                <input type="text" class="form-control" name="opakovanie" placeholder="opakovanie">
            </div>

            <div class="form-group">
              <label for="Izba">cas</label>
                <input type="text" class="form-control" name="cas" placeholder="cas">
            </div>
            <div class="form-group">
              <label for="cena">cena</label>
                <input type="text" class="form-control" name="cena" placeholder="cena">
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

             <button type="submit" class="btn btn-primary" href="{{route('user\user.sluzby.list')}}" >Odoslať</button>
             
             
            
        </form>

    </div>

@endsection
