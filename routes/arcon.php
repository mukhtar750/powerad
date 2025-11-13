<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArconDashboardController;

/*
|--------------------------------------------------------------------------
| ARCON (National Regulator) Dashboard Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('dashboard/arcon')->name('dashboard.arcon.')->group(function () {
    
    // Main Dashboard
    Route::get('/', [ArconDashboardController::class, 'index'])->name('index');

    // Practitioner Licensing & Verification
    Route::get('/practitioners', [ArconDashboardController::class, 'practitioners'])->name('practitioners');

    // Content Approval Management
    Route::get('/content-approvals', [ArconDashboardController::class, 'contentApprovals'])->name('content-approvals');
    
    // Campaign Assessment & Flagging
    Route::get('/campaigns', [ArconDashboardController::class, 'campaigns'])->name('campaigns');
    Route::get('/campaigns/{id}/assess', [ArconDashboardController::class, 'assessCampaign'])->name('campaigns.assess');
    Route::post('/campaigns/{id}/flag', [ArconDashboardController::class, 'flagCampaign'])->name('campaigns.flag');
    Route::post('/campaigns/{id}/approve', [ArconDashboardController::class, 'approveCampaign'])->name('campaigns.approve');
    
    // Multi-state Campaign Monitoring
    Route::get('/multistate-campaigns', [ArconDashboardController::class, 'multistateCampaigns'])->name('multistate-campaigns');
    Route::get('/multistate-campaigns/{id}/track', [ArconDashboardController::class, 'trackMultistateCampaign'])->name('multistate-campaigns.track');
    
    // Sanction Management
    Route::get('/sanctions', [ArconDashboardController::class, 'sanctions'])->name('sanctions');
    Route::post('/sanctions/{id}/issue', [ArconDashboardController::class, 'issueSanction'])->name('sanctions.issue');
    Route::get('/sanctions/tracking', [ArconDashboardController::class, 'sanctionTracking'])->name('sanctions.tracking');
    
    // Notifications & Alerts
    Route::get('/notifications', [ArconDashboardController::class, 'notifications'])->name('notifications');
    Route::post('/notifications/{id}/send', [ArconDashboardController::class, 'sendNotification'])->name('notifications.send');
    
    // National Reports
    Route::get('/reports', [ArconDashboardController::class, 'reports'])->name('reports');
    Route::get('/reports/national-compliance', [ArconDashboardController::class, 'nationalComplianceReport'])->name('reports.national-compliance');
    Route::get('/reports/campaign-analysis', [ArconDashboardController::class, 'campaignAnalysisReport'])->name('reports.campaign-analysis');

    // Research & Analytics
    Route::get('/analytics', [ArconDashboardController::class, 'analytics'])->name('analytics');

    // Training & CPD Management
    Route::get('/training', [ArconDashboardController::class, 'training'])->name('training');
    
    // Settings
    Route::get('/settings', [ArconDashboardController::class, 'settings'])->name('settings');
    Route::post('/settings/update', [ArconDashboardController::class, 'updateSettings'])->name('settings.update');
});
