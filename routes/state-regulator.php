<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StateRegulatorDashboardController;

/*
|--------------------------------------------------------------------------
| State/Local Regulator Dashboard Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('dashboard/state-regulator')->name('dashboard.state-regulator.')->group(function () {
    
    // Main Dashboard
    Route::get('/', [StateRegulatorDashboardController::class, 'index'])->name('index');

    // GIS Site Mapping
    Route::get('/gis', [StateRegulatorDashboardController::class, 'gis'])->name('gis');
    
    // Billboard Site Management
    Route::get('/billboards', [StateRegulatorDashboardController::class, 'billboards'])->name('billboards');
    Route::get('/billboards/create', [StateRegulatorDashboardController::class, 'createBillboard'])->name('billboards.create');
    Route::post('/billboards/store', [StateRegulatorDashboardController::class, 'storeBillboard'])->name('billboards.store');
    Route::get('/billboards/{id}/edit', [StateRegulatorDashboardController::class, 'editBillboard'])->name('billboards.edit');
    Route::put('/billboards/{id}/update', [StateRegulatorDashboardController::class, 'updateBillboard'])->name('billboards.update');
    Route::delete('/billboards/{id}/delete', [StateRegulatorDashboardController::class, 'deleteBillboard'])->name('billboards.delete');
    
    // GPS Photo Verification
    Route::get('/billboards/{id}/verify', [StateRegulatorDashboardController::class, 'verifyBillboard'])->name('billboards.verify');
    Route::post('/billboards/{id}/verify-photo', [StateRegulatorDashboardController::class, 'verifyPhoto'])->name('billboards.verify-photo');
    Route::get('/verification-queue', [StateRegulatorDashboardController::class, 'verificationQueue'])->name('verification-queue');
    
    // Permit Management
    Route::get('/permits', [StateRegulatorDashboardController::class, 'permits'])->name('permits');
    Route::get('/permits/create', [StateRegulatorDashboardController::class, 'createPermit'])->name('permits.create');
    Route::post('/permits/store', [StateRegulatorDashboardController::class, 'storePermit'])->name('permits.store');
    Route::get('/permits/{id}/view', [StateRegulatorDashboardController::class, 'viewPermit'])->name('permits.view');
    Route::post('/permits/{id}/approve', [StateRegulatorDashboardController::class, 'approvePermit'])->name('permits.approve');
    Route::post('/permits/{id}/reject', [StateRegulatorDashboardController::class, 'rejectPermit'])->name('permits.reject');
    
    // Citizen Reports
    Route::get('/citizen-reports', [StateRegulatorDashboardController::class, 'citizenReports'])->name('citizen-reports');
    Route::get('/citizen-reports/{id}/view', [StateRegulatorDashboardController::class, 'viewCitizenReport'])->name('citizen-reports.view');
    Route::post('/citizen-reports/{id}/investigate', [StateRegulatorDashboardController::class, 'investigateReport'])->name('citizen-reports.investigate');
    Route::post('/citizen-reports/{id}/resolve', [StateRegulatorDashboardController::class, 'resolveReport'])->name('citizen-reports.resolve');
    
    // Enforcement Actions
    Route::get('/enforcement', [StateRegulatorDashboardController::class, 'enforcement'])->name('enforcement');
    Route::get('/enforcement/create', [StateRegulatorDashboardController::class, 'createEnforcement'])->name('enforcement.create');
    Route::post('/enforcement/store', [StateRegulatorDashboardController::class, 'storeEnforcement'])->name('enforcement.store');
    Route::get('/enforcement/{id}/track', [StateRegulatorDashboardController::class, 'trackEnforcement'])->name('enforcement.track');
    
    // Local Reports
    Route::get('/reports', [StateRegulatorDashboardController::class, 'reports'])->name('reports');
    Route::get('/reports/compliance', [StateRegulatorDashboardController::class, 'complianceReport'])->name('reports.compliance');
    Route::get('/reports/enforcement', [StateRegulatorDashboardController::class, 'enforcementReport'])->name('reports.enforcement');
    Route::get('/reports/citizen-reports', [StateRegulatorDashboardController::class, 'citizenReportsReport'])->name('reports.citizen-reports');
    
    // Content Display Approvals
    Route::get('/content-approvals', [StateRegulatorDashboardController::class, 'contentApprovals'])->name('content-approvals');

    // Revenue Dashboard
    Route::get('/revenue', [StateRegulatorDashboardController::class, 'revenue'])->name('revenue');

    // Public Interaction Portal
    Route::get('/public-portal', [StateRegulatorDashboardController::class, 'publicPortal'])->name('public-portal');

    // Data Sharing API
    Route::get('/data-api', [StateRegulatorDashboardController::class, 'dataApi'])->name('data-api');

    // Settings
    Route::get('/settings', [StateRegulatorDashboardController::class, 'settings'])->name('settings');
    Route::post('/settings/update', [StateRegulatorDashboardController::class, 'updateSettings'])->name('settings.update');
});
