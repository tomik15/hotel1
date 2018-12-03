@extends('layouts.app-employee')

@section('content')
    
    <div class="container" style="max-width:80%; margin-top: 40px">
        <form action="{{ route('employee\employee.user.insertUser') }}" method="post">
            <div class="form-group">
                {{ csrf_field()}}
                <label for="name">Meno</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Meno">
            </div>
            <div class="form-group">
              <label for="surname">Priezvisko </label>
                <input type="text" class="form-control" name="surname" aria-describedby="surname" placeholder="Enter Priezvisko">
            </div>    

            <div class="form-group">
              <label for="email">Email</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>

            <div class="form-group">
              <label for="mobil">Mobil </label>
                <input type="text" class="form-control" name="mobil" aria-describedby="mobil" placeholder="Enter Mobil">
            </div> 

             <div class="form-group">
              <label for="cislo_OP">Cislo OP </label>
                <input type="text" class="form-control" name="cislo_OP" aria-describedby="cislo_OP" placeholder="Enter Cislo OP">
            </div>

             <div class="form-group">
              <label for="surname">Vek</label>
                <input type="text" class="form-control" name="vek" aria-describedby="vek" placeholder="Enter Vek">
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
            <button type="submit" class="btn btn-primary"  href="{{route('employee\employee.users.list')}}">Odoslať</button> <!-- cesta bars nejde !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
        </form>

    </div>

@endsection
