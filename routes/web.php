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
});

//DASHBOARD
Route::get('/admin/dashboard', function (){
   return view('pages.admin.dashboard');
});

//DASHBOARD - Accounting Staff
Route::get('/accounting-staff/dashboard', function (){
   return view('pages.accounting-staff.cimis-accounting-staff');
});

//DASHBOARD - MANAGER
Route::get('/manager/dashboard', function (){
   return view('pages.manager.cimis-manager');
});

//Logins
//Route::get('/sign-in', 'SignInController@index');

//Route::post('/sign-in/login', 'SignInController@Signin');

//Route::get('/sign-up', 'SignUpController@index');

//Route::post('/sign-up/submit', 'SignUpController@create_account');

// Admin Routes Starting Point //
//MAINTENANCE

//mainte-bank
Route::get('/admin/maintenance/bank', 'AdminControllers\maint_bankController@index');

Route::post('/admin/maintenance/bank/submit', 'AdminControllers\maint_bankController@add_bank');

Route::post('/admin/maintenance/bank/update', 'AdminControllers\maint_bankController@update_bank');

Route::post('/admin/maintenance/bank/delete', 'AdminControllers\maint_bankController@delete_bank');

Route::post('/admin/maintenance/bank/ardelete', 'AdminControllers\maint_bankController@ardelete_bank');

//mainte-complaint-type
Route::get('/admin/maintenance/complaint', 'AdminControllers\maint_complaintTypeController@index');

Route::post('/admin/maintenance/complaint/submit', 'AdminControllers\maint_complaintTypeController@add_ctype');

Route::post('/admin/maintenance/complaint/update', 'AdminControllers\maint_complaintTypeController@update_ctype');

Route::post('/admin/maintenance/complaint/delete', 'AdminControllers\maint_complaintTypeController@delete_ctype');

Route::post('/admin/maintenance/complaint/ardelete', 'AdminControllers\maint_complaintTypeController@ardelete_ctype');

//mainte-courier
Route::get('/admin/maintenance/courier', 'AdminControllers\maint_courierController@index');

Route::post('/admin/maintenance/courier/submit', 'AdminControllers\maint_courierController@add_courier');

Route::post('/admin/maintenance/courier/update', 'AdminControllers\maint_courierController@update_courier');

Route::post('/admin/maintenance/courier/delete', 'AdminControllers\maint_courierController@delete_courier');

Route::post('/admin/maintenance/courier/ardelete', 'AdminControllers\maint_courierController@ardelete_courier');

//mainte-employee
Route::get('/admin/maintenance/employee', 'AdminControllers\maint_employeeController@index');

Route::post('/admin/maintenance/employee/submit', 'AdminControllers\maint_employeeController@add_employee');

Route::post('/admin/maintenance/employee/update', 'AdminControllers\maint_employeeController@update_employee');

Route::post('/admin/maintenance/employee/delete', 'AdminControllers\maint_employeeController@delete_employee');

Route::post('/admin/maintenance/employee/ardelete', 'AdminControllers\maint_employeeController@ardelete_employee');

//mainte-employee-role
Route::get('/admin/maintenance/employee/role', 'AdminControllers\maint_employeeRoleController@index');

Route::post('/admin/maintenance/employee/role/submit', 'AdminControllers\maint_employeeRoleController@add_emp_role');

Route::post('/admin/maintenance/employee/role/update', 'AdminControllers\maint_employeeRoleController@update_emp_role');

Route::post('/admin/maintenance/employee/role/delete', 'AdminControllers\maint_employeeRoleController@delete_emp_role');

Route::post('/admin/maintenance/employee/role/ardelete', 'AdminControllers\maint_employeeRoleController@ardelete_emp_role');

//mainte-inst-type
Route::get('/admin/maintenance/installment', 'AdminControllers\maint_installmentTypeController@index');

Route::post('/admin/maintenance/installment/submit', 'AdminControllers\maint_installmentTypeController@add_installment');

Route::post('/admin/maintenance/installment/update', 'AdminControllers\maint_installmentTypeController@update_installment');

Route::post('/admin/maintenance/installment/delete', 'AdminControllers\maint_installmentTypeController@delete_installment');

Route::post('/admin/maintenance/installment/ardelete', 'AdminControllers\maint_installmentTypeController@ardelete_installment');

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
Route::get('/admin/maintenance/salesagent', 'AdminControllers\maint_salesAgentController@index');

Route::post('/admin/maintenance/salesagent/submit', 'AdminControllers\maint_salesAgentController@add_agent');

Route::post('/admin/maintenance/salesagent/update', 'AdminControllers\maint_salesAgentController@update_agent');

Route::post('/admin/maintenance/salesagent/delete', 'AdminControllers\maint_salesAgentController@delete_agent');

