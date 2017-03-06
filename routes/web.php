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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', function (){
   return view('cimis');
});

// Employee Routes
Route::get('/admin/maintenance/employee', 'employeeController@index');

Route::post('/admin/maintenance/employee/submit','employeeController@add_employee');

Route::post('/admin/maintenance/employee/update','employeeController@update_employee');

Route::post('/admin/maintenance/employee/delete','employeeController@delete_employee');

// Bank Routes

Route::get('/admin/maintenance/bank', 'bankController@index');

Route::post('/admin/maintenance/bank/submit', 'bankController@add_bank');

Route::post('/admin/maintenance/bank/update', 'bankController@update_bank');

Route::post('/admin/maintenance/bank/delete', 'bankController@delete_bank');

Route::post('/admin/maintenance/bank/ardelete', 'bankController@ardelete_bank');

// Installment Type Routes

Route::get('/admin/maintenance/installment/type', 'installmentController@index');

Route::post('/admin/maintenance/installment/type/submit', 'installmentController@add_installment');

Route::post('/admin/maintenance/installment/type/update', 'installmentController@update_installment');

Route::post('/admin/maintenance/installment/type/delete', 'installmentController@delete_installment');

// Insurance Company Routes

Route::get('/admin/maintenance/insurance/company', 'icompController@index');

Route::post('/admin/maintenance/insurance/company/submit','icompController@add_inscomp');

Route::post('/admin/maintenance/insurance/company/update','icompController@update_inscomp');

Route::post('/admin/maintenance/insurance/company/delete','icompController@delete_inscomp');

// Policy Number Routes

Route::get('/admin/maintenance/policyno', 'pnumberController@index');

Route::post('/admin/maintenance/policyno/submit', 'pnumberController@add_policy');

Route::post('/admin/maintenance/policyno/update', 'pnumberController@update_policy');

Route::post('/admin/maintenance/policyno/delete', 'pnumberController@delete_policy');

// Account Routes

Route::get('/admin/maintenance/user/account', 'accountsController@index');

Route::post('/admin/maintenance/user/account/submit', 'accountsController@add_useracc');

Route::post('/admin/maintenance/user/account/update', 'accountsController@update_useracc');

Route::post('/admin/maintenance/user/account/delete', 'accountsController@delete_useracc');

// User Access Routes

Route::get('/admin/maintenance/user/type', 'usertypeController@index');

Route::post('/admin/maintenance/user/type/submit', 'usertypeController@add_usertypes');

Route::post('/admin/maintenance/user/type/update', 'usertypeController@update_usertypes');

Route::post('/admin/maintenance/user/type/delete', 'usertypeController@delete_usertypes');

// Vehicle Acce Routes

Route::get('/admin/maintenance/vehicle/accessories', 'vAccesController@index');

Route::post('/admin/maintenance/vehicle/accessories/submit', 'vAccesController@add_vAcce');

Route::post('/admin/maintenance/vehicle/accessories/update', 'vAccesController@update_vAcce');

Route::post('/admin/maintenance/vehicle/accessories/delete', 'vAccesController@delete_vAcce');

// Vehicle Make Routes

Route::get('/admin/maintenance/vehicle/make', 'vMakeController@index');

Route::post('/admin/maintenance/vehicle/make/submit', 'vMakeController@add_vMake');

Route::post('/admin/maintenance/vehicle/make/update', 'vMakeController@update_vMake');

Route::post('/admin/maintenance/vehicle/make/delete', 'vMakeController@delete_vMake');

// Vehicle Model Routes

Route::get('/admin/maintenance/vehicle/model', 'vModelController@index');

Route::post('/admin/maintenance/vehicle/model/submit', 'vModelController@add_vModel');

Route::post('/admin/maintenance/vehicle/model/update', 'vModelController@update_vModel');

Route::post('/admin/maintenance/vehicle/model/delete', 'vModelController@delete_vModel');

// Vehicle Types Routes

Route::get('/admin/maintenance/vehicle/types', 'vTypeController@index');

Route::post('/admin/maintenance/vehicle/types/submit', 'vTypeController@add_vType');

Route::post('/admin/maintenance/vehicle/types/update', 'vTypeController@update_vType');

Route::post('/admin/maintenance/vehicle/types/delete', 'vTypeController@delete_vType');

//Quote Status

Route::get('/admin/maintenance/quote/status', 'quoteController@index');

Route::post('/admin/maintenance/quote/status/submit', 'quoteController@add_quote');

Route::post('/admin/maintenance/quote/status/update', 'quoteController@update_quote');

Route::post('/admin/maintenance/quote/status/delete', 'quoteController@delete_quote');

//Client Types

Route::get('/admin/maintenance/client/type', 'clientTypeController@index');

Route::post('/admin/maintenance/client/type/submit', 'clientTypeController@add_ctype');

Route::post('/admin/maintenance/client/type/update', 'clientTypeController@update_ctype');

