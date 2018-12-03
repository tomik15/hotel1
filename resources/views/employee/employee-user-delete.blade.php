@extends('layouts.app-employee')

@section('content')
    

    <div class="container" style="max-width:80%; margin-top: 40px">
        <form action="{{ route('employee\employee.user.deleteUser',$user->id) }}" method="post">
            <div class="form-group">
                {{ csrf_field()}}
                <label for="meno">Meno</label>
                <input type="text" class="form-control" name="name" placeholder="Meno uživateľa" value="{{$user->name}}">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{$user->email}}">
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
            <button type="submit" class="btn btn-primary">Vymazať</button>
        </form>

    </div>

@endsection
