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

Route::get('/sign-in', 'WebControllers\clientAccessController@index');

Route::post('/sign-in/login', 'WebControllers\clientAccessController@login');

Route::get('/sign-up', function () {
    return view('pages.main.sign-up');
});

Route::get('/admin/transaction/insurance-settings-company', function (){
   return view('pages.admin.transaction.insurance-settings-company');
})->middleware('employeeAuth');

//DASHBOARD
Route::get('/admin/dashboard', function (){
   return view('pages.admin.dashboard');
})->middleware('employeeAuth');

//DASHBOARD - Accounting Staff
Route::get('/accounting-staff/dashboard', function (){
   return view('pages.accounting-staff.cimis-accounting-staff');
})->middleware('employeeAuth');

//DASHBOARD - MANAGER
Route::get('/manager/dashboard', function (){
   return view('pages.manager.cimis-manager');
})->middleware('employeeAuth');

//Logins
// Route::get('/sign-in/emp', 'SignInController@index');

// Route::post('/sign-in/login/emp', 'SignInController@Signin');

//Route::get('/sign-up', 'SignUpController@index');

//Route::post('/sign-up/submit', 'SignUpController@create_account');

// Admin Routes Starting Point //
//MAINTENANCE

//mainte-bank
Route::get('/admin/maintenance/bank', 'AdminControllers\maint_bankController@index')->middleware('employeeAuth');

Route::post('/admin/maintenance/bank/submit', 'AdminControllers\maint_bankController@add_bank')->middleware('employeeAuth');

Route::post('/admin/maintenance/bank/update', 'AdminControllers\maint_bankController@update_bank')->middleware('employeeAuth');

Route::post('/admin/maintenance/bank/delete', 'AdminControllers\maint_bankController@delete_bank')->middleware('employeeAuth');

Route::post('/admin/maintenance/bank/ardelete', 'AdminControllers\maint_bankController@ardelete_bank')->middleware('employeeAuth');

//mainte-complaint-type
Route::get('/admin/maintenance/complaint', 'AdminControllers\maint_complaintTypeController@index')->middleware('employeeAuth');

Route::post('/admin/maintenance/complaint/submit', 'AdminControllers\maint_complaintTypeController@add_ctype')->middleware('employeeAuth');

Route::post('/admin/maintenance/complaint/update', 'AdminControllers\maint_complaintTypeController@update_ctype')->middleware('employeeAuth');

Route::post('/admin/maintenance/complaint/delete', 'AdminControllers\maint_complaintTypeController@delete_ctype')->middleware('employeeAuth');

Route::post('/admin/maintenance/complaint/ardelete', 'AdminControllers\maint_complaintTypeController@ardelete_ctype')->middleware('employeeAuth');

//mainte-courier
Route::get('/admin/maintenance/courier', 'AdminControllers\maint_courierController@index')->middleware('employeeAuth');

Route::post('/admin/maintenance/courier/submit', 'AdminControllers\maint_courierController@add_courier')->middleware('employeeAuth');

Route::post('/admin/maintenance/courier/update', 'AdminControllers\maint_courierController@update_courier')->middleware('employeeAuth');

Route::post('/admin/maintenance/courier/delete', 'AdminControllers\maint_courierController@delete_courier')->middleware('employeeAuth');

Route::post('/admin/maintenance/courier/ardelete', 'AdminControllers\maint_courierController@ardelete_courier')->middleware('employeeAuth');

//mainte-employee
Route::get('/admin/maintenance/employee', 'AdminControllers\maint_employeeController@index')->middleware('employeeAuth');

Route::post('/admin/maintenance/employee/submit', 'AdminControllers\maint_employeeController@add_employee')->middleware('employeeAuth');

Route::post('/admin/maintenance/employee/update', 'AdminControllers\maint_employeeController@update_employee')->middleware('employeeAuth');

Route::post('/admin/maintenance/employee/delete', 'AdminControllers\maint_employeeController@delete_employee')->middleware('employeeAuth');

Route::post('/admin/maintenance/employee/ardelete', 'AdminControllers\maint_employeeController@ardelete_employee')->middleware('employeeAuth');

//mainte-employee-role
Route::get('/admin/maintenance/employee/role', 'AdminControllers\maint_employeeRoleController@index')->middleware('employeeAuth');

Route::post('/admin/maintenance/employee/role/submit', 'AdminControllers\maint_employeeRoleController@add_emp_role')->middleware('employeeAuth');

Route::post('/admin/maintenance/employee/role/update', 'AdminControllers\maint_employeeRoleController@update_emp_role')->middleware('employeeAuth');

Route::post('/admin/maintenance/employee/role/delete', 'AdminControllers\maint_employeeRoleController@delete_emp_role')->middleware('employeeAuth');

Route::post('/admin/maintenance/employee/role/ardelete', 'AdminControllers\maint_employeeRoleController@ardelete_emp_role')->middleware('employeeAuth');

//mainte-inst-type
Route::get('/admin/maintenance/installment', 'AdminControllers\maint_installmentTypeController@index')->middleware('employeeAuth');

Route::post('/admin/maintenance/installment/submit', 'AdminControllers\maint_installmentTypeController@add_installment')->middleware('employeeAuth');

Route::post('/admin/maintenance/installment/update', 'AdminControllers\maint_installmentTypeController@update_installment')->middleware('employeeAuth');

Route::post('/admin/maintenance/installment/delete', 'AdminControllers\maint_installmentTypeController@delete_installment')->middleware('employeeAuth');

Route::post('/admin/maintenance/installment/ardelete', 'AdminControllers\maint_installmentTypeController@ardelete_installment')->middleware('employeeAuth');

// //mainte-insurance-comp
// Route::get('/admin/maintenance/insurance/company', 'AdminControllers\maint_insuranceCompanyController@index');

// Route::post('/admin/maintenance/insurance/company/submit', 'AdminControllers\maint_insuranceCompanyController@add_inscomp');

// Route::post('/admin/maintenance/insurance/company/update', 'AdminControllers\maint_insuranceCompanyController@update_inscomp');

// Route::post('/admin/maintenance/insurance/company/delete', 'AdminControllers\maint_insuranceCompanyController@delete_inscomp');

// Route::post('/admin/maintenance/insurance/company/ardelete', 'AdminControllers\maint_insuranceCompanyController@ardelete_inscomp');

// //mainte-policynum
// Route::get('/admin/maintenance/policyno', 'AdminControllers\maint_policyNumberController@index');

