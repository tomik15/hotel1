@extends('layouts.app-employee')

@section('content')
    

    <div class="container" style="max-width:80%; margin-top: 40px">
        <form action="{{ route('employee\employee.user.updateUser',$user->id) }}" method="post">
            <div class="form-group">
                {{ csrf_field()}}
                <label for="meno">Meno</label>
                <input type="text" class="form-control" name="name" placeholder="Meno uživateľa:string" value="{{$user->name}}">
            </div>
             <div class="form-group">
              <label for="mobil">Priezvisko</label>
                <input type="text" class="form-control" name="surname" aria-describedby="mobil" placeholder="Enter Surname:string" value="{{$user->surname}}">
            </div> 
            <div class="form-group">
              <label for="email">Email</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email:string" value="{{$user->email}}">
            </div>
            <div class="form-group">
              <label for="mobil">Mobil </label>
                <input type="text" class="form-control" name="mobil" aria-describedby="mobil" placeholder="Enter Mobil:string" value="{{$user->mobil}}">
            </div> 

             <div class="form-group">
              <label for="cislo_OP">Cislo OP </label>
                <input type="text" class="form-control" name="cislo_OP" aria-describedby="cislo_OP" placeholder="Enter Cislo OP:string" value="{{$user->cislo_OP}}">
            </div>

             <div class="form-group">
              <label for="surname">Vek</label>
                <input type="text" class="form-control" name="vek" aria-describedby="vek" placeholder="Enter Vek:integer"
                value="{{$user->vek}}">
            </div>  
          

            <div class="form-group">
                <label for="password">Heslo</label>
                <input type="password" class="form-control" name="password" placeholder="Heslo">
            </div>

            <div class="form-group">
                <label for="password">Potvrdenie hesla</label>
                <input type="password" class="form-control" name="password2" placeholder="Heslo">
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
            <button type="submit" class="btn btn-primary">Odoslať</button>
        </form>

    </div>

@endsection
