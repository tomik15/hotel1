<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});

*/
//Route::get('/','PagesController@index');



/*
Route::get('/about',function(){
	return view('pages.about');
});
*/
Auth::routes();
 

  Route::get('/user-home', 'HomeController@index')->name('user.home');

  Route::prefix('user')->group(function(){
     Route::get('/user-home', 'HomeController@index')->name('user.home');
    ////////////////////////////////////REGISTRATION/////////////////////////////////////////
    Route::get('/user-registration-list', 'HomeController@RegistrationlList')->name('user\user.registration.list');
     //INSERT    
    Route::get('/user-registration-insert','HomeController@newRegistration')->name('user\user.registration.insert');
    Route::post('/user-registration-insert','HomeController@insertRegistration')->name('user\user.registration.insertRegistration');
           //DELETE
    Route::get('/user-registration-delete/{id}', 'HomeController@tryDeleteteRegistration')->name('user\user.registration.delete');
    Route::post('/user-registration-delete/{id}', 'HomeController@deleteRegistration')->name('user\user.registration.deleteRegistration');
    /////////////////////////////////////SLUZBY/////////////////////////////////////////////
    Route::get('/user-sluzby-list','HomeController@sluzbyList')->name('user\user.sluzby.list');
         //////////////////////////////////////SHOWLIST//////////////////////////////////////////////////////////////
     Route::get('/user-show-list', 'HomeController@showList')->name('user\user.show.list');
                                
                                //USERS///
     Route::get('/user-users-list', 'HomeController@usersList')->name('user\user.users.list');
             //UPDATE
    Route::get('/user-user-update/{id}', 'HomeController@editUser')->name('user\user.user.update');
    Route::post('/user-user-update/{id}', 'HomeController@updateUser')->name('user\user.user.updateUser');
   
  });
 /*Route::prefix('users')->group(function() {
    Route::get('/login', 'Auth\EmployeeLoginController@showLoginForm')->name('employee.login');
    Route::post('/login', 'Auth\EmployeeLoginController@login')->name('employee.login.submit');
    Route::get('/home', 'EmployeeController@index')->name('user-home');   
   
});

*/