// Route::post('/admin/maintenance/policyno/submit', 'AdminControllers\maint_policyNumberController@add_policy');

// Route::post('/admin/maintenance/policyno/update', 'AdminControllers\maint_policyNumberController@update_policy');

// Route::post('/admin/maintenance/policyno/delete', 'AdminControllers\maint_policyNumberController@delete_policy');

// Route::post('/admin/maintenance/policyno/ardelete', 'AdminControllers\maint_policyNumberController@ardelete_policy');

//mainte-salesagent
Route::get('/admin/maintenance/salesagent', 'AdminControllers\maint_salesAgentController@index')->middleware('employeeAuth');

Route::post('/admin/maintenance/salesagent/submit', 'AdminControllers\maint_salesAgentController@add_agent')->middleware('employeeAuth');

Route::post('/admin/maintenance/salesagent/update', 'AdminControllers\maint_salesAgentController@update_agent')->middleware('employeeAuth');

Route::post('/admin/maintenance/salesagent/delete', 'AdminControllers\maint_salesAgentController@delete_agent')->middleware('employeeAuth');

Route::post('/admin/maintenance/salesagent/ardelete', 'AdminControllers\maint_salesAgentController@ardelete_agent')->middleware('employeeAuth');

//mainte-vehiclemake
Route::get('/admin/maintenance/vehicle/make', 'AdminControllers\maint_vMakeController@index')->middleware('employeeAuth');

Route::post('/admin/maintenance/vehicle/make/submit', 'AdminControllers\maint_vMakeController@add_vMake')->middleware('employeeAuth');

Route::post('/admin/maintenance/vehicle/make/update', 'AdminControllers\maint_vMakeController@update_vMake')->middleware('employeeAuth');

Route::post('/admin/maintenance/vehicle/make/delete', 'AdminControllers\maint_vMakeController@delete_vMake')->middleware('employeeAuth');

Route::post('/admin/maintenance/vehicle/make/ardelete', 'AdminControllers\maint_vMakeController@ardelete_vMake')->middleware('employeeAuth');

//mainte-vehicletype
Route::get('/admin/maintenance/vehicle/type', 'AdminControllers\maint_vTypeController@index')->middleware('employeeAuth');

Route::post('/admin/maintenance/vehicle/type/submit', 'AdminControllers\maint_vTypeController@add_vType')->middleware('employeeAuth');

Route::post('/admin/maintenance/vehicle/type/update', 'AdminControllers\maint_vTypeController@update_vType')->middleware('employeeAuth');

Route::post('/admin/maintenance/vehicle/type/delete', 'AdminControllers\maint_vTypeController@delete_vType')->middleware('employeeAuth');

Route::post('/admin/maintenance/vehicle/type/ardelete', 'AdminControllers\maint_vTypeController@ardelete_vType')->middleware('employeeAuth');

//mainte-vehiclemodel
Route::get('/admin/maintenance/vehicle/model', 'AdminControllers\maint_vModelController@index')->middleware('employeeAuth');

Route::post('/admin/maintenance/vehicle/model/submit', 'AdminControllers\maint_vModelController@add_vModel')->middleware('employeeAuth');

Route::post('/admin/maintenance/vehicle/model/update', 'AdminControllers\maint_vModelController@update_vModel')->middleware('employeeAuth');

Route::post('/admin/maintenance/vehicle/model/delete', 'AdminControllers\maint_vModelController@delete_vModel')->middleware('employeeAuth');

Route::post('/admin/maintenance/vehicle/model/ardelete', 'AdminControllers\maint_vModelController@ardelete_vModel')->middleware('employeeAuth');

//mainte-vehiclelist
Route::get('/admin/maintenance/vehicle/list', 'AdminControllers\maint_vListController@index')->middleware('employeeAuth');

Route::post('/admin/maintenance/vehicle/list/submit', 'AdminControllers\maint_vListController@add_vList')->middleware('employeeAuth');

Route::post('/admin/maintenance/vehicle/list/update', 'AdminControllers\maint_vListController@update_vList')->middleware('employeeAuth');

Route::post('/admin/maintenance/vehicle/list/delete', 'AdminControllers\maint_vListController@delete_vList')->middleware('employeeAuth');

Route::post('/admin/maintenance/vehicle/list/ardelete', 'AdminControllers\maint_vListController@ardelete_vList')->middleware('employeeAuth');

//mainte-client-ind
Route::get('/admin/maintenance/client/individual', 'AdminControllers\maint_ClientIndividualController@index')->middleware('employeeAuth');

Route::post('/admin/maintenance/client/individual/submit', 'AdminControllers\maint_ClientIndividualController@add_client')->middleware('employeeAuth');

Route::post('/admin/maintenance/client/individual/update', 'AdminControllers\maint_ClientIndividualController@update_client')->middleware('employeeAuth');

Route::post('/admin/maintenance/client/individual/delete', 'AdminControllers\maint_ClientIndividualController@delete_client')->middleware('employeeAuth');

Route::post('/admin/maintenance/client/individual/ardelete', 'AdminControllers\maint_ClientIndividualController@ardelete_client')->middleware('employeeAuth');

//mainte-client-company
Route::get('/admin/maintenance/client/company', 'AdminControllers\maint_ClientCompanyController@index')->middleware('employeeAuth');

Route::post('/admin/maintenance/client/company/submit', 'AdminControllers\maint_ClientCompanyController@add_client_comp')->middleware('employeeAuth');

Route::post('/admin/maintenance/client/company/update', 'AdminControllers\maint_ClientCompanyController@update_client_comp')->middleware('employeeAuth');

Route::post('/admin/maintenance/client/company/delete', 'AdminControllers\maint_ClientCompanyController@delete_client_comp')->middleware('employeeAuth');

Route::post('/admin/maintenance/client/company/ardelete', 'AdminControllers\maint_ClientCompanyController@ardelete_client_comp')->middleware('employeeAuth');

//mainte-auto-pa-premium
Route::get('/admin/maintenance/personal-accident', 'AdminControllers\maint_pAutoController@index')->middleware('employeeAuth');

Route::post('/admin/maintenance/personal-accident/submit', 'AdminControllers\maint_pAutoController@add_premiumPA')->middleware('employeeAuth');

Route::post('/admin/maintenance/personal-accident/update', 'AdminControllers\maint_pAutoController@update_premiumPA')->middleware('employeeAuth');

