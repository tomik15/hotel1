<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Admin;
use App\Employee;
use App\User;
use App\Registration;
use App\Rooms;
use App\Sluzby;
use App\Vybava;

class EmployeeController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:employee');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee\employee-home');
    }

    //////////////////////////////////////////////////////ADMIN////////////////////////////////////////////////
    public function adminsList(){
        $admins = new Admin;
        if(request()->has('search')){
            $find = request('search');
            $pattern = ".*" . $find . ".*";
            $admins = DB::table('admins')->where('email','REGEXP',$pattern);
        }
        if(request()->has('sort_email')){
            $admins = $admins->orderBy('email',request('sort_email'));
        }
        $admins = $admins->paginate(10)->appends([
            'email' => request('email'),
            'sort'  => request('sort')
        ]);

        return view('employee\employee-admins-list',compact('admins'));
    }
    ///////////////////////////////////////////////////EMPLOYEE/////////////////////////////////////////////////
    public function employeeList(){
        $users = new Employee;
        if(request()->has('search')){
            $find = request('search');
            $pattern = ".*" . $find . ".*";
            $users = DB::table('employees')->where('email','REGEXP',$pattern);
        }
        if(request()->has('sort_email')){
            $users = $users->orderBy('email',request('sort_email'));
        }
        $users = $users->paginate(10)->appends([
            'email' => request('email'),
            'sort'  => request('sort')
        ]);

        return view('employee\employee-employee-list',compact('users'));
    }
    /////////////////////////////////////////////////USERS////////////////////////////////////////////////////////
    public function usersList(){
        $users = new User;
        if(request()->has('search')){
            $find = request('search');
            $pattern = ".*" . $find . ".*";
            $users = DB::table('users')->where('email','REGEXP',$pattern);
        }
        if(request()->has('sort')){
            $users = $users->orderBy('name',request('sort'));
        }

        $users = $users->paginate(10)->appends([
            'email' => request('email'),
            'sort'  => request('sort')
        ]);

        return view('employee\employee-users-list',compact('users'));
    }

    ///////////////////////////////////////////insert User  ///////////////////////////////////////////////////////
    public function newUser(){
        return view('employee\employee-user-insert');
    }

    public function insertUser(Request $request){


        if($request->input('name') == NULL ||$request->input('surname') == NULL || $request->input('email') == NULL || $request->input('password') == NULL || $request->input('password2') == NULL || $request->input('mobil') == NULL || $request->input('cislo_OP') == NULL || $request->input('vek') == NULL  ){
                return redirect()->back()->with('status','Musia byť vyplnene všetky položky');
        }

        $user = DB::table('users')->where('email',$request->input('email'))->first();
        if(!is_null($user)){
            return redirect()->intended(route('employee\employee.user.insert'))->with('status', 'E-mail už je v databázi');
        }
        if(strcmp($request->input('password'),$request->input('password2'))) {
            return redirect()->intended(route('employee\employee.user.insert'))->with('status', 'Heslá sa nezhodujú');
        }

        $data = array(
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),            
            'password' => \Hash::make($request->input('password')),
            'mobil' => $request->input('mobil'),
            'cislo_OP' => $request->input('cislo_OP'),
            'vek' => $request->input('vek'),
        );
        DB::table('users')->insert($data);
        return redirect()->intended(route('employee\employee.users.list'));
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

         return redirect()->intended(route('employee\employee.users.list'));
    }


    public function editUser($id){
        $user = DB::table('users')->where('id',$id)->first();
        return view('employee\employee-user-update',compact('user'));
    }

    //////////////////////////////delete///////////////////////////////////////////////

    public function tryDeleteUser($id){
        $user = DB::table('users')->where('id',$id)->first();
        return view('employee\employee-user-delete',compact('user'));
    }

    public function deleteUser($id){
        DB::table('users')->where('id',$id)->delete();
        return redirect()->intended(route('employee\employee.users.list'));
    }


    /////////////////////////////////////////////////REGISTRATION   ///////////////////////////////////
    public function RegistrationlList(){
       // $registration = new Registration;
        $registrations = DB::table('registration');
       
         
        if(request()->has('sort_payments')){
            $registrations = $registrations->orderBy('payments',request('sort_payments'));
            
        }
        if(request()->has('sort_arrival')){
            $registrations = $registrations->orderBy('date_of_arrival',request('sort_arrival'));
        }
        if(request()->has('sort_departure')){
            $registrations = $registrations->orderBy('date_of_departure',request('sort_departure'));
        }

        $registrations = $registrations->paginate(10)->appends([
            'romm' => request('room'),
            'sort'  => request('sort')
        ]);

        return view('employee\employee-registration-list', compact('registrations'));
    }
    public function newRegistration(){
        $rooms=DB::table('rooms')->get();
        $sluzbies=DB::table('sluzbies')->get();
        $users=DB::table('users')->get();
        return view('employee\employee-registration-insert',(compact('users','sluzbies','rooms')));
    }


    public function insertRegistration(Request $request) {  
        if($request->input('izba')==NULL){
             return redirect()->back()->with('status','Nie su izby');
              }
        if($request->input('user')==NULL){
             return redirect()->back()->with('status','Nie su zakaznici v systeme');
              }
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
      return redirect()->intended(route('employee\employee.registration.list'));///!!!!!!!!!!!!!!bolo admin.registration.list
    //return $this->RegistrationlList($id);
    }
       //////////////////delete
    public function tryDeleteRegistration($id){
        $registration = DB::table('registration')->where('id',$id)->first();
        return view('employee\employee-registration-delete',compact('registration'));
    }

    public function deleteRegistration($id){
        DB::table('registration')->where('id',$id)->delete();
        return redirect()->intended(route('employee\employee.registration.list'));
    }
    ///////////////update/////////
    public function updateRegistration(Request $request,$id){
         if ($request->input('sluzba') == NULL ||$request->input('date_of_arrival') == NULL ||  $request->input('date_of_departure') == NULL){
                  return redirect()->back()->with('status','Musia byť vyplnene všetky položky');
              }
         $registration = DB::table('registration')->where('id',$id)->update(['id_user' => $request->input('user')]);
         $registration = DB::table('registration')->where('id',$id)->update(['id_sluzby' => $request->input('sluzba')]);
        $registration = DB::table('registration')->where('id',$id)->update(['id_rooms' => $request->input('izba')]);
        $registration = DB::table('registration')->where('id',$id)->update(['payments' => $request->input('payments')]);
   
        $registration = DB::table('registration')->where('id',$id)->update(['date_of_arrival' => $request->input('date_of_arrival')]);
        $registration = DB::table('registration')->where('id',$id)->update(['date_of_departure' => $request->input('date_of_departure') ]);

        return redirect()->intended(route('employee\employee.registration.list'));
    }


        public function editRegistration($id){
            $rooms=DB::table('rooms')->get();
            $sluzbies=DB::table('sluzbies')->get();
            $users=DB::table('users')->get();
            $registration = DB::table('registration')->where('id',$id)->first();
        return view('employee\employee-registration-update',(compact('users','sluzbies','rooms','registration')));
    }

    ///////////////////////////////////////////////ROOMS/////////////////////////////////////////
    public function roomsList(){
   // $rooms=new Rooms;
    $rooms=DB::table('rooms');
     

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

    return view('employee\employee-rooms-list', compact('rooms'));
    }
    public function newRoom(){
        $vybavas=DB::table('vybavas')->get();
        return view('employee\employee-room-insert',compact('vybavas'));
    }


    public function insertRoom(Request $request) {///toto v funkcii Request $request 
        if ( $request->input('cislo') == NULL ||  $request->input('obsadenost_izby') == NULL || $request->input('pocet_rezervovanych_lozok') == NULL || $request->input('max_kapacita_izby') == NULL ||  $request->input('vybava') == NULL){
                  return redirect()->back()->with('status','Musia byť vyplnene všetky položky');
              }
        if (!(is_numeric($request->input('cislo')))) {
            return redirect()->back()->with('status','Csilo je  položka typu integer');
        }        
       
        if (!(is_numeric($request->input('pocet_rezervovanych_lozok')))) {
            return redirect()->back()->with('status','pocet_rezervovanych_lozok  je  položka typ integer');
        } 
        if (!(is_numeric($request->input('max_kapacita_izby')))) {
            return redirect()->back()->with('status','Kapacita izby  je  položka typ integer');
        }
       
      $data = array(
          'cislo' => $request->input('cislo'),
          
          'obsadenost_izby' => $request->input('obsadenost_izby'),
          'pocet_rezervovanych_lozok' => $request->input('pocet_rezervovanych_lozok'),         
          'max_kapacita_izby' => $request->input('max_kapacita_izby'),
          'id_vybavy' => $request->input('vybava')
      );
      DB::table('rooms')->insert($data);
    return redirect()->intended(route('employee\employee.rooms.list'));///!!!!!!!!!!!!!!bolo admin.registration.list
    //return $this->RegistrationlList($id);
    }
     public function tryDeleteRoom($id){
        $room = DB::table('rooms')->where('id',$id)->first();
        return view('employee\employee-room-delete',compact('room'));
    }

    public function deleteRoom($id){
        DB::table('rooms')->where('id',$id)->delete();
        return redirect()->intended(route('employee\employee.rooms.list'));
    }
    public function updateRoom(Request $request,$id){
        if ( $request->input('cislo') == NULL ||  $request->input('obsadenost_izby') == NULL || $request->input('pocet_rezervovanych_lozok') == NULL || $request->input('max_kapacita_izby') == NULL ||$request->input('vybava') == NULL  ){
                  return redirect()->back()->with('status','Musia byť vyplnene všetky položky');
              }
         if (!(is_numeric($request->input('cislo')))) {
            return redirect()->back()->with('status','Csilo je  položka typu integer');
        }
       
         if ((is_numeric($request->input('obsadenost_izby')))){
            return redirect()->back()->with('status','Obsadenost_izby je  položka typu string');
        }
        if (!(is_numeric($request->input('pocet_rezervovanych_lozok')))) {
            return redirect()->back()->with('status','pocet_rezervovanych_lozok  je  položka typ integer');
        } 
        if (!(is_numeric($request->input('max_kapacita_izby')))) {
            return redirect()->back()->with('status','Kapacita izby  je  položka typ integer');
        }
        
        $room = DB::table('rooms')->where('id',$id)->update(['cislo' => $request->input('cislo')]);
       
        $room = DB::table('rooms')->where('id',$id)->update(['obsadenost_izby' => $request->input('obsadenost_izby')]);
        $room = DB::table('rooms')->where('id',$id)->update(['pocet_rezervovanych_lozok' => $request->input('pocet_rezervovanych_lozok')]);
   
        $room = DB::table('rooms')->where('id',$id)->update(['max_kapacita_izby' => $request->input('max_kapacita_izby')]);
        $room = DB::table('rooms')->where('id',$id)->update(['id_vybavy' => $request->input('vybava') ]);

        return redirect()->intended(route('employee\employee.rooms.list'));
    }


        public function editRoom($id){
        $vybavas=DB::table('vybavas')->get();
        $room = DB::table('rooms')->where('id',$id)->first();
        return view('employee\employee-room-update',compact('room'),compact('vybavas'));
    }

    //////////////////////////////////////////SLUZBY/////////////////////////////////////////   
    public function sluzbyList(){
    $sluzby=DB::table('sluzbies');
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
         
       

          $sluzby = $sluzby->paginate(10)->appends([
            'romm' => request('room'),
            'sort'  => request('sort')
        ]);

         return view('employee\employee-sluzby-list', compact('sluzby'));
    }    
    public function newSluzby(){
        return view('employee\employee-sluzby-insert');
    }


     public function insertSluzby(Request $request) {///toto v funkcii Request $request 
        if ( $request->input('nazov') == NULL || $request->input('opakovanie') == NULL|| $request->input('cas') == NULL || $request->input('cena') == NULL ){
                  return redirect()->back()->with('status','Musia byť vyplnene všetky položky');
              }
                   
        if (is_numeric($request->input('nazov'))) {
            return redirect()->back()->with('status','Nazov je  položka typu string');
        }
        if (!(is_numeric($request->input('opakovanie')))){
            return redirect()->back()->with('status','Opakovanie je  položka typu integer');
        } 
        if (!(is_numeric($request->input('cas')))) {
            return redirect()->back()->with('status','Cas  je  položka typ integer zadat hh mm )');
        } 
        if (!(is_numeric($request->input('cena')))) {
            return redirect()->back()->with('status','Cena  je  položka typ integer');
        }
        
      $data = array(
          'nazov' => $request->input('nazov'),
          'opakovanie' => $request->input('opakovanie'),
          'cas' => $request->input('cas'),
          'cena' => $request->input('cena')
          
          
      );
      DB::table('sluzbies')->insert($data);
      return redirect()->intended(route('employee\employee.sluzby.list'));///!!!!!!!!!!!!!!bolo admin.registration.list
    //return $this->RegistrationlList($id);
    }
     public function tryDeleteteSluzby($id){
    $sluzby = DB::table('sluzbies')->where('id',$id)->first();
        return view('employee\employee-sluzby-delete',compact('sluzby'));
    }

    public function deleteSluzby($id){
        DB::table('sluzbies')->where('id',$id)->delete();
        return redirect()->intended(route('employee\employee.sluzby.list'));
    }
     public function updateSluzby(Request $request,$id){
        if ( $request->input('nazov') == NULL || $request->input('opakovanie') == NULL|| $request->input('cas') == NULL || $request->input('cena') == NULL ){
                  return redirect()->back()->with('status','Musia byť vyplnene všetky položky');
              }
        if (is_numeric($request->input('nazov'))) {
            return redirect()->back()->with('status','Nazov je  položka typu string');
        }
        if (!(is_numeric($request->input('opakovanie')))){
            return redirect()->back()->with('status','Opakovanie je  položka typu integer');
        } 
        if (!(is_numeric($request->input('cas')))) {
            return redirect()->back()->with('status','Cas  je  položka typ integer zadat hh mm )');
        } 
        if (!(is_numeric($request->input('cena')))) {
            return redirect()->back()->with('status','Cena  je  položka typ integer');
        }
       
        $room = DB::table('sluzbies')->where('id',$id)->update(['nazov' => $request->input('nazov')]);
        $room = DB::table('sluzbies')->where('id',$id)->update(['opakovanie' => $request->input('opakovanie')]);
        $room = DB::table('sluzbies')->where('id',$id)->update(['cas' => $request->input('cas')]);
        $room = DB::table('sluzbies')->where('id',$id)->update(['cena' => $request->input('cena')]);
       

        return redirect()->intended(route('employee\employee.sluzby.list'));
    }

     public function editSluzby($id){
        $sluzby = DB::table('sluzbies')->where('id',$id)->first();
        return view('employee\employee-sluzby-update',compact('sluzby'));
    }


    ///////////////////////////////////VYBAVA////////////////////////////////////////
    public function vybavasList(){
    $vybava=new Vybava;
     if(request()->has('search')){
            $find = request('search');
            $pattern = ".*" . $find . ".*";
            $where = request('searchWhere');
            $vybava = DB::table('vybavas')->where($where,'REGEXP',$pattern);
        }   

            if(request()->has('sort_stav')){
            $vybava = $vybava->orderBy('stav',request('sort_stav'));
        }
        
        if(request()->has('sort_typ')){
            $vybava = $vybava->orderBy('typ',request('sort_typ'));

        }
         if(request()->has('sort_cena')){
            $vybava = $vybava->orderBy('cena',request('sort_cena'));
            
        }
       
          $vybava = $vybava->paginate(10)->appends([
            'romm' => request('room'),
            'sort'  => request('sort')
        ]);

         return view('employee\employee-vybava-list', compact('vybava'));
    }  
    public function newVybava(){
        return view('employee\employee-vybava-insert');
    }


     public function insertVybava(Request $request) {///toto v funkcii Request $request 
        if ( $request->input('stav') == NULL || $request->input('typ') == NULL|| $request->input('cena') == NULL){
                  return redirect()->back()->with('status','Musia byť vyplnene všetky položky');
              }
         if (is_numeric($request->input('stav'))) {
            return redirect()->back()->with('status','Stav je  položka typu string');
        }
        if (is_numeric($request->input('typ'))){
            return redirect()->back()->with('status','Typ je  položka typu string');
        } 
        if (!(is_numeric($request->input('cena')))) {
            return redirect()->back()->with('status','Cena je  položka typu integer');
        }       
      $data = array(
          'stav' => $request->input('stav'),
          'typ' => $request->input('typ'),
          'cena' => $request->input('cena'),
               );
      DB::table('vybavas')->insert($data);
      return redirect()->intended(route('employee\employee.vybava.list'));///!!!!!!!!!!!!!!bolo admin.registration.list
    //return $this->RegistrationlList($id);
    }
     public function tryDeleteVybava($id){
    $vybava = DB::table('vybavas')->where('id',$id)->first();
        return view('employee\employee-vybava-delete',compact('vybava'));
    }

    public function deleteVybava($id){
        DB::table('vybavas')->where('id',$id)->delete();
        return redirect()->intended(route('employee\employee.vybava.list'));
    }
    public function updateVybava(Request $request,$id){
         if ( $request->input('stav') == NULL || $request->input('typ') == NULL|| $request->input('cena') == NULL){
                  return redirect()->back()->with('status','Musia byť vyplnene všetky položky');
              }

         if (is_numeric($request->input('stav'))) {
            return redirect()->back()->with('status','Stav je  položka typu string');
        }
        if (is_numeric($request->input('typ'))){
            return redirect()->back()->with('status','Typ je  položka typu string');
        } 
        if (!(is_numeric($request->input('cena')))) {
            return redirect()->back()->with('status','Cena je  položka typu integer');
        } 
        $room = DB::table('vybavas')->where('id',$id)->update(['stav' => $request->input('stav')]);
        $room = DB::table('vybavas')->where('id',$id)->update(['typ' => $request->input('typ')]);
        $room = DB::table('vybavas')->where('id',$id)->update(['cena' => $request->input('cena')]);
        

        return redirect()->intended(route('employee\employee.vybava.list'));
    }

     public function editVybava($id){
        $vybava = DB::table('vybavas')->where('id',$id)->first();
        return view('employee\employee-vybava-update',compact('vybava'));
    }

    //////////////////////////////SHOWlist////////////////////////////
     public function showList(){

      $rooms=DB::table('rooms')->where('obsadenost_izby','Neobsadene');
   

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

        
        return view('employee\employee-show-list',compact('rooms'),compact('vybavas'));
    }

}
