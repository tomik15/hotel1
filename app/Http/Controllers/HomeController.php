<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Registration;
use App\Sluzby;
use App\Vybava;
use App\Show_info;
use App\Rooms;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user-home');
    }

    public function showList(){
     // $userId=Aut::user()->id;
     // $registration=DB::table('users',$userId)->get();

      $rooms=DB::table('rooms')->where('obsadenost_izby','Neobsadene');
     if(request()->has('search')){
            $find = request('search');
            $pattern = ".*" . $find . ".*";
            $where = request('searchWhere');
            $rooms = DB::table('rooms')->where($where,'REGEXP',$pattern);
        }   

            if(request()->has('sort_cislo')){
            $rooms = $rooms->orderBy('cislo',request('sort_cislo'));
        }
        
      
         if(request()->has('sort_obsadenost_izby')){
            $rooms = $rooms->orderBy('obsadenost_izby',request('sort_obsadenost_izby'));
            
        }
        if(request()->has('sort_pocet_rezervovanych_lozok')){
            $rooms = $rooms->orderBy('pocet_rezervovanych_lozok',request('sort_pocet_rezervovanych_lozok'));
            
        }
       
        if(request()->has('sort_max_kapacita_izby')){
            $rooms = $rooms->orderBy('max_kapacita_izby',request('sort_max_kapacita_izby'));
        }
        if(request()->has('sort_typ_vybavy')){
            $rooms = $rooms->orderBy('typ_vybavy',request('sort_typ_vybavy'));
        }

          $rooms = $rooms->paginate(10)->appends([
            'romm' => request('room'),
            'sort'  => request('sort')
        ]);

        
        return view('user\user-show-list',compact('rooms'),compact('vybavas'));
    }

     /////////////////////////////////////////////////REGISTRATION   ///////////////////////////////////
    public function RegistrationlList(){
      $userId=Auth::user()->id;            
      $registrations=DB::TABLE('registration')->where('id_user',$userId)->paginate(10);     
      
        return view('user\user-registration-list', compact('registrations'));
    }
    public function newRegistration(){
        $rooms=DB::table('rooms')->get();
        $sluzbies=DB::table('sluzbies')->get();       
        $userId=Auth::user()->id;        
        $users=DB::TABLE('users')->where('id',$userId)->get();

        return view('user\user-registration-insert',(compact('users','sluzbies','rooms')));
    }


    public function insertRegistration(Request $request) {///toto v funkcii Request $request 
         if ($request->input('sluzba') == NULL ||$request->input('date_of_arrival') == NULL ||  $request->input('date_of_departure') == NULL){
                  return redirect()->back()->with('status','Musia byť vyplnene všetky položky');
              }
      $data = array(
          'id_user' => $request->input('user'),
          'id_rooms' => $request->input('izba'),
          'id_sluzby' => $request->input('sluzba'),
          'payments' => $request->input('payments'),         
          'date_of_arrival' => $request->input('date_of_arrival'),
          'date_of_departure' => $request->input('date_of_departure')
      );
       // DB::table('show_infos')->insert(['show_rooms_id' =>$request->input('izba')]);
      $dostupnost=$request->input('izba');
     // $ahoj='id_rooms' => $request->input('izba'),
      $rooms=DB::table('rooms')->where('id', $dostupnost)->update(['obsadenost_izby'=>'Obsadene']);
      DB::table('registration')->insert($data);
      return redirect()->intended(route('user\user.registration.list'));///!!!!!!!!!!!!!!bolo admin.registration.list
    //return $this->RegistrationlList($id);
    }
    //
      public function tryDeleteteRegistration($id){
        $registration = DB::table('registration')->where('id',$id)->first();
        return view('user\user-registration-delete',compact('registration'));
    }

    public function deleteRegistration($id){
        DB::table('registration')->where('id',$id)->delete();
        return redirect()->intended(route('user\user.registration.list'));
    }
    ////////////////////////////////////////SLUZBY////////////////////////////////////////////////////////////////
    public function sluzbyList(){
    $sluzby= new Sluzby;
     if(request()->has('search')){
            $find = request('search');
            $pattern = ".*" . $find . ".*";
            $where = request('searchWhere');
            $sluzby = DB::table('sluzbies')->where($where,'REGEXP',$pattern);
        }   

            if(request()->has('sort_nazov')){
            $sluzby = $sluzby->orderBy('nazov',request('sort_nazov'));
        }
        
        if(request()->has('sort_opakovanie')){
            $sluzby = $sluzby->orderBy('opakovanie',request('sort_opakovanie'));

        }
         if(request()->has('sort_cas')){
            $sluzby = $sluzby->orderBy('cas',request('sort_cas'));
            
        }
        if(request()->has('sort_cena')){
            $sluzby = $sluzby->orderBy('cena',request('sort_cena'));
            
        }
          if(request()->has('sort_name_of_registration')){
            $sluzby = $sluzby->orderBy('name_of_registration',request('sort_name_of_registration'));
            
        }
       

          $sluzby = $sluzby->paginate(10)->appends([
            'romm' => request('room'),
            'sort'  => request('sort')
        ]);

         return view('user\user-sluzby-list', compact('sluzby'));
    }

      public function usersList(){
         $userId=Auth::user()->id;
        //$users=DB::table('users',$userId)->get();
        $users=DB::TABLE('users')->where('id',$userId);
        // $users=DB::TABLE('users');
       
        
        
        $users = $users->paginate(10)->appends([
            'email' => request('email'),
            'sort'  => request('sort')
        ]);

        return view('user\user-users-list',compact('users'));
    }
     public function updateUser(Request $request , $id){
        if($request->input('name') == NULL ||$request->input('surname') == NULL || $request->input('email') == NULL || $request->input('password') == NULL || $request->input('password2') == NULL || $request->input('mobil') == NULL || $request->input('cislo_OP') == NULL || $request->input('vek') == NULL  ){
                return redirect()->back()->with('status','Musia byť vyplnene všetky položky');
        }
        if(is_null($request->input('password'))){
            return redirect()->back()->with('status', 'Password is empty');
        }
        if(is_null($request->input('password2'))){
            return redirect()->back()->with('status', 'Password2 is empty');
        }
        if(!is_null($request->input('password'))){
            if(strcmp($request->input('password'),$request->input('password2'))) {
                return redirect()->back()->with('status', 'Heslá sa nezhodujú');
            }else{
                $user = DB::table('users')->where('id',$id)->update(['password' => \Hash::make($request->input('password'))]);
            }
        }

        if ((is_numeric($request->input('name')))){
            return redirect()->back()->with('status','Name je  položka typu string');
        }
        if ((is_numeric($request->input('surname')))){
            return redirect()->back()->with('status','Name je  položka typu string');
        }
       
         
        if (!(is_numeric($request->input('vek')))){
            return redirect()->back()->with('status','Vek je  položka typu integer');
        }

        $user = DB::table('users')->where('id',$id)->update(['email' => $request->input('email')]);
        $user = DB::table('users')->where('id',$id)->update(['name' => $request->input('name') ]);
        
        $user = DB::table('users')->where('id',$id)->update(['surname' => $request->input('surname') ]);
        $user = DB::table('users')->where('id',$id)->update(['mobil' => $request->input('mobil') ]);
        $user = DB::table('users')->where('id',$id)->update(['cislo_OP' => $request->input('cislo_OP') ]);
        $user = DB::table('users')->where('id',$id)->update(['vek' => $request->input('vek') ]);

         return redirect()->intended(route('user\user.users.list'));
    }
     public function editUser($id){
        $user = DB::table('users')->where('id',$id)->first();
        return view('user\user-user-update',compact('user'));
    }
    
  


}
