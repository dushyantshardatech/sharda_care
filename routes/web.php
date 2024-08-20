<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\admin\AdvanceSettingController;
use App\Http\Controllers\admin\ManageSettingController;
use App\Http\Controllers\admin\ManagemenuController;
use App\Http\Controllers\admin\ManagesubmenuController;
use App\Http\Controllers\admin\ManagebannerController;
use App\Http\Controllers\admin\ManageMedicalPackageController;
use App\Http\Controllers\admin\ManagestoriesController;
use App\Http\Controllers\admin\PrivacypolicyController;
use App\Http\Controllers\admin\ManageFindADoctorController;
use App\Http\Controllers\admin\ManageFormsController;
use App\Http\Controllers\admin\ManageTechnologyController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'About']);
Route::any('/find-a-doctor', [HomeController::class, 'find_doctor'])->name('findDoctors');
Route::get('/contact', [HomeController::class, 'contacts']);
Route::post('/store_contact', [HomeController::class, 'store_contact'])->name('store_contact');
Route::get('/patient_visit', [HomeController::class, 'patient_visits']);
Route::get('/medical-packages', [HomeController::class, 'Medicalpackage']);
Route::get('/medical-packages/{slug}', [HomeController::class, 'Packagedetails'])->name('medical-packages.package_details');
Route::get('/doctor_details/{id?}', [HomeController::class, 'doctorDetails']);
Route::post('/bookappointment', [HomeController::class, 'bookAppointment'])->name('bookappointment');
Route::post('/enquiry', [HomeController::class, 'quickEnquiry'])->name('quickenquiry');
Route::post('/secondopinion', [HomeController::class, 'secondOpinion'])->name('secondOpinion');
Route::get('/technology', [HomeController::class, 'technology'])->name('technology');
Route::post('/fetch-states', [HomeController::class, 'fetchState'])->name('fetchState');
Route::post('/fetch-city', [HomeController::class, 'fetchCity'])->name('fetchCity');