Route::post('/admin/maintenance/personal-accident/delete', 'AdminControllers\maint_pAutoController@delete_premiumPA')->middleware('employeeAuth');

Route::post('/admin/maintenance/personal-accident/ardelete', 'AdminControllers\maint_pAutoController@ardelete_premiumPA')->middleware('employeeAuth');

//mainte-bodily-injury-premium
Route::get('/admin/maintenance/bodily-injury', 'AdminControllers\maint_pBodilyInjuryController@index')->middleware('employeeAuth');

Route::post('/admin/maintenance/bodily-injury/submit', 'AdminControllers\maint_pBodilyInjuryController@add_premiumDG')->middleware('employeeAuth');

Route::post('/admin/maintenance/bodily-injury/update', 'AdminControllers\maint_pBodilyInjuryController@update_premiumDG')->middleware('employeeAuth');

Route::post('/admin/maintenance/bodily-injury/delete', 'AdminControllers\maint_pBodilyInjuryController@delete_premiumdG')->middleware('employeeAuth');

Route::post('/admin/maintenance/bodily-injury/ardelete', 'AdminControllers\maint_pBodilyInjuryController@ardelete_premiumDG')->middleware('employeeAuth');

//mainte-property-damage-premium
Route::get('/admin/maintenance/property-damage', 'AdminControllers\maint_pPropertyDamageController@index')->middleware('employeeAuth');

Route::post('/admin/maintenance/property-damage/submit', 'AdminControllers\maint_pPropertyDamageController@add_premiumDG')->middleware('employeeAuth');

Route::post('/admin/maintenance/property-damage/update', 'AdminControllers\maint_pPropertyDamageController@update_premiumDG')->middleware('employeeAuth');

Route::post('/admin/maintenance/property-damage/delete', 'AdminControllers\maint_pPropertyDamageController@delete_premiumdG')->middleware('employeeAuth');

Route::post('/admin/maintenance/property-damage/ardelete', 'AdminControllers\maint_pPropertyDamageController@ardelete_premiumDG')->middleware('employeeAuth');

//MAINTE - ClaimType
Route::get('/admin/maintenance/claim-type', 'AdminControllers\maint_claimTypeController@index')->middleware('employeeAuth');

Route::post('/admin/maintenance/claim-type/submit', 'AdminControllers\maint_claimTypeController@add_claim_type')->middleware('employeeAuth');

Route::post('/admin/maintenance/claim-type/update', 'AdminControllers\maint_claimTypeController@update_claim_type')->middleware('employeeAuth');

Route::post('/admin/maintenance/claim-type/delete', 'AdminControllers\maint_claimTypeController@delete_claim_type')->middleware('employeeAuth');

Route::post('/admin/maintenance/claim-type/ardelete', 'AdminControllers\maint_claimTypeController@ardelete_claim_type')->middleware('employeeAuth');

//MAINTE - ClaimRequirement
Route::get('/admin/maintenance/claim-requirement', 'AdminControllers\maint_claimRequirementsController@index')->middleware('employeeAuth');

Route::post('/admin/maintenance/claim-requirement/submit', 'AdminControllers\maint_claimRequirementsController@add_claim_requirements')->middleware('employeeAuth');

Route::post('/admin/maintenance/claim-requirement/update', 'AdminControllers\maint_claimRequirementsController@update_claim_requirements')->middleware('employeeAuth');

Route::post('/admin/maintenance/claim-requirement/delete', 'AdminControllers\maint_claimRequirementsController@delete_claim_requirements')->middleware('employeeAuth');

Route::post('/admin/maintenance/claim-requirement/ardelete', 'AdminControllers\maint_claimRequirementsController@ardelete_claim_requirements')->middleware('employeeAuth');

//MAINTE - Transmittal
Route::get('/admin/maintenance/transmittal', 'AdminControllers\maint_transmittalController@index')->middleware('employeeAuth');

Route::post('/admin/maintenance/transmittal/submit', 'AdminControllers\maint_transmittalController@add_transmittal_record')->middleware('employeeAuth');

Route::post('/admin/maintenance/transmittal/update', 'AdminControllers\maint_transmittalController@update_transmittal_record')->middleware('employeeAuth');

Route::post('/admin/maintenance/transmittal/delete', 'AdminControllers\maint_transmittalController@delete_transmittal_record')->middleware('employeeAuth');

Route::post('/admin/maintenance/transmittal/ardelete', 'AdminControllers\maint_transmittalController@ardelete_transmittal_record')->middleware('employeeAuth');

//TRANSACTION
//Insurance - individual
Route::get('/admin/transaction/insurance-individual', 'AdminControllers\trans_insIndividualController@index')->middleware('employeeAuth');

Route::post('/admin/transaction/insurance-details-individual', 'AdminControllers\trans_insIndividualController@display_info')->middleware('employeeAuth');

//Insurance - company
Route::get('/admin/transaction/insurance-company', 'AdminControllers\trans_insCompanyController@index')->middleware('employeeAuth');

Route::post('/admin/transaction/insurance-details-company', 'AdminControllers\trans_insCompanyController@display_info')->middleware('employeeAuth');


//Insurance - Expiring Accounts - Company
Route::get('/admin/transaction/insurance-expiring-accounts-company', 'AdminControllers\trans_expireAccountController@list_comp')->middleware('employeeAuth');
Route::post('/admin/transaction/insurance-details-company-expiring', 'AdminControllers\trans_expireAccountController@display_info_comp')->middleware('employeeAuth');

//Insurance - Expiring Accounts - Individual
Route::get('/admin/transaction/insurance-expiring-accounts-individual', 'AdminControllers\trans_expireAccountController@list_ind')->middleware('employeeAuth');
Route::post('/admin/transaction/insurance-details-individual-expiring', 'AdminControllers\trans_expireAccountController@display_info_ind')->middleware('employeeAuth');


//Insurance - Sent notifications - Company
Route::get('/admin/transaction/insurance-notification-list-company', function (){
   return view('pages.admin.transaction.insurance-notification-list-company');
})->middleware('employeeAuth');

//Insurance - Sent notifications - Individual
Route::get('/admin/transaction/insurance-notification-list-individual', function (){
   return view('pages.admin.transaction.insurance-notification-list-individual');
})->middleware('employeeAuth');

//Insurance - Settings - Individual
Route::get('/admin/transaction/insurance-settings-individual', function (){
   return view('pages.admin.transaction.insurance-settings-individual');
})->middleware('employeeAuth');

