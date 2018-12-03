@extends('layouts.app-employee')

@section('content')


    <div class="container" style="max-width:80%; margin-top: 40px;">
        <form action="{{ route('employee\employee.registration.insertRegistration') }}" method="post">
             <div class="form-group">

                {{ csrf_field()}}
                <label for="Zaplatene">Sposob platby</label>
                <select name="payments" class="form-control">
                    <option value="Kartou">Kartou</option>
                    <option value="Hotovost">Hotovost</option>
                </select>
            </div>

              <div class="form-group">
              <label for="user">Email na zakaznika</label>
                <select name="user" class="form-control">
                    @foreach($users as $user)
                        <option value={{$user->id}}>{{$user->email}}></option>
                    @endforeach
               </select>
            </div>
          

            <div class="form-group">
              <label for="izba">Cislo Izby</label>
                <select name="izba" class="form-control">
                    @foreach($rooms as $izba)
                        <option value={{$izba->id}}>{{$izba->cislo}} ></option>
                    @endforeach
               </select>
            </div>

            <div class="form-group">
              <label for="sluzba">Sluzby</label>
                <select name="sluzba" class="form-control">
                    <option value="" disabled selected>Choose your option</option>
                    @foreach($sluzbies as $sluzba)
                        <option value={{$sluzba->id}}>{{$sluzba->nazov}}></option>
                    @endforeach

               </select>
            </div>



            <div class="form-group">
                <label for="date_birth">Dátum prichodu</label>
                <input type="date" class="form-control" name="date_of_arrival" placeholder="Datum prichodu">
            </div>

            <div class="form-group">
                <label for="date_death">Dátum odchodu</label>
                <input type="date" class="form-control" name="date_of_departure" placeholder="Dátum odchodu">
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

             <button type="submit" class="btn btn-primary" href="{{route('employee\employee.registration.list')}}" >Odoslať</button>
             
             
            
        </form>

    </div>

@endsection