Route::post('/admin/maintenance/salesagent/ardelete', 'AdminControllers\maint_salesAgentController@ardelete_agent');

//mainte-vehiclemake
Route::get('/admin/maintenance/vehicle/make', 'AdminControllers\maint_vMakeController@index');

Route::post('/admin/maintenance/vehicle/make/submit', 'AdminControllers\maint_vMakeController@add_vMake');

Route::post('/admin/maintenance/vehicle/make/update', 'AdminControllers\maint_vMakeController@update_vMake');

Route::post('/admin/maintenance/vehicle/make/delete', 'AdminControllers\maint_vMakeController@delete_vMake');

Route::post('/admin/maintenance/vehicle/make/ardelete', 'AdminControllers\maint_vMakeController@ardelete_vMake');

//mainte-vehicletype
Route::get('/admin/maintenance/vehicle/type', 'AdminControllers\maint_vTypeController@index');

Route::post('/admin/maintenance/vehicle/type/submit', 'AdminControllers\maint_vTypeController@add_vType');

Route::post('/admin/maintenance/vehicle/type/update', 'AdminControllers\maint_vTypeController@update_vType');

Route::post('/admin/maintenance/vehicle/type/delete', 'AdminControllers\maint_vTypeController@delete_vType');

Route::post('/admin/maintenance/vehicle/type/ardelete', 'AdminControllers\maint_vTypeController@ardelete_vType');

//mainte-vehiclemodel
Route::get('/admin/maintenance/vehicle/model', 'AdminControllers\maint_vModelController@index');

Route::post('/admin/maintenance/vehicle/model/submit', 'AdminControllers\maint_vModelController@add_vModel');

Route::post('/admin/maintenance/vehicle/model/update', 'AdminControllers\maint_vModelController@update_vModel');

Route::post('/admin/maintenance/vehicle/model/delete', 'AdminControllers\maint_vModelController@delete_vModel');

Route::post('/admin/maintenance/vehicle/model/ardelete', 'AdminControllers\maint_vModelController@ardelete_vModel');

//mainte-vehiclelist
Route::get('/admin/maintenance/vehicle/list', 'AdminControllers\maint_vListController@index');

Route::post('/admin/maintenance/vehicle/list/submit', 'AdminControllers\maint_vListController@add_vList');

Route::post('/admin/maintenance/vehicle/list/update', 'AdminControllers\maint_vListController@update_vList');

Route::post('/admin/maintenance/vehicle/list/delete', 'AdminControllers\maint_vListController@delete_vList');

Route::post('/admin/maintenance/vehicle/list/ardelete', 'AdminControllers\maint_vListController@ardelete_vList');

//mainte-client-ind
Route::get('/admin/maintenance/client/individual', 'AdminControllers\maint_ClientIndividualController@index');

Route::post('/admin/maintenance/client/individual/submit', 'AdminControllers\maint_ClientIndividualController@add_client');

Route::post('/admin/maintenance/client/individual/update', 'AdminControllers\maint_ClientIndividualController@update_client');

Route::post('/admin/maintenance/client/individual/delete', 'AdminControllers\maint_ClientIndividualController@delete_client');

Route::post('/admin/maintenance/client/individual/ardelete', 'AdminControllers\maint_ClientIndividualController@ardelete_client');

//mainte-client-company
Route::get('/admin/maintenance/client/company', 'AdminControllers\maint_ClientCompanyController@index');

Route::post('/admin/maintenance/client/company/submit', 'AdminControllers\maint_ClientCompanyController@add_client_comp');

Route::post('/admin/maintenance/client/company/update', 'AdminControllers\maint_ClientCompanyController@update_client_comp');

Route::post('/admin/maintenance/client/company/delete', 'AdminControllers\maint_ClientCompanyController@delete_client_comp');

Route::post('/admin/maintenance/client/company/ardelete', 'AdminControllers\maint_ClientCompanyController@ardelete_client_comp');

//mainte-auto-pa-premium
Route::get('/admin/maintenance/personal-accident', 'AdminControllers\maint_pAutoController@index');

Route::post('/admin/maintenance/personal-accident/submit', 'AdminControllers\maint_pAutoController@add_premiumPA');

Route::post('/admin/maintenance/personal-accident/update', 'AdminControllers\maint_pAutoController@update_premiumPA');

Route::post('/admin/maintenance/personal-accident/delete', 'AdminControllers\maint_pAutoController@delete_premiumPA');

Route::post('/admin/maintenance/personal-accident/ardelete', 'AdminControllers\maint_pAutoController@ardelete_premiumPA');

//mainte-bodily-injury-premium
Route::get('/admin/maintenance/bodily-injury', 'AdminControllers\maint_pBodilyInjuryController@index');