//Insurance - Settings - Individual
Route::get('/admin/transaction/insurance-settings-company', function (){
   return view('pages.admin.transaction.insurance-settings-company');
})->middleware('employeeAuth');

//Claims - walkin
Route::get('/admin/transaction/claim-request-walkin', 'AdminControllers\trans_claimsController@claims_list')->middleware('employeeAuth');
Route::post('/admin/transaction/claim-request-walkin/forward-manager', 'AdminControllers\trans_claimsController@forward_manager')->middleware('employeeAuth');
Route::post('/admin/transaction/claim-request-walkin/reject-request', 'AdminControllers\trans_claimsController@reject_request')->middleware('employeeAuth');

//Claims - online
Route::get('/admin/transaction/claim-request-online', 'AdminControllers\trans_claimsOnlineController@index')->middleware('employeeAuth');
Route::post('/admin/transaction/claim-request-online/forward-claim', 'AdminControllers\trans_claimsOnlineController@forward_claim')->middleware('employeeAuth');
Route::post('/admin/transaction/claim-request-online/reject-request', 'AdminControllers\trans_claimsOnlineController@reject_request')->middleware('employeeAuth');

//Claims - rejected lists
Route::get('/admin/transaction/claim-rejected', 'AdminControllers\trans_claimsRejectedController@index')->middleware('employeeAuth');

//Claims - CREATE REQ walkin
Route::get('/admin/transaction/claim-create-request-walkin', 'AdminControllers\trans_claimsController@index')->middleware('employeeAuth');
Route::post('/admin/transaction/claim-create-request-walkin/submit', 'AdminControllers\trans_claimsController@new_claim')->middleware('employeeAuth');

//Claims details walkin
Route::get('/admin/transaction/claim-details-walkin', 'AdminControllers\trans_claimsController@view_claim_details')->middleware('employeeAuth');
Route::post('/admin/transaction/claim-details-walkin/submit', 'AdminControllers\trans_claimsController@update_claim_details')->middleware('employeeAuth');

//Claims details online
Route::get('/admin/transaction/claim-details-online', 'AdminControllers\trans_claimsOnlineController@view_claim_details')->middleware('employeeAuth');


//Complaint - online
Route::get('/admin/transaction/complaint-online', 'AdminControllers\trans_complaintStatsController@index')->middleware('employeeAuth');

//Complaint - new
Route::get('/admin/transaction/complaint-new', 'AdminControllers\trans_complaintActionController@view_complaint_new')->middleware('employeeAuth');

Route::post('/admin/transaction/complaint-new/action', 'AdminControllers\trans_complaintActionController@send')->middleware('employeeAuth');

//Complaint - ended
Route::get('/admin/transaction/complaint-ended', 'AdminControllers\trans_complaintEndController@index')->middleware('employeeAuth');

//Complaint-pending
Route::get('/admin/transaction/complaint-pending', 'AdminControllers\trans_complaintPendingController@index')->middleware('employeeAuth');

Route::post('/admin/transaction/complaint-pending/update', 'AdminControllers\trans_complaintPendingController@act_complaint')->middleware('employeeAuth');

Route::get('/admin/transaction/complaint-pending/view', 'AdminControllers\trans_complaintPendingController@view')->middleware('employeeAuth');

//Complaint-list
Route::get('/admin/transaction/complaint-list', 'AdminControllers\trans_complaintListController@index')->middleware('employeeAuth');

Route::post('/admin/transaction/complaint-list/update', 'AdminControllers\trans_complaintListController@update_complaint')->middleware('employeeAuth');

Route::get('/admin/transaction/complaint-list/view', 'AdminControllers\trans_complaintListController@view')->middleware('employeeAuth');

//Complaint-info
Route::get('/admin/transaction/complaint-details', function (){
   return view('pages.admin.transaction.complaint-details');
})->middleware('employeeAuth');

//Complaint-auto-reply
Route::get('/admin/transaction/complaint-auto-reply', function (){
   return view('pages.admin.transaction.complaint-auto-reply');
})->middleware('employeeAuth');

//Transmittal - home
Route::get('/admin/transaction/transmittal-home', 'AdminControllers\trans_transmittalHomeController@index')->middleware('employeeAuth');

//Transmittal
Route::get('/admin/transaction/transmittal', 'AdminControllers\trans_transmittedController@index')->middleware('employeeAuth');

Route::post('/admin/transaction/transmittal/update', 'AdminControllers\trans_transmittedController@update')->middleware('employeeAuth');

Route::get('/admin/transaction/transmittal/view', 'AdminControllers\trans_transmittedController@view')->middleware('employeeAuth');

//Transmittal - documents
Route::get('/admin/transaction/transmittal-documents', 'AdminControllers\trans_transmitDocumentController@index')->middleware('employeeAuth');

Route::post('/admin/transaction/transmittal-documents/transmit', 'AdminControllers\trans_transmitDocumentController@transmit')->middleware('employeeAuth');

Route::post('/admin/transaction/transmittal-documents/direct_transmit', 'AdminControllers\trans_transmitDocumentController@direct_transmit')->middleware('employeeAuth');

//Transmittal - request
Route::get('/admin/transaction/transmittal-request', 'AdminControllers\trans_transmittalRequestController@index')->middleware('employeeAuth');

Route::post('/admin/transaction/transmittal-request/approve', 'AdminControllers\trans_transmittalRequestController@approve')->middleware('employeeAuth');

Route::post('/admin/transaction/transmittal-request/disapprove', 'AdminControllers\trans_transmittalRequestController@disapprove')->middleware('employeeAuth');

Route::get('/admin/transaction/transmittal-request/view', 'AdminControllers\trans_transmittalRequestController@view')->middleware('employeeAuth');

Route::get('/admin/transaction/transmittal-request/transmit', 'AdminControllers\trans_transmittalRequestController@transmit')->middleware('employeeAuth');

//Transmittal - ended
Route::get('/admin/transaction/transmittal-ended', 'AdminControllers\trans_transmittalEndController@index')->middleware('employeeAuth');

//Transmittal - validate
Route::get('/admin/transaction/transmittal-info-request', function (){
   return view('pages.admin.transaction.transmittal-info-request');
})->middleware('employeeAuth');

//Transmittal - info
Route::get('/admin/transaction/transmittal-info-approved', function (){
   return view('pages.admin.transaction.transmittal-info-approved');
})->middleware('employeeAuth');

