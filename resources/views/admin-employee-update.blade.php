@extends('layouts.app-admin')

@section('content')
    

    <div class="container" style="max-width:80%; margin-top: 40px;">
        <form action="{{ route('admin.employee.updateEmployee',$employee->id) }}" method="post">
            <div class="form-group">
                {{ csrf_field()}}
                <label for="meno">Meno</label>
                <input type="text" class="form-control" name="name" placeholder="Meno uživateľa:string" value="{{$employee->name}}">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email:string" value="{{$employee->email}}">
            </div>
             <div class="form-group">
              <label for="email">Pozicia</label>
                <input type="text" class="form-control" name="job_title" aria-describedby="job-title" placeholder="Enter pozicia:string" value="{{$employee->job_title}}">
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
            <button type="submit" class="btn btn-primary" href="{{route('admin.employee.list')}}">Odoslať</button>
        </form>

    </div>

@endsection