Route::post('/admin/maintenance/bodily-injury/submit', 'AdminControllers\maint_pBodilyInjuryController@add_premiumDG');

Route::post('/admin/maintenance/bodily-injury/update', 'AdminControllers\maint_pBodilyInjuryController@update_premiumDG');

Route::post('/admin/maintenance/bodily-injury/delete', 'AdminControllers\maint_pBodilyInjuryController@delete_premiumdG');

Route::post('/admin/maintenance/bodily-injury/ardelete', 'AdminControllers\maint_pBodilyInjuryController@ardelete_premiumDG');

//mainte-property-damage-premium
Route::get('/admin/maintenance/property-damage', 'AdminControllers\maint_pPropertyDamageController@index');

Route::post('/admin/maintenance/property-damage/submit', 'AdminControllers\maint_pPropertyDamageController@add_premiumDG');

Route::post('/admin/maintenance/property-damage/update', 'AdminControllers\maint_pPropertyDamageController@update_premiumDG');

Route::post('/admin/maintenance/property-damage/delete', 'AdminControllers\maint_pPropertyDamageController@delete_premiumdG');

Route::post('/admin/maintenance/property-damage/ardelete', 'AdminControllers\maint_pPropertyDamageController@ardelete_premiumDG');

//MAINTE - ClaimType
Route::get('/admin/maintenance/claim-type', 'AdminControllers\maint_claimTypeController@index');

Route::post('/admin/maintenance/claim-type/submit', 'AdminControllers\maint_claimTypeController@add_claim_type');

Route::post('/admin/maintenance/claim-type/update', 'AdminControllers\maint_claimTypeController@update_claim_type');

Route::post('/admin/maintenance/claim-type/delete', 'AdminControllers\maint_claimTypeController@delete_claim_type');

Route::post('/admin/maintenance/claim-type/ardelete', 'AdminControllers\maint_claimTypeController@ardelete_claim_type');

//MAINTE - ClaimRequirement
Route::get('/admin/maintenance/claim-requirement', 'AdminControllers\maint_claimRequirementsController@index');

Route::post('/admin/maintenance/claim-requirement/submit', 'AdminControllers\maint_claimRequirementsController@add_claim_requirements');

Route::post('/admin/maintenance/claim-requirement/update', 'AdminControllers\maint_claimRequirementsController@update_claim_requirements');

Route::post('/admin/maintenance/claim-requirement/delete', 'AdminControllers\maint_claimRequirementsController@delete_claim_requirements');

Route::post('/admin/maintenance/claim-requirement/ardelete', 'AdminControllers\maint_claimRequirementsController@ardelete_claim_requirements');

//MAINTE - Transmittal
Route::get('/admin/maintenance/transmittal', 'AdminControllers\maint_transmittalController@index');

Route::post('/admin/maintenance/transmittal/submit', 'AdminControllers\maint_transmittalController@add_transmittal_record');

Route::post('/admin/maintenance/transmittal/update', 'AdminControllers\maint_transmittalController@update_transmittal_record');

Route::post('/admin/maintenance/transmittal/delete', 'AdminControllers\maint_transmittalController@delete_transmittal_record');

Route::post('/admin/maintenance/transmittal/ardelete', 'AdminControllers\maint_transmittalController@ardelete_transmittal_record');

//TRANSACTION
//Insurance - individual
Route::get('/admin/transaction/insurance-individual', 'AdminControllers\trans_insIndividualController@index');

Route::post('/admin/transaction/insurance-details-individual', 'AdminControllers\trans_insIndividualController@display_info');

//Insurance - company
Route::get('/admin/transaction/insurance-company', 'AdminControllers\trans_insCompanyController@index');

Route::post('/admin/transaction/insurance-details-company', 'AdminControllers\trans_insCompanyController@display_info');


//Insurance - Expiring Accounts - Company
Route::get('/admin/transaction/insurance-expiring-accounts-company', 'AdminControllers\trans_expireAccountController@list_comp');
Route::post('/admin/transaction/insurance-details-company-expiring', 'AdminControllers\trans_expireAccountController@display_info_comp');

//Insurance - Expiring Accounts - Individual
Route::get('/admin/transaction/insurance-expiring-accounts-individual', 'AdminControllers\trans_expireAccountController@list_ind');
Route::post('/admin/transaction/insurance-details-individual-expiring', 'AdminControllers\trans_expireAccountController@display_info');


//Insurance - Sent notifications - Company
Route::get('/admin/transaction/insurance-notification-list-company', function (){
   return view('pages.admin.transaction.insurance-notification-list-company');
});

//Insurance - Sent notifications - Individual
Route::get('/admin/transaction/insurance-notification-list-individual', function (){
   return view('pages.admin.transaction.insurance-notification-list-individual');
});