//Transmittal - auto-reply
Route::get('/admin/transaction/transmittal-auto-reply', function (){
   return view('pages.admin.transaction.transmittal-auto-reply');
})->middleware('employeeAuth');

//QUERIES
Route::get('/admin/queries/most-active-company-client', 'AdminControllers\z_Queries_activeCompanyClientController@index')->middleware('employeeAuth');

Route::get('/admin/queries/most-active-individual-client', 'AdminControllers\z_Queries_activeIndividualClientController@index')->middleware('employeeAuth');

Route::get('/admin/queries/complaint-insurance', 'AdminControllers\z_Queries_complaintInsuranceController@index')->middleware('employeeAuth');

Route::get('/admin/queries/complaint-type', 'AdminControllers\z_Queries_complaintTypeController@index')->middleware('employeeAuth');

Route::get('/admin/queries/top-company-client', 'AdminControllers\z_Queries_topCompanyClientController@index')->middleware('employeeAuth');

Route::get('/admin/queries/top-individual-client', 'AdminControllers\z_Queries_topIndividualClientController@index')->middleware('employeeAuth');

Route::get('/admin/queries/top-insurance-company', 'AdminControllers\z_Queries_topInsuranceCompanyController@index')->middleware('employeeAuth');

Route::get('/admin/queries/top-insured-vehicle', 'AdminControllers\z_Queries_topInsuredVehicleController@index')->middleware('employeeAuth');

Route::get('/admin/queries/top-sales-agent', 'AdminControllers\z_Queries_topSalesAgentController@index')->middleware('employeeAuth');

//REPORTS
//Tally
Route::get('/admin/reports/tally', function (){
   return view('pages.admin.reports.tally');
})->middleware('employeeAuth');

//Tally
Route::get('/admin/reports/tally-info', function (){
   return view('pages.report.adm.tally-info');
})->middleware('employeeAuth');

Route::get('/admin/reports/sales/overall', 'AdminControllers\reports_SalesByPaymentController@index')->middleware('employeeAuth');

Route::get('/admin/reports/sales/count', 'AdminControllers\reports_SalesByNumberOfPaymentsController@index')->middleware('employeeAuth');

Route::get('/admin/reports/sales/insurance/company', 'AdminControllers\reports_SalesByInsuranceCompanyController@index')->middleware('employeeAuth');

Route::get('/admin/reports/sales/agency', 'AdminControllers\reports_SalesByAgencyController@index')->middleware('employeeAuth');

//UTILITIES
Route::get('/admin/utilities/archives', 'AdminControllers\z_Utilities_ArchivesController@index')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/bank/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_bank')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/bank/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_bank')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/client/individual/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_client')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/client/individual/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_client')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/client/company/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_client_company')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/client/company/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_client_company')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/employee/role/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_employee_role')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/employee/role/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_employee_role')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/employee/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_employee')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/employee/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_employee')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/salesagent/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_agent')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/salesagent/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_agent')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/courier/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_courier')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/courier/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_courier')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/vehicle/type/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_vehicle_type')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/vehicle/type/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_vehicle_type')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/vehicle/make/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_vehicle_make')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/vehicle/make/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_vehicle_make')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/vehicle/model/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_vehicle_model')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/vehicle/model/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_vehicle_model')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/policynumber/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_policynumber')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/policynumber/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_policynumber')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/installment/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_installment')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/installment/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_installment')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/complaint/type/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_complaint_type')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/complaint/type/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_complaint_type')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/personal-accident/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_personal_accident')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/personal-accident/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_personal_accident')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/premium-damage/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_premium_damage')->middleware('employeeAuth');

Route::post('/admin/utilities/archives/premium-damage/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_premium_damage')->middleware('employeeAuth');


//utilities-insurance-comp
Route::get('/admin/utilities/insurance/company', 'AdminControllers\maint_insuranceCompanyController@index')->middleware('employeeAuth');

Route::post('/admin/utilities/insurance/company/submit', 'AdminControllers\maint_insuranceCompanyController@add_inscomp')->middleware('employeeAuth');

Route::post('/admin/utilities/insurance/company/update', 'AdminControllers\maint_insuranceCompanyController@update_inscomp')->middleware('employeeAuth');

Route::post('/admin/utilities/insurance/company/delete', 'AdminControllers\maint_insuranceCompanyController@delete_inscomp')->middleware('employeeAuth');

Route::post('/admin/utilities/insurance/company/ardelete', 'AdminControllers\maint_insuranceCompanyController@ardelete_inscomp')->middleware('employeeAuth');

//utilities-policynum
Route::get('/admin/utilities/policyno', 'AdminControllers\maint_policyNumberController@index')->middleware('employeeAuth');

Route::post('/admin/utilities/policyno/submit', 'AdminControllers\maint_policyNumberController@add_policy')->middleware('employeeAuth');

Route::post('/admin/utilities/policyno/update', 'AdminControllers\maint_policyNumberController@update_policy')->middleware('employeeAuth');

Route::post('/admin/utilities/policyno/delete', 'AdminControllers\maint_policyNumberController@delete_policy')->middleware('employeeAuth');

Route::post('/admin/utilities/policyno/ardelete', 'AdminControllers\maint_policyNumberController@ardelete_policy')->middleware('employeeAuth');

//utilities-tax
Route::get('/admin/utilities/tax', 'AdminControllers\z_Utilities_TaxSettingsController@index')->middleware('employeeAuth');
Route::post('/admin/utilities/tax/save', 'AdminControllers\z_Utilities_TaxSettingsController@update_value')->middleware('employeeAuth');

//utilities-premium
Route::get('/admin/utilities/premium', 'AdminControllers\z_Utilities_ComputationSettingsController@index')->middleware('employeeAuth');
Route::post('/admin/utilities/premium/save', 'AdminControllers\z_Utilities_ComputationSettingsController@update_value')->middleware('employeeAuth');
//Admin Routes End Point//

//Accounting Staff Routes Start Point//

//Dashboard
Route::get('/accounting-staff/dashboard', function (){
   return view('pages.accounting-staff.cimis-accounting-staff');
})->middleware('employeeAuth');

//TRANSACTIONS/////////////////////////////////////////
//trans-client-ind
Route::get('/accounting-staff/transaction/client/individual', 'AccStaffControllers\trans_ClientIndividualController@index')->middleware('employeeAuth');

Route::post('/accounting-staff/transaction/client/individual/submit', 'AccStaffControllers\trans_ClientIndividualController@add_client')->middleware('employeeAuth');