Route::get('/', function () {
    return view('layouts.app');
});
Route::prefix('employee')->group(function() {
    Route::get('/login', 'Auth\EmployeeLoginController@showLoginForm')->name('employee.login');
    Route::post('/login', 'Auth\EmployeeLoginController@login')->name('employee.login.submit');
    Route::get('/home', 'EmployeeController@index')->name('employee\employee.home');

    //////////////////////////////ADMIN////////////////////////////////////////////////////////////
    Route::get('/employee-admins-list', 'EmployeeController@adminsList')->name('employee\employee.admins.list');

    //////////////////////////////EMPLOYEE/////////////////////////////////////////////////////////
    Route::get('/employee-list', 'EmployeeController@employeeList')->name('employee\employee.employee.list');

    //////////////////////////////USERS////////////////////////////////////////////////////////////
    Route::get('/users-list', 'EmployeeController@usersList')->name('employee\employee.users.list');
            //INSERT
    Route::get('/user-insert', 'EmployeeController@newUser')->name('employee\employee.user.insert');
    Route::post('/user-insert', 'EmployeeController@insertUser')->name('employee\employee.user.insertUser');
            //UPDATE
    Route::get('/employee-user-update/{id}', 'EmployeeController@editUser')->name('employee\employee.user.update');
    Route::post('/employee-user-update/{id}', 'EmployeeController@updateUser')->name('employee\employee.user.updateUser');
            //DELETE
    Route::get('/employee-user-delete/{id}', 'EmployeeController@tryDeleteUser')->name('employee\employee.user.delete');
    Route::post('/employee-user-delete/{id}', 'EmployeeController@deleteUser')->name('employee\employee.user.deleteUser');


    /////////////////////////////REGISTRATION//////////////////////////////////////////////////////
    Route::get('/employee-registration-list', 'EmployeeController@RegistrationlList')->name('employee\employee.registration.list');
        //INSERT    
    Route::get('/employee-registration-insert','EmployeeController@newRegistration')->name('employee\employee.registration.insert');
    Route::post('/employee-registration-insert','EmployeeController@insertRegistration')->name('employee\employee.registration.insertRegistration');
    //DELETE
    Route::get('/employee-registration-delete/{id}', 'EmployeeController@tryDeleteRegistration')->name('employee\employee.registration.delete');
    Route::post('/employee-registration-delete/{id}', 'EmployeeController@deleteRegistration')->name('employee\employee.registration.deleteRegistration');
            //UPDATE
    Route::get('/employee-registration-update/{id}', 'EmployeeController@editRegistration')->name('employee\employee.registration.update');
    Route::post('/employee-registration-update/{id}', 'EmployeeController@updateRegistration')->name('employee\employee.registration.updateRegistration');



    /////////////////////////////// ROOMS   /////////////////////////////////////////////////////////
     Route::get('/employee-rooms-list', 'EmployeeController@roomsList')->name('employee\employee.rooms.list');
            //INSERT
    Route::get('/employee-room-insert','EmployeeController@newRoom')->name('employee\employee.room.insert');
    Route::post('/employee-room-insert','EmployeeController@insertRoom')->name('employee\employee.room.insertRoom');
               //DELETE        
    Route::get('/employee-room-delete/{id}', 'EmployeeController@tryDeleteRoom')->name('employee\employee.room.delete');
    Route::post('/employee-room-delete/{id}', 'EmployeeController@deleteRoom')->name('employee\employee.room.deleteRoom'); 
            //Update
    Route::get('/employee-room-update/{id}', 'EmployeeController@editRoom')->name('employee\employee.room.update');
    Route::post('/employee-room-update/{id}', 'EmployeeController@updateRoom')->name('employee\employee.room.updateRoom');

     //////////////////////////////SLUZBY///////////////////////////////////////////////////////////
     Route::get('/employee-sluzby-list','EmployeeController@sluzbyList')->name('employee\employee.sluzby.list');
              //INSERT
    Route::get('/employee-sluzby-insert','EmployeeController@newSluzby')->name('employee\employee.sluzby.insert');
    Route::post('/employee-sluzby-insert','EmployeeController@insertSluzby')->name('employee\employee.sluzby.insertSluzby');
            //DELETE        
    Route::get('/employee-sluzby-delete/{id}', 'EmployeeController@tryDeleteteSluzby')->name('employee\employee.sluzby.delete');
    Route::post('/employee-sluzby-delete/{id}', 'EmployeeController@deleteSluzby')->name('employee\employee.sluzby.deleteSluzby'); 
            //Update
    Route::get('/employee-sluzby-update/{id}', 'EmployeeController@editSluzby')->name('employee\employee.sluzby.update');
    Route::post('/employee-sluzby-update/{id}', 'EmployeeController@updateSluzby')->name('employee\employee.sluzby.updateSluzby');

     //////////////////////////////VYBAVA/////////////////////////////////////////////////////////////
     Route::get('/employee-vybava-list', 'EmployeeController@vybavasList')->name('employee\employee.vybava.list');
             //INSERT
    Route::get('/employee-vybava-insert','EmployeeController@newVybava')->name('employee\employee.vybava.insert');
    Route::post('/employee-vybava-insert','EmployeeController@insertVybava')->name('employee\employee.vybava.insertVybava');
            //DELETE        
    Route::get('/employee-vybava-delete/{id}', 'EmployeeController@tryDeleteVybava')->name('employee\employee.vybava.delete');
    Route::post('/employee-vybava-delete/{id}', 'EmployeeController@deleteVybava')->name('employee\employee.vybava.deleteVybava'); 
            //Update
    Route::get('/employee-vybava-update/{id}', 'EmployeeController@editVybava')->name('employee\employee.vybava.update');
    Route::post('/employee-vybava-update/{id}', 'EmployeeController@updateVybava')->name('employee\employee.vybava.updateVybava');
                                    //showLIST/////////////
    Route::get('/employee-show-list', 'EmployeeController@showList')->name('employee\employee.show.list');
});

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/home', 'AdminController@index')->name('admin.home');//zmena z admin.home    

/////////////////////////////////////////ADMIN////////////////////////////////////////////////////////
	Route::get('/admins-list', 'AdminController@adminsList')->name('admins.list');
	       //INSERT
    Route::get('/admin-insert', 'AdminController@newAdmin')->name('admin.admin.insert');
    Route::post('/admin-insert', 'AdminController@insertAdmin')->name('admin.admin.insertAdmin');
            //UPDATE
    Route::get('/admin-update/{id}', 'AdminController@editAdmin')->name('admin.admin.update');
    Route::post('/admin-update/{id}', 'AdminController@updateAdmin')->name('admin.admin.updateAdmin');
            //DELETE                
    
    Route::get('/admin-delete/{id}', 'AdminController@tryDeleteAdmin')->name('admin.admin.delete');
    Route::post('/admin-delete/{id}', 'AdminController@deleteAdmin')->name('admin.admin.deleteAdmin');
 