/*******************************Admin Panel***********************************/ 
Route::get('admin', [AdminController::class, 'index']);
Route::post('admin/auth', [AdminController::class, 'Authentication'])->name('admin');
Route::middleware(['admin.auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('admin/logout', [AdminController::class, 'logout']);
    /*******************************Manage Modules***********************************/ 
    Route::get('admin/advancesetting/module', [AdvanceSettingController::class, 'Module']);
    Route::get('admin/advancesetting/addmodule/{id?}', [AdvanceSettingController::class, 'ManageModule']);
    Route::post('admin/advancesetting/modules/addmodule',[AdvanceSettingController::class, 'addModules'] )->name("addmodule");
    Route::get('admin/advancesetting/modules/delete/{id}',[AdvanceSettingController::class, 'deletemodule'] )->name("deletemodule");
    /*******************************Manage Roles***********************************/ 
    Route::get('admin/advancesetting/role', [AdvanceSettingController::class, 'Role']);
    Route::get('admin/advancesetting/addrole/{id?}', [AdvanceSettingController::class, 'ManageRole']);
    Route::post('admin/advancesetting/role/addrole',[AdvanceSettingController::class, 'addRole'] )->name("addrole");
    Route::get('admin/advancesetting/role/delete/{id}',[AdvanceSettingController::class, 'deleterole'] )->name("deleterole");
    /*******************************Manage User***********************************/ 
    Route::get('admin/advancesetting/user', [AdvanceSettingController::class, 'User']);
    Route::get('admin/advancesetting/adduser/{id?}', [AdvanceSettingController::class, 'ManageUser']);
    Route::post('admin/advancesetting/user/adduser',[AdvanceSettingController::class, 'addUser'] )->name("adduser");
    Route::get('admin/advancesetting/user/delete/{id}',[AdvanceSettingController::class, 'deleteuser'] )->name("deleteuser");
    /*******************************Manage Settings***********************************/ 
    Route::get('admin/dashboard/managesettings', [ManageSettingController::class, 'index']);
    Route::get('admin/managesettings/add/{id?}', [ManageSettingController::class, 'ManageSettings']);
    Route::post('admin/managesettings/add', [ManageSettingController::class, 'add'])->name("addsettings");
    Route::get('admin/managesettings/managesettings/delete/{id}',[ManageSettingController::class, 'deletesetting'] )->name("deletesetting");
    /*******************************Manage Menu***********************************/ 
    Route::get('admin/managemenu', [ManagemenuController::class, 'index']);
    Route::get('admin/managemenu/add/{id?}', [ManagemenuController::class, 'ManageMenu']);
    Route::post('admin/managemenu/add', [ManagemenuController::class, 'add'])->name("addmenu");
    Route::get('admin/managemenu/delete/{id}',[ManagemenuController::class, 'deletemenu'] )->name("deletemenu");
    /*******************************Manage Submenu***********************************/ 
    Route::get('admin/managesubmenu', [ManagesubmenuController::class, 'index']);
    Route::get('admin/managesubmenu/add/{id?}', [ManagesubmenuController::class, 'ManageSubMenu']);
    Route::post('admin/managesubmenu/add', [ManagesubmenuController::class, 'add'])->name("addsubmenu");
    Route::get('admin/managesubmenu/delete/{id}',[ManagesubmenuController::class, 'deletesubmenu'] )->name("deletesubmenu");
    /*******************************Manage Banners***********************************/ 
    Route::get('admin/managebanners', [ManagebannerController::class, 'index']);
    Route::get('admin/managebanner/add/{id?}', [ManagebannerController::class, 'Managebanner']);
    Route::post('admin/managebanner/add', [ManagebannerController::class, 'add'])->name("addbanner");
    Route::get('admin/managebanner/delete/{id}',[ManagebannerController::class, 'deletebanner'] )->name("deletebanner");
    Route::post('getsubmenus', [ManagebannerController::class, 'getSubMenus'])->name('getsubmenus');
    /*******************************Medical Packages***********************************/ 
    Route::get('admin/medicalpackages', [ManageMedicalPackageController::class, 'index']);
    Route::get('admin/medicalpackages/add/{id?}', [ManageMedicalPackageController::class, 'Managepackage']);
    Route::post('admin/medicalpackages/add', [ManageMedicalPackageController::class, 'add'])->name("addpackage");
    Route::get('admin/medicalpackages/delete/{id}',[ManageMedicalPackageController::class, 'deletepackage'] )->name("deletepackage");
    /*******************************Our Stories***********************************/ 
    Route::get('admin/manageourstories', [ManagestoriesController::class, 'index']);
    Route::get('admin/manageourstories/add/{id?}', [ManagestoriesController::class, 'Managestories']);
    Route::post('admin/manageourstories/add', [ManagestoriesController::class, 'add'])->name("addstories");
    Route::get('admin/manageourstories/delete/{id}',[ManagestoriesController::class, 'deletestories'] )->name("deletestories");
    /*******************************Privacy Policy & Terms Condition***********************************/ 
    Route::get('admin/privacy-policy', [PrivacypolicyController::class, 'index']);
    Route::get('admin/privacy-policy/add/{id?}', [PrivacypolicyController::class, 'Manageprivacypolicies']);
    Route::post('admin/privacy-policy/add', [PrivacypolicyController::class, 'add'])->name("addpolicies");
    Route::get('admin/privacy-policy/delete/{id}',[PrivacypolicyController::class, 'deleteprivacypolicy'] )->name("deleteprivacypolicy");


    /******************************************** Find The Doctor  ****************************************/


    Route::get('admin/managefindadoctor', [ManageFindADoctorController::class, 'index']);


    /******************************************** Forms *****************************************/
    
    // Contact 

    Route::get('admin/contactlist', [ManageFormsController::class, 'contact_index']);
    Route::get('admin/contactlist/delete/{id}',[ManageFormsController::class, 'deleteContacts'] )->name("deleteContacts");

    // Quick Enquire

    Route::get('admin/enquire', [ManageFormsController::class, 'enquire_index']);
    Route::get('admin/enquirelist/delete/{id}',[ManageFormsController::class, 'deleteEnquire'] )->name("deleteEnquire");

    // Book Appointment 

    Route::get('admin/bookappointment', [ManageFormsController::class, 'book_appointment_index']);
    Route::any('admin/bookappointment/delete/{id}',[ManageFormsController::class, 'deleteBookAppointment'] )->name("deleteBookAppointment");

    // Second Opinion 

    Route::get('admin/second_opinion', [ManageFormsController::class, 'second_opinion_index']);
    Route::any('admin/second_opinion/delete/{id}',[ManageFormsController::class, 'deleteSecondOpinion'] )->name("deleteSecondOpinion");

    
    /************************************************ Technology  ***********************************************/

    Route::get('admin/technology', [ManageTechnologyController::class, 'index']);
    Route::get('admin/managetechnology/add/{id?}', [ManageTechnologyController::class, 'ManageTechnology']);
    Route::post('admin/managetechnology/add', [ManageTechnologyController::class, 'add'])->name("addtechnology");
    Route::get('admin/managetechnology/delete/{id}',[ManageTechnologyController::class, 'deleteTechnology'] )->name("deleteTechnology");


});