Route::post('/accounting-staff/transaction/client/individual/update', 'AccStaffControllers\trans_ClientIndividualController@update_client')->middleware('employeeAuth');

Route::post('/accounting-staff/transaction/client/individual/delete', 'AccStaffControllers\trans_ClientIndividualController@delete_client')->middleware('employeeAuth');

Route::post('/accounting-staff/transaction/client/individual/ardelete', 'AccStaffControllers\trans_ClientIndividualController@ardelete_client')->middleware('employeeAuth');

//trans-client-company
Route::get('/accounting-staff/transaction/client/company', 'AccStaffControllers\trans_ClientCompanyController@index')->middleware('employeeAuth');

Route::post('/accounting-staff/transaction/client/company/submit', 'AccStaffControllers\trans_ClientCompanyController@add_client_comp')->middleware('employeeAuth');

Route::post('/accounting-staff/transaction/client/company/update', 'AccStaffControllers\trans_ClientCompanyController@update_client_comp')->middleware('employeeAuth');

Route::post('/accounting-staff/transaction/client/company/delete', 'AccStaffControllers\trans_ClientCompanyController@delete_client_comp')->middleware('employeeAuth');

Route::post('/accounting-staff/transaction/client/company/ardelete', 'AccStaffControllers\trans_ClientCompanyController@ardelete_client_comp')->middleware('employeeAuth');

//Insure Client
Route::get('/accounting-staff/transaction/insure-client', 'AccStaffControllers\trans_insureClientsController@index')->middleware('employeeAuth');

Route::post('/accounting-staff/transaction/insure-client/proceed', 'AccStaffControllers\trans_insureClientsController@send_data_individual')->middleware('employeeAuth');

Route::post('/accounting-staff/transaction/insure-client/submit', 'AccStaffControllers\trans_insureClientsController@save_insurance_account')->middleware('employeeAuth');

//Insurance - individual
Route::get('/accounting-staff/transaction/insurance-individual', 'AccStaffControllers\trans_insIndividualController@index')->middleware('employeeAuth');

Route::post('/accounting-staff/transaction/insurance-details-individual', 'AccStaffControllers\trans_insIndividualController@display_info')->middleware('employeeAuth');

//Insurance - company
Route::get('/accounting-staff/transaction/insurance-company', 'AccStaffControllers\trans_insCompanyController@index')->middleware('employeeAuth');

Route::post('/accounting-staff/transaction/insurance-details-company', 'AccStaffControllers\trans_insCompanyController@display_info')->middleware('employeeAuth');

//Insurance - Expiring Accounts - Company
Route::get('/accounting-staff/transaction/insurance-expiring-accounts-company', function (){
   return view('pages.accounting-staff.transaction.insurance-expiring-accounts-company');
})->middleware('employeeAuth');

//Insurance - Expiring Accounts - Individual
Route::get('/accounting-staff/transaction/insurance-expiring-accounts-individual', function (){
   return view('pages.accounting-staff.transaction.insurance-expiring-accounts-individual');
})->middleware('employeeAuth');

//Insurance - RENEW individual
Route::get('/accounting-staff/transaction/insurance-renew-individual', function (){
   return view('pages.accounting-staff.transaction.insurance-renew-individual');
})->middleware('employeeAuth');

//Insurance - RENEW company
Route::get('/accounting-staff/transaction/insurance-renew-company', function (){
   return view('pages.accounting-staff.transaction.insurance-renew-company');
})->middleware('employeeAuth');

//Quotation Walkin Request
Route::get('/accounting-staff/transaction/quotation-walkin', 'AccStaffControllers\trans_quoteWalkinController@index')->middleware('employeeAuth');

Route::post('/accounting-staff/transaction/quotation-walkin/individual', 'AccStaffControllers\trans_quoteWalkinController@add_quote_indi')->middleware('employeeAuth');

Route::post('/accounting-staff/transaction/quotation-walkin/company', 'AccStaffControllers\trans_quoteWalkinController@add_quote_comp')->middleware('employeeAuth');

//Quotation LIST
Route::get('/accounting-staff/transaction/quotation-list', 'AccStaffControllers\trans_quotationListController@index')->middleware('employeeAuth');

Route::get('/accounting-staff/transaction/quotation-individual-details', 'AccStaffControllers\trans_quotationListController@view_indi_details')->middleware('employeeAuth');

Route::get('/accounting-staff/transaction/quotation-company-details', 'AccStaffControllers\trans_quotationListController@view_comp_details')->middleware('employeeAuth');

Route::post('/accounting-staff/transaction/quotation-list/forward-manager', 'AccStaffControllers\trans_quotationListController@forward_manager')->middleware('employeeAuth');

Route::post('/accounting-staff/transaction/quotation-list/forward-client', 'AccStaffControllers\trans_quotationListController@forward_client');

Route::post('/accounting-staff/transaction/quotation-list/insure-client', 'AccStaffControllers\trans_quotationListController@insure_client')->middleware('employeeAuth');

Route::post('/accounting-staff/transaction/quotation-list/update', 'AccStaffControllers\trans_quotationListController@update_quote_stat')->middleware('employeeAuth');

Route::post('/accounting-staff/transaction/quotation-list/proceed', 'AccStaffControllers\trans_quoteInsureController@send_data_individual')->middleware('employeeAuth');

Route::post('/accounting-staff/transaction/quotation-list/submit', 'AccStaffControllers\trans_quoteInsureController@save_insurance_account')->middleware('employeeAuth');

//Quotation ONLINE AUTO REPLY
Route::get('/accounting-staff/transaction/quotation-online-auto-reply', function (){
   return view('pages.accounting-staff.transaction.quotation-online-auto-reply');
})->middleware('employeeAuth');


//PAYMENT
Route::get('/accounting-staff/transaction/payment', 'AccStaffControllers\trans_listBreakdownController@index')->middleware('employeeAuth');

//PAYMENT request
Route::get('/accounting-staff/transaction/payment-request-details', function (){
   return view('pages.accounting-staff.transaction.payment-request-details');
})->middleware('employeeAuth');

//PAYMENT-VIEW online
Route::get('/accounting-staff/transaction/payment-view', function (){
   return view('pages.accounting-staff.transaction.payment-view');
})->middleware('employeeAuth');

//PAYMENT-ONLINE
Route::get('/accounting-staff/transaction/payment-online', function (){
   return view('pages.accounting-staff.transaction.payment-online');
})->middleware('employeeAuth');