//Insurance - Settings - Individual
Route::get('/admin/transaction/insurance-settings-individual', function (){
   return view('pages.admin.transaction.insurance-settings-individual');
});

//Insurance - Settings - Individual
Route::get('/admin/transaction/insurance-settings-company', function (){
   return view('pages.admin.transaction.insurance-settings-company');
});

//Claims - walkin
Route::get('/admin/transaction/claim-request-walkin', 'AdminControllers\trans_claimsController@claims_list');
Route::post('/admin/transaction/claim-request-walkin/forward-manager', 'AdminControllers\trans_claimsController@forward_manager');

//Claims - online
Route::get('/admin/transaction/claim-request-online', function (){
   return view('pages.admin.transaction.claim-request-online');
});

//Claims - CREATE REQ walkin
Route::get('/admin/transaction/claim-create-request-walkin', 'AdminControllers\trans_claimsController@index');
Route::post('/admin/transaction/claim-create-request-walkin/submit', 'AdminControllers\trans_claimsController@new_claim');

//Claims details walkin
Route::get('/admin/transaction/claim-details-walkin', 'AdminControllers\trans_claimsController@view_claim_details');
Route::post('/admin/transaction/claim-details-walkin/submit', 'AdminControllers\trans_claimsController@update_claim_details');

//Claims details online
Route::get('/admin/transaction/claim-details-online', function (){
   return view('pages.admin.transaction.claim-details-online');
});


//Complaint - online
Route::get('/admin/transaction/complaint-online', function (){
   return view('pages.admin.transaction.complaint-online');
});

//Complaint - new
Route::get('/admin/transaction/complaint-new', 'AdminControllers\trans_complaintActionController@view_complaint_new');

Route::post('/admin/transaction/complaint-new/action', 'AdminControllers\trans_complaintActionController@act_complaint');

//Complaint - ended
Route::get('/admin/transaction/complaint-ended', 'AdminControllers\trans_complaintEndController@index');

//Complaint-pending
Route::get('/admin/transaction/complaint-pending', 'AdminControllers\trans_complaintPendingController@index');

Route::post('/admin/transaction/complaint-pending/update', 'AdminControllers\trans_complaintPendingController@act_complaint');

Route::post('/admin/transaction/complaint-pending/view', 'AdminControllers\trans_complaintPendingController@view');

//Complaint-list
Route::get('/admin/transaction/complaint-list', 'AdminControllers\trans_complaintListController@index');

Route::post('/admin/transaction/complaint-list/update', 'AdminControllers\trans_complaintListController@update_complaint');

Route::get('/admin/transaction/complaint-list/view', 'AdminControllers\trans_complaintListController@view');

//Complaint-info
Route::get('/admin/transaction/complaint-details', function (){
   return view('pages.admin.transaction.complaint-details');
});

//Complaint-auto-reply
Route::get('/admin/transaction/complaint-auto-reply', function (){
   return view('pages.admin.transaction.complaint-auto-reply');
});

//Transmittal - home
Route::get('/admin/transaction/transmittal-home', function (){
   return view('pages.admin.transaction.transmittal-home');
});

//Transmittal
Route::get('/admin/transaction/transmittal', 'AdminControllers\trans_transmittedController@index');

Route::post('/admin/transaction/transmittal/update', 'AdminControllers\trans_transmittedController@update');

Route::get('/admin/transaction/transmittal/view', 'AdminControllers\trans_transmittedController@view');

//Transmittal - progress
Route::get('/admin/transaction/transmittal-progress', function (){
   return view('pages.admin.transaction.transmittal-progress');
});

//Transmittal - documents
Route::get('/admin/transaction/transmittal-documents', 'AdminControllers\trans_transmitDocumentController@index');

Route::post('/admin/transaction/transmittal-documents/transmit', 'AdminControllers\trans_transmitDocumentController@transmit');

Route::post('/admin/transaction/transmittal-documents/direct_transmit', 'AdminControllers\trans_transmitDocumentController@direct_transmit');

//Transmittal - request
Route::get('/admin/transaction/transmittal-request', 'AdminControllers\trans_transmittalRequestController@index');

Route::post('/admin/transaction/transmittal-request/approve', 'AdminControllers\trans_transmittalRequestController@approve');

Route::post('/admin/transaction/transmittal-request/disapprove', 'AdminControllers\trans_transmittalRequestController@disapprove');

Route::get('/admin/transaction/transmittal-request/view', 'AdminControllers\trans_transmittalRequestController@view');

Route::get('/admin/transaction/transmittal-request/transmit', 'AdminControllers\trans_transmittalRequestController@transmit');