Route::post('/admin/maintenance/client/type/delete', 'clientTypeController@delete_ctype');

//Debt status

Route::get('/admin/maintenance/debt/status', 'debtStatusController@index');

Route::post('/admin/maintenance/debt/status/submit', 'debtStatusController@add_debt');

Route::post('/admin/maintenance/debt/status/update', 'debtStatusController@update_debt');

Route::post('/admin/maintenance/debt/status/delete', 'debtStatusController@delete_debt');

//Check status

Route::get('/admin/maintenance/check/status', 'checkStatusController@index');

Route::post('/admin/maintenance/check/status/submit', 'checkStatusController@add_check');

Route::post('/admin/maintenance/check/status/update', 'checkStatusController@update_check');

Route::post('/admin/maintenance/check/status/delete', 'checkStatusController@delete_check');

//Insurance Status

Route::get('/admin/maintenance/insurance/status', 'insuranceStatusController@index');

Route::post('/admin/maintenance/insurance/status/submit', 'insuranceStatusController@add_ins');

Route::post('/admin/maintenance/insurance/status/update', 'insuranceStatusController@update_ins');

Route::post('/admin/maintenance/insurance/status/delete', 'insuranceStatusController@delete_ins');

//Policy Status

Route::get('/admin/maintenance/policyno/status','policyStatusController@index');

Route::post('/admin/maintenance/policyno/status/submit', 'policyStatusController@add_pstat');

Route::post('/admin/maintenance/policyno/status/update', 'policyStatusController@update_pstat');

Route::post('/admin/maintenance/policyno/status/delete', 'policyStatusController@delete_pstat');

//Transmittal Status

Route::get('/admin/maintenance/transmittal/status', 'transmittalStatusController@index');

Route::post('/admin/maintenance/transmittal/status/submit', 'transmittalStatusController@add_trans');

Route::post('/admin/maintenance/transmittal/status/update', 'transmittalStatusController@update_trans');

Route::post('/admin/maintenance/transmittal/status/delete', 'transmittalStatusController@delete_trans');

//Claim Status

Route::get('/admin/maintenance/claim/status', 'claimStatusController@index');

Route::post('/admin/maintenance/claim/status/submit', 'claimStatusController@add_claim');

Route::post('/admin/maintenance/claim/status/update', 'claimStatusController@update_claim');

Route::post('/admin/maintenance/claim/status/delete', 'claimStatusController@delete_claim');


//Complaint Status

Route::get('/admin/maintenance/complaint/status', 'complaintStatusController@index');

Route::post('/admin/maintenance/complaint/status/submit', 'complaintStatusController@add_cstat');

Route::post('/admin/maintenance/complaint/status/update', 'complaintStatusController@update_cstat');

Route::post('/admin/maintenance/complaint/status/delete', 'complaintStatusController@delete_cstat');

//Complaint Type

Route::get('/admin/maintenance/complaint/type', 'complaintTypeController@index');

Route::post('/admin/maintenance/complaint/type/submit', 'complaintTypeController@add_ctype');

Route::post('/admin/maintenance/complaint/type/update', 'complaintTypeController@update_ctype');

Route::post('/admin/maintenance/complaint/type/delete', 'complaintTypeController@delete_ctype');

//Sales Agent Route

Route::get('/admin/maintenance/salesagent', 'salesAgentController@index');

Route::post('/admin/maintenance/salesagent/submit', 'salesAgentController@add_agent');

Route::post('/admin/maintenance/salesagent/update', 'salesAgentController@update_agent');

Route::post('/admin/maintenance/salesagent/delete', 'salesAgentController@delete_agent');

//Client Route

// Route::get('/admin/maintenance/client', 'clientController@index');
//
// Route::post('/admin/maintenance/client/submit', 'clientController@add_client');
//
// Route::post('/admin/maintenance/client/update', 'clientController@update_client');
//
// Route::post('/admin/maintenance/client/delete', 'clientController@delete_client');

//Courier Route

Route::get('/admin/maintenance/courier', 'courierController@index');

Route::post('/admin/maintenance/courier/submit', 'courierController@add_courier');

Route::post('/admin/maintenance/courier/update', 'courierController@update_courier');

Route::post('/admin/maintenance/courier/delete', 'courierController@delete_courier');

//Employee Type Route

Route::get('/admin/maintenance/employee/type', 'employeeTypeController@index');

Route::post('/admin/maintenance/employee/type/submit', 'employeeTypeController@add_emptype');

Route::post('/admin/maintenance/employee/type/update', 'employeeTypeController@update_emptype');

Route::post('/admin/maintenance/employee/type/delete', 'employeeTypeController@delete_emptype');

//Sender Route

Route::get('/admin/maintenance/sender', 'senderController@index');

Route::post('/admin/maintenance/sender/submit', 'senderController@add_sender');

Route::post('/admin/maintenance/sender/update', 'senderController@update_sender');

Route::post('/admin/maintenance/sender/delete', 'senderController@delete_sender');