//PAYMENT-ONLINE auto reply
Route::get('/accounting-staff/transaction/payment-online-auto-reply', function (){
   return view('pages.accounting-staff.transaction.payment-online-auto-reply');
})->middleware('employeeAuth');

//PAYMENT-new
Route::get('/accounting-staff/transaction/payment-new', 'AccStaffControllers\trans_paymentController@index')->middleware('employeeAuth');

Route::post('/accounting-staff/transaction/payment-new/submit', 'AccStaffControllers\trans_paymentController@payment')->middleware('employeeAuth');

Route::post('/accounting-staff/transaction/payment-new/submit2', 'AccStaffControllers\trans_paymentController@payment2')->middleware('employeeAuth');

//PAYMENT-list
Route::get('/accounting-staff/transaction/payment-list', 'AccStaffControllers\trans_paymentListController@index')->middleware('employeeAuth');

//Payment Details
Route::get('/accounting-staff/transaction/payment-details', function (){
   return view('pages.accounting-staff.transaction.payment-details');
})->middleware('employeeAuth');

//LEDGER
Route::get('/accounting-staff/transaction/ledger', 'AccStaffControllers\trans_ledgerController@index')->middleware('employeeAuth');
Route::get('/accounting-staff/transaction/ledger-entry', 'AccStaffControllers\trans_ledgerController@index1')->middleware('employeeAuth');
Route::post('/accounting-staff/transaction/ledger-entry/submit', 'AccStaffControllers\trans_ledgerController@new_entry')->middleware('employeeAuth');

//LISTS - PR
Route::get('/accounting-staff/transaction/list-policy-receipt', 'AccStaffControllers\trans_listPRController@index')->middleware('employeeAuth');

//LISTS - CV
Route::get('/accounting-staff/transaction/list-check-voucher', 'AccStaffControllers\trans_listCVController@index')->middleware('employeeAuth');


//Accounting Staff End Point//
//MANAGER Start Point//
//quotation 
Route::get('/manager/transaction/quotation', 'ManagerControllers\indi_quotationApprovalController@quoteHome')->middleware('employeeAuth');

//quotation - individual
Route::get('/manager/transaction/quotation-individual', 'ManagerControllers\indi_quotationApprovalController@index')->middleware('employeeAuth');

Route::post('/manager/transaction/quotation-individual/approve', 'ManagerControllers\indi_quotationApprovalController@approve_quote')->middleware('employeeAuth');

Route::post('/manager/transaction/quotation-individual/disapprove', 'ManagerControllers\indi_quotationApprovalController@disapprove_quote')->middleware('employeeAuth');

//quotation - company
Route::get('/manager/transaction/quotation-company', 'ManagerControllers\comp_quotationApprovalController@index')->middleware('employeeAuth');

Route::post('/manager/transaction/quotation-company/approve', 'ManagerControllers\comp_quotationApprovalController@approve_quote')->middleware('employeeAuth');

Route::post('/manager/transaction/quotation-company/disapprove', 'ManagerControllers\comp_quotationApprovalController@disapprove_quote')->middleware('employeeAuth');

//payment
Route::get('/manager/transaction/payment', function (){
   return view('pages.manager.transaction.payment');   
})->middleware('employeeAuth');

//payment-home
Route::get('/manager/transaction/payment-home', function (){
   return view('pages.manager.transaction.payment-home');   
})->middleware('employeeAuth');

//payment-list
Route::get('/manager/transaction/payment-list', 'ManagerControllers\trans_paymentListController@index')->middleware('employeeAuth');

//Claims - walkin
Route::get('/manager/transaction/claims', 'ManagerControllers\walkin_claimApprovalController@claims_list')->middleware('employeeAuth');
//Claims details walkin
Route::get('/manager/transaction/claim-details', 'ManagerControllers\walkin_claimApprovalController@view_claim_details')->middleware('employeeAuth');
//Claims - walkin
Route::post('/manager/transaction/claims/forward-insurance', 'ManagerControllers\walkin_claimApprovalController@forward_insurance')->middleware('employeeAuth');

Route::get('/manager/transaction/claim-transmit', 'ManagerControllers\walkin_claimApprovalController@transmit_docu')->middleware('employeeAuth');

Route::post('/manager/transaction/claim-transmit/submit', 'ManagerControllers\walkin_claimApprovalController@transmit_docu_save')->middleware('employeeAuth');


//claims-settings
Route::get('/manager/transaction/claims-settings', function (){
   return view('pages.manager.transaction.claims-settings');   
})->middleware('employeeAuth');

//transmittal
Route::get('/manager/transaction/transmittal', 'ManagerControllers\transmittalApprovalController@index')->middleware('employeeAuth');

Route::get('/manager/transaction/transmittal/view', 'ManagerControllers\transmittalApprovalController@view')->middleware('employeeAuth');

Route::post('/manager/transaction/transmittal/approve', 'ManagerControllers\transmittalApprovalController@approve')->middleware('employeeAuth');

Route::post('/manager/transaction/transmittal/disapprove', 'ManagerControllers\transmittalApprovalController@disapprove')->middleware('employeeAuth');

//transmittal-claim
Route::get('/manager/transaction/transmittal/list', 'ManagerControllers\transmittalListController@index')->middleware('employeeAuth');
Route::get('/manager/transaction/transmittal/list/details', 'ManagerControllers\transmittalListController@view_details')->middleware('employeeAuth');
Route::post('/manager/transaction/transmittal/list/submit', 'ManagerControllers\transmittalListController@update_status')->middleware('employeeAuth');

//transmittal details
Route::get('/manager/transaction/transmittal-details', function (){
   return view('pages.manager.transaction.transmittal-details');   
})->middleware('employeeAuth');

//MANAGER End Point//

//////GENERATE PDF 
//samplelang Route::get('htmltopdfview',array('as'=>'htmltopdfview','uses'=>'ProductController@htmltopdfview'));
Route::get('/pdf/quotation-proposal', 'trans_quotationProposalController@generatePDF')->middleware('employeeAuth');
Route::get('/pdf/breakdown-payment', 'trans_breakdownOfPaymentController@generatePDF')->middleware('employeeAuth');
Route::get('/pdf/transmittal-form', 'trans_TransmittalFormController@generatePDF')->middleware('employeeAuth');