//Transmittal - ended
Route::get('/admin/transaction/transmittal-ended', 'AdminControllers\trans_transmittalEndController@index');

//Transmittal - validate
Route::get('/admin/transaction/transmittal-info-request', function (){
   return view('pages.admin.transaction.transmittal-info-request');
});

//Transmittal - info
Route::get('/admin/transaction/transmittal-info-approved', function (){
   return view('pages.admin.transaction.transmittal-info-approved');
});

//Transmittal - auto-reply
Route::get('/admin/transaction/transmittal-auto-reply', function (){
   return view('pages.admin.transaction.transmittal-auto-reply');
});

//QUERIES
Route::get('/admin/queries/most-active-company-client', 'AdminControllers\z_Queries_activeCompanyClientController@index');

Route::get('/admin/queries/most-active-individual-client', 'AdminControllers\z_Queries_activeIndividualClientController@index');

Route::get('/admin/queries/complaint-insurance', 'AdminControllers\z_Queries_complaintInsuranceController@index');

Route::get('/admin/queries/complaint-type', 'AdminControllers\z_Queries_complaintTypeController@index');

Route::get('/admin/queries/top-company-client', 'AdminControllers\z_Queries_topCompanyClientController@index');

Route::get('/admin/queries/top-individual-client', 'AdminControllers\z_Queries_topIndividualClientController@index');

Route::get('/admin/queries/top-insurance-company', 'AdminControllers\z_Queries_topInsuranceCompanyController@index');

Route::get('/admin/queries/top-insured-vehicle', 'AdminControllers\z_Queries_topInsuredVehicleController@index');

Route::get('/admin/queries/top-sales-agent', 'AdminControllers\z_Queries_topmaint_salesAgentController@index');

//REPORTS
//Tally
Route::get('/admin/reports/tally', function (){
   return view('pages.admin.reports.tally');
});

//Tally
Route::get('/admin/reports/tally-info', function (){
   return view('pages.report.adm.tally-info');
});

Route::get('/admin/reports/sales/overall', 'AdminControllers\reports_SalesByPaymentController@index');

//UTILITIES
Route::get('/admin/utilities/archives', 'AdminControllers\z_Utilities_ArchivesController@index');

Route::post('/admin/utilities/archives/bank/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_bank');

Route::post('/admin/utilities/archives/bank/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_bank');

Route::post('/admin/utilities/archives/client/individual/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_client');

Route::post('/admin/utilities/archives/client/individual/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_client');

Route::post('/admin/utilities/archives/client/company/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_client_company');

Route::post('/admin/utilities/archives/client/company/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_client_company');

Route::post('/admin/utilities/archives/employee/role/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_employee_role');

Route::post('/admin/utilities/archives/employee/role/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_employee_role');

Route::post('/admin/utilities/archives/employee/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_employee');

Route::post('/admin/utilities/archives/employee/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_employee');

Route::post('/admin/utilities/archives/salesagent/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_agent');

Route::post('/admin/utilities/archives/salesagent/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_agent');

Route::post('/admin/utilities/archives/courier/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_courier');

Route::post('/admin/utilities/archives/courier/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_courier');

Route::post('/admin/utilities/archives/vehicle/type/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_vehicle_type');

Route::post('/admin/utilities/archives/vehicle/type/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_vehicle_type');

Route::post('/admin/utilities/archives/vehicle/make/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_vehicle_make');

Route::post('/admin/utilities/archives/vehicle/make/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_vehicle_make');

Route::post('/admin/utilities/archives/vehicle/model/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_vehicle_model');

Route::post('/admin/utilities/archives/vehicle/model/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_vehicle_model');

Route::post('/admin/utilities/archives/policynumber/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_policynumber');

Route::post('/admin/utilities/archives/policynumber/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_policynumber');

Route::post('/admin/utilities/archives/installment/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_installment');

Route::post('/admin/utilities/archives/installment/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_installment');

Route::post('/admin/utilities/archives/complaint/type/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_complaint_type');

Route::post('/admin/utilities/archives/complaint/type/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_complaint_type');

Route::post('/admin/utilities/archives/personal-accident/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_personal_accident');

Route::post('/admin/utilities/archives/personal-accident/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_personal_accident');

Route::post('/admin/utilities/archives/premium-damage/reactivate', 'AdminControllers\z_Utilities_ArchivesController@reactivate_premium_damage');

Route::post('/admin/utilities/archives/premium-damage/arreactivate', 'AdminControllers\z_Utilities_ArchivesController@arreactivate_premium_damage');


//utilities-insurance-comp
Route::get('/admin/utilities/insurance/company', 'AdminControllers\maint_insuranceCompanyController@index');

Route::post('/admin/utilities/insurance/company/submit', 'AdminControllers\maint_insuranceCompanyController@add_inscomp');

