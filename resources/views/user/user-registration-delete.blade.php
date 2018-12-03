@extends('layouts.app-user')
@section('content')
    

    <div class="container" style="width:80% ;margin-top: 15px">
        <form action="{{ route('user\user.registration.deleteRegistration',$registration->id) }}" method="post">
            <div class="form-group">
                {{ csrf_field()}}
                <label for="id">ID</label>
                <input type="text" class="form-control" name="id" placeholder="ID registracie" value="{{$registration->id}}">
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