//////////////////////////////////////USERS/////////////////////////////////////////////////////////////
    Route::get('/users-list', 'AdminController@usersList')->name('admin.users.list');
            //INSERT
 	Route::get('/user-insert', 'AdminController@newUser')->name('admin.user.insert');
    Route::post('/user-insert', 'AdminController@insertUser')->name('admin.user.insertUser');
            //UPDATE
    Route::get('/admin-user-update/{id}', 'AdminController@editUser')->name('admin.user.update');
    Route::post('/admin-user-update/{id}', 'AdminController@updateUser')->name('admin.user.updateUser');
            //DELETE
    Route::get('/admin-user-delete/{id}', 'AdminController@tryDeletetUser')->name('admin.user.delete');
    Route::post('/admin-user-delete/{id}', 'AdminController@deleteUser')->name('admin.user.deleteUser');

   /////////////////////////////////////EMPLOYEE/////////////////////////////////////////////////////////
    Route::get('/employee-list', 'AdminController@employeeList')->name('admin.employee.list');
            //INSERT
    Route::get('/admin-employee-insert', 'AdminController@newEmployee')->name('admin.employee.insert');
    Route::post('/admin-employee-insert', 'AdminController@insertEmployee')->name('admin.employee.insertEmployee');
             //DELETE                
    
    Route::get('/admin-employee-delete/{id}', 'AdminController@tryDeleteEmployee')->name('admin.employee.delete');
    Route::post('/admin-employee-delete/{id}', 'AdminController@deleteEmployee')->name('admin.employee.deleteEmployee');
            //UPDATE    
     Route::get('/admin-employee-update/{id}', 'AdminController@editEmployee')->name('admin.employee.update');
    Route::post('/admin-employee-update/{id}', 'AdminController@updateEmployee')->name('admin.employee.updateEmployee');

    ////////////////////////////////////REGISTRATION///////////////////////////////////////////
    Route::get('/admin-registration-list', 'AdminController@RegistrationlList')->name('admin.registration.list');
            //INSERT
    Route::get('/admin-registration-insert','AdminController@newRegistration')->name('admin.registration.insert');
    Route::post('/admin-registration-insert','AdminController@insertRegistration')->name('admin.registration.insertRegistration');
            //DELETE
    Route::get('/admin-registration-delete/{id}', 'AdminController@tryDeleteRegistration')->name('admin.registration.delete');
    Route::post('/admin-registration-delete/{id}', 'AdminController@deleteRegistration')->name('admin.registration.deleteRegistration');
            //UPDATE
    Route::get('/admin-registration-update/{id}', 'AdminController@editRegistration')->name('admin.registration.update');
    Route::post('/admin-registration-update/{id}', 'AdminController@updateRegistration')->name('admin.registration.updateRegistration');

//////////////////////////////////ROOM////////////////////////////////////////////////////////////////////
    Route::get('/rooms-list', 'AdminController@roomsList')->name('admin.rooms.list');///
            //INSERT
    Route::get('/admin-room-insert','AdminController@newRoom')->name('admin.room.insert');
    Route::post('/admin-room-insert','AdminController@insertRoom')->name('admin.room.insertRoom');
             //DELETE        
    Route::get('/admin-room-delete/{id}', 'AdminController@tryDeleteRoom')->name('admin.room.delete');
    Route::post('/admin-room-delete/{id}', 'AdminController@deleteRoom')->name('admin.room.deleteRoom'); 
            //Update
    Route::get('/admin-room-update/{id}', 'AdminController@editRoom')->name('admin.room.update');
    Route::post('/admin-room-update/{id}', 'AdminController@updateRoom')->name('admin.room.updateRoom');

//////////////////////////////////SLUZBY/////////////////////////////////////////////////////////////////
    Route::get('/sluzby-list','AdminController@sluzbyList')->name('admin.sluzby.list');
            //INSERT
    Route::get('/admin-sluzby-insert','AdminController@newSluzby')->name('admin.sluzby.insert');
    Route::post('/admin-sluzby-insert','AdminController@insertSluzby')->name('admin.sluzby.insertSluzby');
            //DELETE        
    Route::get('/admin-sluzby-delete/{id}', 'AdminController@tryDeleteSluzby')->name('admin.sluzby.delete');
    Route::post('/admin-sluzby-delete/{id}', 'AdminController@deleteSluzby')->name('admin.sluzby.deleteSluzby'); 
            //Update
    Route::get('/admin-sluzby-update/{id}', 'AdminController@editSluzby')->name('admin.sluzby.update');
    Route::post('/admin-sluzby-update/{id}', 'AdminController@updateSluzby')->name('admin.sluzby.updateSluzby');

//////////////////////////////////VYBAVA//////////////////////////////////////////////////////////////////
    Route::get('/vybava-list', 'AdminController@vybavasList')->name('admin.vybava.list');
            //INSERT
    Route::get('/admin-vybava-insert','AdminController@newVybava')->name('admin.vybava.insert');
    Route::post('/admin-vybava-insert','AdminController@insertVybava')->name('admin.vybava.insertVybava');
            //DELETE        
    Route::get('/admin-vybava-delete/{id}', 'AdminController@tryDeleteVybava')->name('admin.vybava.delete');
    Route::post('/admin-vybava-delete/{id}', 'AdminController@deleteVybava')->name('admin.vybava.deleteVybava'); 
            //Update
    Route::get('/admin-vybava-update/{id}', 'AdminController@editVybava')->name('admin.vybava.update');
    Route::post('/admin-vybava-update/{id}', 'AdminController@updateVybava')->name('admin.vybava.updateVybava');
///////////////////////////////////////////////SHOWLIST/////////////////////////////////////////////////////
     Route::get('/admin-show-list', 'AdminController@showList')->name('admin.show.list');
});