Route::post('/admin/utilities/insurance/company/update', 'AdminControllers\maint_insuranceCompanyController@update_inscomp');

Route::post('/admin/utilities/insurance/company/delete', 'AdminControllers\maint_insuranceCompanyController@delete_inscomp');

Route::post('/admin/utilities/insurance/company/ardelete', 'AdminControllers\maint_insuranceCompanyController@ardelete_inscomp');

//utilities-policynum
Route::get('/admin/utilities/policyno', 'AdminControllers\maint_policyNumberController@index');

Route::post('/admin/utilities/policyno/submit', 'AdminControllers\maint_policyNumberController@add_policy');

Route::post('/admin/utilities/policyno/update', 'AdminControllers\maint_policyNumberController@update_policy');

Route::post('/admin/utilities/policyno/delete', 'AdminControllers\maint_policyNumberController@delete_policy');

Route::post('/admin/utilities/policyno/ardelete', 'AdminControllers\maint_policyNumberController@ardelete_policy');

//Admin Routes End Point//

//Accounting Staff Routes Start Point//

//Dashboard
Route::get('/accounting-staff/dashboard', function (){
   return view('pages.accounting-staff.cimis-accounting-staff');
});

//TRANSACTIONS/////////////////////////////////////////
//trans-client-ind
Route::get('/accounting-staff/transaction/client/individual', 'AccStaffControllers\trans_ClientIndividualController@index');

Route::post('/accounting-staff/transaction/client/individual/submit', 'AccStaffControllers\trans_ClientIndividualController@add_client');

Route::post('/accounting-staff/transaction/client/individual/update', 'AccStaffControllers\trans_ClientIndividualController@update_client');

Route::post('/accounting-staff/transaction/client/individual/delete', 'AccStaffControllers\trans_ClientIndividualController@delete_client');

Route::post('/accounting-staff/transaction/client/individual/ardelete', 'AccStaffControllers\trans_ClientIndividualController@ardelete_client');

//trans-client-company
Route::get('/accounting-staff/transaction/client/company', 'AccStaffControllers\trans_ClientCompanyController@index');

Route::post('/accounting-staff/transaction/client/company/submit', 'AccStaffControllers\trans_ClientCompanyController@add_client_comp');

Route::post('/accounting-staff/transaction/client/company/update', 'AccStaffControllers\trans_ClientCompanyController@update_client_comp');

Route::post('/accounting-staff/transaction/client/company/delete', 'AccStaffControllers\trans_ClientCompanyController@delete_client_comp');

Route::post('/accounting-staff/transaction/client/company/ardelete', 'AccStaffControllers\trans_ClientCompanyController@ardelete_client_comp');

//Insure Client
Route::get('/accounting-staff/transaction/insure-client', 'AccStaffControllers\trans_insureClientsController@index');

Route::post('/accounting-staff/transaction/insure-client/proceed', 'AccStaffControllers\trans_insureClientsController@send_data_individual');

Route::post('/accounting-staff/transaction/insure-client/submit', 'AccStaffControllers\trans_insureClientsController@save_insurance_account');

//Insurance - individual
Route::get('/accounting-staff/transaction/insurance-individual', 'AccStaffControllers\trans_insIndividualController@index');

Route::post('/accounting-staff/transaction/insurance-details-individual', 'AccStaffControllers\trans_insIndividualController@display_info');

//Insurance - company
Route::get('/accounting-staff/transaction/insurance-company', 'AccStaffControllers\trans_insCompanyController@index');

Route::post('/accounting-staff/transaction/insurance-details-company', 'AccStaffControllers\trans_insCompanyController@display_info');

//Insurance - Expiring Accounts - Company
Route::get('/accounting-staff/transaction/insurance-expiring-accounts-company', function (){
   return view('pages.accounting-staff.transaction.insurance-expiring-accounts-company');
});

//Insurance - Expiring Accounts - Individual
Route::get('/accounting-staff/transaction/insurance-expiring-accounts-individual', function (){
   return view('pages.accounting-staff.transaction.insurance-expiring-accounts-individual');
});

//Insurance - RENEW individual
Route::get('/accounting-staff/transaction/insurance-renew-individual', function (){
   return view('pages.accounting-staff.transaction.insurance-renew-individual');
});

//Insurance - RENEW company
Route::get('/accounting-staff/transaction/insurance-renew-company', function (){
   return view('pages.accounting-staff.transaction.insurance-renew-company');
});

//Quotation Walkin Request
Route::get('/accounting-staff/transaction/quotation-walkin', 'AccStaffControllers\trans_quoteWalkinController@index');

Route::post('/accounting-staff/transaction/quotation-walkin/individual', 'AccStaffControllers\trans_quoteWalkinController@add_quote_indi');

