@extends('layouts.app-employee')
@section('content')
    

    <div class="container" style="max-width:80%; margin-top: 40px">
        <form action="{{ route('employee\employee.room.deleteRoom',$room->id) }}" method="post">
            <div class="form-group">
                {{ csrf_field()}}
                <label for="Cislo">Cislo izby</label>
                <input type="text" class="form-control" name="cislo" placeholder="Cislo izby" value={{ $room->cislo }}  >
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
