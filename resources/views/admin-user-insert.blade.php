@extends('layouts.app-admin')

@section('content')
    
    <div class="container" style="max-width:80%; margin-top: 40px;">
        <form action="{{ route('admin.user.insertUser') }}" method="post">
            <div class="form-group">
                {{ csrf_field()}}
                <label for="name">Meno</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Meno:string">
            </div>
            <div class="form-group">
              <label for="surname">Priezvisko </label>
                <input type="text" class="form-control" name="surname" aria-describedby="surname" placeholder="Enter Priezvisko:string">
            </div>    

            <div class="form-group">
              <label for="email">Email</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>

            <div class="form-group">
              <label for="mobil">Mobil </label>
                <input type="text" class="form-control" name="mobil" aria-describedby="mobil" placeholder="Enter Mobil:string">
            </div> 

             <div class="form-group">
              <label for="cislo_OP">Cislo OP </label>
                <input type="text" class="form-control" name="cislo_OP" aria-describedby="cislo_OP" placeholder="Enter Cislo OP:string">
            </div>

             <div class="form-group">
              <label for="surname">Vek</label>
                <input type="text" class="form-control" name="vek" aria-describedby="vek" placeholder="Enter Vek:integer">
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
            <button type="submit" class="btn btn-primary"  href="{{route('admin.users.list')}}">Odoslať</button> <!-- cesta bars nejde !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
        </form>

    </div>

@endsection