Route::post('/accounting-staff/transaction/quotation-walkin/company', 'AccStaffControllers\trans_quoteWalkinController@add_quote_comp');

//Quotation LIST
Route::get('/accounting-staff/transaction/quotation-list', 'AccStaffControllers\trans_quotationListController@index');

Route::get('/accounting-staff/transaction/quotation-individual-details', 'AccStaffControllers\trans_quotationListController@view_indi_details');

Route::get('/accounting-staff/transaction/quotation-company-details', 'AccStaffControllers\trans_quotationListController@view_comp_details');

Route::post('/accounting-staff/transaction/quotation-list/forward-manager', 'AccStaffControllers\trans_quotationListController@forward_manager');

Route::post('/accounting-staff/transaction/quotation-list/forward-client', 'AccStaffControllers\trans_quotationListController@forward_client');

Route::post('/accounting-staff/transaction/quotation-list/insure-client', 'AccStaffControllers\trans_quotationListController@insure_client');

Route::post('/accounting-staff/transaction/quotation-list/proceed', 'AccStaffControllers\trans_quoteInsureController@send_data_individual');

Route::post('/accounting-staff/transaction/quotation-list/submit', 'AccStaffControllers\trans_quoteInsureController@save_insurance_account');

//Quotation ONLINE AUTO REPLY
Route::get('/accounting-staff/transaction/quotation-online-auto-reply', function (){
   return view('pages.accounting-staff.transaction.quotation-online-auto-reply');
});


//PAYMENT
Route::get('/accounting-staff/transaction/payment', 'AccStaffControllers\trans_listBreakdownController@index');

//PAYMENT request
Route::get('/accounting-staff/transaction/payment-request-details', function (){
   return view('pages.accounting-staff.transaction.payment-request-details');
});

//PAYMENT-VIEW online
Route::get('/accounting-staff/transaction/payment-view', function (){
   return view('pages.accounting-staff.transaction.payment-view');
});

//PAYMENT-ONLINE
Route::get('/accounting-staff/transaction/payment-online', function (){
   return view('pages.accounting-staff.transaction.payment-online');
});

//PAYMENT-ONLINE auto reply
Route::get('/accounting-staff/transaction/payment-online-auto-reply', function (){
   return view('pages.accounting-staff.transaction.payment-online-auto-reply');
});

//PAYMENT-new
Route::get('/accounting-staff/transaction/payment-new', 'AccStaffControllers\trans_paymentController@index');

Route::post('/accounting-staff/transaction/payment-new/submit', 'AccStaffControllers\trans_paymentController@payment');

//PAYMENT-list
Route::get('/accounting-staff/transaction/payment-list', 'AccStaffControllers\trans_paymentListController@index');

//Payment Details
Route::get('/accounting-staff/transaction/payment-details', function (){
   return view('pages.accounting-staff.transaction.payment-details');
});

//LEDGER
Route::get('/accounting-staff/transaction/ledger', 'AccStaffControllers\trans_ledgerController@index');
Route::get('/accounting-staff/transaction/ledger-entry', 'AccStaffControllers\trans_ledgerController@index1');
Route::post('/accounting-staff/transaction/ledger-entry/submit', 'AccStaffControllers\trans_ledgerController@new_entry');

//LISTS - PR
Route::get('/accounting-staff/transaction/list-policy-receipt', 'AccStaffControllers\trans_listPRController@index');

//LISTS - CV
Route::get('/accounting-staff/transaction/list-check-voucher', 'AccStaffControllers\trans_listCVController@index');


//Accounting Staff End Point//
//MANAGER Start Point//
//quotation 
Route::get('/manager/transaction/quotation', 'ManagerControllers\indi_quotationApprovalController@quoteHome');

//quotation - individual
Route::get('/manager/transaction/quotation-individual', 'ManagerControllers\indi_quotationApprovalController@index');

Route::post('/manager/transaction/quotation-individual/approve', 'ManagerControllers\indi_quotationApprovalController@approve_quote');

Route::post('/manager/transaction/quotation-individual/disapprove', 'ManagerControllers\indi_quotationApprovalController@disapprove_quote');

//quotation - company
Route::get('/manager/transaction/quotation-company', 'ManagerControllers\comp_quotationApprovalController@index');

Route::post('/manager/transaction/quotation-company/approve', 'ManagerControllers\comp_quotationApprovalController@approve_quote');

Route::post('/manager/transaction/quotation-company/disapprove', 'ManagerControllers\comp_quotationApprovalController@disapprove_quote');

//payment
Route::get('/manager/transaction/payment', function (){
   return view('pages.manager.transaction.payment');   
});

//payment-home
Route::get('/manager/transaction/payment-home', function (){
   return view('pages.manager.transaction.payment-home');   
});

