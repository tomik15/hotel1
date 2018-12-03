@extends('layouts.app-admin')

@section('content')
    

    <div class="container" style="max-width:80%; margin-top: 40px;">
        <form action="{{ route('admin.room.updateRoom',$room->id)}}" method="post">

          <div class="form-group">
              {{ csrf_field()}}
              <label for="cislo">Cislo</label>
              <input type="text" class="form-control" name="cislo" placeholder="Cislo Izby:integer " value={{ $room->cislo }} >
          </div>

         
         
               <div class="form-group ">
              <label  for="obsadenost_izby">Obsadenost izby</label>
                <select name="obsadenost_izby" class="form-control">                   
                        
                          <option value="Neobsadene">Neobsadene</option>
                          <option value="Obsadene">Obsadene</option>
                       
                 
                </select>
            </div>

          <div class="form-group">
              <label for="Izba">Pocet lozok</label>
                <input type="text" class="form-control" name="pocet_rezervovanych_lozok" placeholder="Pocet  lozok:integer"  value={{ $room->pocet_rezervovanych_lozok }}>
            </div>

          <div class="form-group">
            <label for="Max kapacita izby">Kapacita izby</label>
              <input type="text" class="form-control" name="max_kapacita_izby" placeholder="Max kapacita izby:integer" value={{ $room->max_kapacita_izby}}>
          </div>

             <div class="form-group ">
              <label  for="vybava">Typ vybavy</label>
                <select name="vybava" class="form-control">
                    @foreach($vybavas as $vybava)
                        <option value={{ $vybava->id }}>{{ $vybava->typ }}</option>
                    @endforeach
                </select>
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
            <button type="submit" class="btn btn-primary">Odoslať</button>
        </form>

    </div>
@endsection
