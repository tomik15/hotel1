@extends('layouts.app-admin')

@section('content')
    

    <div class="container" style="max-width:80%; margin-top: 40px;">
        <form action="{{ route('admin.vybava.insertVybava') }}" method="post">
            <div class="form-group">
                {{ csrf_field()}}
                <label for="meno">Stav</label>
                <input type="text" class="form-control" name="stav" placeholder="Enter stav vybavenia:string">
            </div>
            <div class="form-group">
              <label for="email">Typ</label>
                <input type="text" class="form-control" name="typ"  placeholder="Enter typ:string">
            </div>

            <div class="form-group">
              <label for="job_title">Cena </label>
                <input type="text" class="form-control" name="cena" placeholder="Enter cena:integer">
            </div>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    <br>
                @endif
            <button type="submit" class="btn btn-primary"  href="{{route('admin.vybava.list')}}">Odoslať</button> <!-- cesta bars nejde !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
        </form>

    </div>

@endsection
