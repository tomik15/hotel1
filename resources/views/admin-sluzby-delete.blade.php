@extends('layouts.app-admin')
@section('content')
    

    <div class="container" style="max-width:80%; margin-top: 40px;">
        <form action="{{ route('admin.sluzby.deleteSluzby',$sluzby->id) }}" method="post">
            <div class="form-group">
                {{ csrf_field()}}
                <label for="Nazov">Nazov sluzby</label>
                <input type="text" class="form-control" name="nazov" placeholder="Nazov sluzby"  value={{ $sluzby->nazov }} >
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
