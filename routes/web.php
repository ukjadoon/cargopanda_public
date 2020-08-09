<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome')->name('home');

Route::get('login', 'AuthController@login')->name('login');
Route::post('login', 'AuthController@issueToken')->name('issue-token');
Route::get('logout', 'AuthController@logout')->name('logout');
Route::get('authenticate/{token}', 'AuthController@authenticate');

Route::get('login-token/{token}', 'AuthController@authenticate');
Route::prefix('transporter')->group(function () {
    Route::get('register-company', 'TransporterController@registerCompany');
    Route::post('register-company', 'TransporterController@postRegisterCompany')->name('register-company');
    Route::get('dashboard', 'TransporterController@dashboard')->name('transporter-dashboard');
    Route::get('checklist', 'TransporterController@checklist')->name('transporter-checklist');
    Route::get('trucks', 'TransporterController@trucks')->name('transporter-trucks');
    Route::get('organization', 'TransporterController@organization');
    Route::get('trucks/{slug}/documentation', 'TransporterController@truckDocumentation')->name('transporter-truck-documentation');
    Route::get('truck-documentation', 'TransporterController@truckDocumentationIndex')->name('transporter-truck-documentation-index');
    Route::get('organization/documentation', 'TransporterController@organizationDocumentation')->name('transporter-organization-documentation');
    Route::get('organization-doc/{id}', 'TransporterController@showOrganizationDoc');
});
Route::prefix('admin')->group(function () {
    Route::get('dashboard', 'AdminController@dashboard')->name('admin-dashboard');
    Route::get('checklist', 'AdminController@checklist')->name('admin-checklist');
    Route::get('truck-documentation', 'AdminController@truckDocumentation')->name('admin-truck-documentation');
    Route::get('organization-documentation', 'AdminController@organizationDocumentation')->name('admin-organization-documentation');
    Route::get('organization-doc/{documentId}/{organizationId}', 'AdminController@showOrganizationDoc')->name('admin-show-organization-doc');
    Route::get('organization-doc-source/{documentId}/{organizationId}', 'AdminController@showOrganizationDocSource')->name('admin-show-organization-doc-source');
    Route::get('logout', 'AdminController@logout')->name('admin-logout');
});
