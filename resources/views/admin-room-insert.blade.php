@extends('layouts.app-admin')

@section('content')


    <div class="container" style="max-width:80%; margin-top: 40px;">
        <form action="{{ route('admin.room.insertRoom') }}" method="post">

            <div class="form-group">
                {{ csrf_field()}}
                <label for="meno">Cislo</label>
                <input type="text" class="form-control" name="cislo" placeholder="Cislo:integer">
            </div>

         
                 

               <div class="form-group ">
              <label  for="obsadenost_izby">Obsadenost izby</label>
                <select name="obsadenost_izby" class="form-control">                   
                         <option value="" disabled selected>Choose your option</option>
                          <option value="Neobsadene">Neobsadene</option>
                          <option value="Obsadene">Obsadene</option>
                       
                 
                </select>
            </div>
                          
      

            <div class="form-group">
              <label for="Izba">Pocet  lozok</label>
                <input type="text" class="form-control" name="pocet_rezervovanych_lozok" placeholder="Pocet rezervovanych lozok:integer">
            </div>

            <div class="form-group">
              <label for="Izba">Max kapacita izby</label>
                <input type="text" class="form-control" name="max_kapacita_izby" placeholder="Max kapacita izby:integer">
            </div>


             <div class="form-group ">
              <label  for="vybava">Typ vybavy</label>
                <select name="vybava" class="form-control">
                  <option value="" disabled selected>Choose your option</option>
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

             <button type="submit" class="btn btn-primary" href="{{route('admin.rooms.list')}}" >Odoslať</button>
             
             
            
        </form>

    </div>

@endsection
