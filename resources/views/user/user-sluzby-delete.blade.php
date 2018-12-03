@extends('layouts.app-user')
@section('content')
    

    <div style="width:500px;display:inline-block">
        <form action="{{ route('user\user.sluzby.deleteSluzby',$registration->id) }}" method="post">
            <div class="form-group">
                {{ csrf_field()}}
                <label for="id">ID</label>
                <input type="text" class="form-control" name="id" placeholder="ID" value="{{$registration->id}}">
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