//ACKNOWLEDGEMENT RECEIPT
Route::get('/pdf/payment-receipt/{or_number}/{pinfo_ID}/{account_ID}/', 'AccStaffControllers\trans_paymentListController@generatePDF')->middleware('employeeAuth');

Route::get('/pdf/payment-receipt-comp/{or_number}/{comp_ID}/{account_ID}/', 'AccStaffControllers\trans_paymentListController@generatePDFcomp')->middleware('employeeAuth');

//BOP
Route::get('/pdf/breakdown-payment/{cv_ID}/{pinfo_ID}/{account_ID}/', 'AccStaffControllers\trans_listBreakdownController@generateBOP')->middleware('employeeAuth');

Route::get('/pdf/breakdown-payment-comp/{cv_ID}/{pinfo_ID}/{account_ID}/', 'AccStaffControllers\trans_listBreakdownController@generateBOPcomp')->middleware('employeeAuth');

//PR
Route::get('/pdf/policy-receipt-comp/{cv_ID}/{comp_ID}/{account_ID}/', 'AccStaffControllers\trans_ListPRController@generatePRcomp')->middleware('employeeAuth');

Route::get('/pdf/policy-receipt/{cv_ID}/{pinfo_ID}/{account_ID}/', 'AccStaffControllers\trans_ListPRController@generatePR')->middleware('employeeAuth');

//CV
Route::get('/pdf/check-voucher-comp/{cv_ID}/{comp_ID}/{account_ID}/', 'AccStaffControllers\trans_ListCVController@generateCVcomp')->middleware('employeeAuth');

Route::get('/pdf/check-voucher/{cv_ID}/{pinfo_ID}/{account_ID}/', 'AccStaffControllers\trans_ListCVController@generateCV')->middleware('employeeAuth');

//transmit claim to inscomp
Route::get('/pdf/transmittal-form/{transmitClaim_ID}', 'ManagerControllers\transmittalListController@generateForm')->middleware('employeeAuth');

//transmit to claim
Route::get('/pdf/transmittal-form-pdf/{req_ID}', 'AdminControllers\trans_transmittedController@generateForm')->middleware('employeeAuth');

//insurance forms
Route::get('/pdf/insurance/form/fpg/', 'AdminControllers\trans_insIndividualController@generateFormFPG')->middleware('employeeAuth');

Route::get('/pdf/insurance/form/commonwealth/', 'AdminControllers\trans_insIndividualController@generateFormCommonwealth')->middleware('employeeAuth');

Route::get('/pdf/insurance/form/standard/', 'AdminControllers\trans_insIndividualController@generateFormStandard')->middleware('employeeAuth');

Route::get('/pdf/insurance/form/pgi/', 'AdminControllers\trans_insIndividualController@generateFormPGI')->middleware('employeeAuth');

//REPORTS
Route::get('/pdf/reports/sales/by/payment', 'AdminControllers\reports_SalesByPaymentController@generateForm')->middleware('employeeAuth');
Route::get('/pdf/reports/sales/by/count', 'AdminControllers\reports_SalesByNumberOfPaymentsController@generateForm')->middleware('employeeAuth');


//////////////WEB PAGE///////////////////

/////////////NOT SIGNED IN
//HOME
Route::get('/home', function (){
   return view('pages.webpage.not-signed-in.home');
});
Route::get('/home/1', function (){
   return view('pages.webpage.not-signed-in.index');
});

//QUOTATION
Route::get('/quotation', function (){
   return view('pages.webpage.not-signed-in.quotation');
});

//CLAIMS
Route::get('/claims/sign-in', 'WebControllers\notSignedIn_claimsController@index');
Route::post('/claims/sign-in/send', 'WebControllers\notSignedIn_claimsController@new_claim');

//CLAIMS
Route::get('/claim/requirements', function (){
   return view('pages.webpage.not-signed-in.claim-requirements');
});

//MONITOR PAYMENT
Route::get('/payment/sign-in', function (){
   return view('pages.webpage.not-signed-in.monitor-payment-sign-in');
});

//MONITOR transmittal
Route::get('/transmittal/sign-in', function (){
   return view('pages.webpage.not-signed-in.transmittal-signin');
});

//MONITOR complaint
Route::get('/complaint/sign-in', function (){
   return view('pages.webpage.not-signed-in.complaint-signin');
});
//////////////////////NOT SIGNED IN


///////////////////////////SIGNED IN
//HOME
Route::get('/user/logout', 'WebControllers\clientAccessController@logout');

Route::get('/user/home', function (){return view('pages.webpage.sign-in.home');})->middleware('clientAuth');

//QUOTATION
Route::get('/user/quotation', 'WebControllers\onlineQuotationController@index')->middleware('clientAuth');

Route::post('/user/quotation/individual', 'WebControllers\onlineQuotationController@add_quote_indi')->middleware('clientAuth');

Route::post('/user/quotation/company', 'WebControllers\onlineQuotationController@add_quote_comp')->middleware('clientAuth');

//CLAIMS
Route::get('/user/claims', function (){
   return view('pages.webpage.sign-in.claims');
})->middleware('clientAuth');

//CLAIMS
Route::get('/user/claim/requirements', function (){
   return view('pages.webpage.sign-in.claim-requirements');
})->middleware('clientAuth');

//TRANSMITTAL
Route::get('/user/transmittal/', 'WebControllers\transmittalRequestController@index')->middleware('clientAuth');
Route::post('/user/transmittal/send', 'WebControllers\transmittalRequestController@send_request')->middleware('clientAuth');

//COMPLAINT
Route::get('/user/complaint', 'WebControllers\sendComplaintsController@index')->middleware('clientAuth');

Route::post('/user/complaint/send', 'WebControllers\sendComplaintsController@send')->middleware('clientAuth');

//PAYMENT
Route::get('/user/payment/', 'WebControllers\onlinePaymentController@index')->middleware('clientAuth');

//PAYMENT - new
Route::post('/user/payment/new', 'WebControllers\onlinePaymentController@pay')->middleware('clientAuth');

Route::post('/user/payment/new/send', 'WebControllers\onlinePaymentController@send_payment')->middleware('clientAuth');

//inbox
Route::get('/user/notifications', 'WebControllers\clientNotificationController@index')->middleware('clientAuth');

Route::post('/user/notifications/approve', 'WebControllers\clientNotificationController@approve_client')->middleware('clientAuth');

Route::post('/user/notifications/disapprove', 'WebControllers\clientNotificationController@disapprove_client')->middleware('clientAuth');
///////////////////////////////SIGNED IN

?>