//payment-list
Route::get('/manager/transaction/payment-list', function (){
   return view('pages.manager.transaction.payment-list');   
});

//Claims - walkin
Route::get('/manager/transaction/claims', 'ManagerControllers\walkin_claimApprovalController@claims_list');
//Claims details walkin
Route::get('/manager/transaction/claim-details', 'ManagerControllers\walkin_claimApprovalController@view_claim_details');
//Claims - walkin
Route::post('/manager/transaction/claims/forward-insurance', 'ManagerControllers\walkin_claimApprovalController@forward_insurance');

Route::get('/manager/transaction/claim-transmit', 'ManagerControllers\walkin_claimApprovalController@transmit_docu');

Route::post('/manager/transaction/claim-transmit/submit', 'ManagerControllers\walkin_claimApprovalController@transmit_docu_save');


//claims-settings
Route::get('/manager/transaction/claims-settings', function (){
   return view('pages.manager.transaction.claims-settings');   
});

//transmittal
Route::get('/manager/transaction/transmittal', function (){
   return view('pages.manager.transaction.transmittal');   
});

//transmittal details
Route::get('/manager/transaction/transmittal-details', function (){
   return view('pages.manager.transaction.transmittal-details');   
});

//MANAGER End Point//

//////GENERATE PDF 
//samplelang Route::get('htmltopdfview',array('as'=>'htmltopdfview','uses'=>'ProductController@htmltopdfview'));
Route::get('/pdf/quotation-proposal', 'trans_quotationProposalController@generatePDF');
Route::get('/pdf/breakdown-payment', 'trans_breakdownOfPaymentController@generatePDF');
Route::get('/pdf/transmittal-form', 'trans_TransmittalFormController@generatePDF');

//ACKNOWLEDGEMENT RECEIPT
Route::get('/pdf/payment-receipt/{or_number}/{pinfo_ID}/{account_ID}/', 'AccStaffControllers\trans_paymentListController@generatePDF');

Route::get('/pdf/payment-receipt-comp/{or_number}/{comp_ID}/{account_ID}/', 'AccStaffControllers\trans_paymentListController@generatePDFcomp');

//BOP
Route::get('/pdf/breakdown-payment/{cv_ID}/{pinfo_ID}/{account_ID}/', 'AccStaffControllers\trans_listBreakdownController@generateBOP');

Route::get('/pdf/breakdown-payment-comp/{cv_ID}/{pinfo_ID}/{account_ID}/', 'AccStaffControllers\trans_listBreakdownController@generateBOPcomp');

//PR
Route::get('/pdf/policy-receipt-comp/{cv_ID}/{comp_ID}/{account_ID}/', 'AccStaffControllers\trans_ListPRController@generatePRcomp');

Route::get('/pdf/policy-receipt/{cv_ID}/{pinfo_ID}/{account_ID}/', 'AccStaffControllers\trans_ListPRController@generatePR');

//CV
Route::get('/pdf/check-voucher-comp/{cv_ID}/{comp_ID}/{account_ID}/', 'AccStaffControllers\trans_ListCVController@generateCVcomp');

Route::get('/pdf/check-voucher/{cv_ID}/{pinfo_ID}/{account_ID}/', 'AccStaffControllers\trans_ListCVController@generateCV');



Route::get('/pdf/insurance/form/fpg/', 'AdminControllers\trans_insIndividualController@generateFormFPG');

Route::get('/pdf/insurance/form/commonwealth/', 'AdminControllers\trans_insIndividualController@generateFormCommonwealth');

Route::get('/pdf/insurance/form/standard/', 'AdminControllers\trans_insIndividualController@generateFormStandard');

Route::get('/pdf/insurance/form/pgi/', 'AdminControllers\trans_insIndividualController@generateFormPGI');


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
Route::get('/claims/sign-in', function (){
   return view('pages.webpage.not-signed-in.claims');
});

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
Route::get('/user/quotation', function (){
   return view('pages.webpage.sign-in.quotation');
})->middleware('clientAuth');

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
Route::get('/user/payment/', function (){
   return view('pages.webpage.sign-in.payment');
})->middleware('clientAuth');

//PAYMENT - new
Route::get('/user/payment/new', function (){
   return view('pages.webpage.sign-in.payment-new');
})->middleware('clientAuth');

//inbox
Route::get('/user/notifications', 'WebControllers\clientNotificationController@index')->middleware('clientAuth');

Route::post('/user/notifications/approve', 'WebControllers\clientNotificationController@approve_client')->middleware('clientAuth');

Route::post('/user/notifications/disapprove', 'WebControllers\clientNotificationController@disapprove_client')->middleware('clientAuth');
///////////////////////////////SIGNED IN

?>