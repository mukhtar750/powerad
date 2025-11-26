<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminBillboardController;
use App\Http\Controllers\AdminCalendarController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminPaymentController;
use App\Http\Controllers\LoapDashboardController;
use App\Http\Controllers\ProfileController;

// Old LOAP routes removed - now handled by LoapDashboardController

// Billboard Management Routes for LOAP (using existing BillboardController)
Route::middleware(['auth', 'role:loap'])->prefix('dashboard/loap')->name('loap.')->group(function () {
    Route::get('/billboards/create', [App\Http\Controllers\BillboardController::class, 'create'])->name('billboards.create');
    Route::post('/billboards', [App\Http\Controllers\BillboardController::class, 'store'])->name('billboards.store');
    Route::get('/billboards/{billboard}', [App\Http\Controllers\BillboardController::class, 'show'])->name('billboards.show');
    Route::get('/billboards/{billboard}/edit', [App\Http\Controllers\BillboardController::class, 'edit'])->name('billboards.edit');
    Route::put('/billboards/{billboard}', [App\Http\Controllers\BillboardController::class, 'update'])->name('billboards.update');
    Route::delete('/billboards/{billboard}', [App\Http\Controllers\BillboardController::class, 'destroy'])->name('billboards.destroy');
    Route::patch('/billboards/{billboard}/toggle-status', [App\Http\Controllers\BillboardController::class, 'toggleStatus'])->name('billboards.toggle-status');
});

Route::get('/dashboard/loap/reviews', function () {
    return view('dashboards.loap.loap-reviews');
})->middleware(['auth'])->name('dashboard.loap.reviews');

Route::get('/dashboard/loap/messages', function () {
    return view('dashboards.loap.loap-messages');
})->middleware(['auth'])->name('dashboard.loap.messages');

Route::get('/dashboard/loap/settings', function () {
    return view('dashboards.loap.loap-settings');
})->middleware(['auth'])->name('dashboard.loap.settings');

Route::get('/dashboard/advertiser', function () {
    return view('dashboards.advertiser.advertiser');
})->middleware(['auth'])->name('dashboard.advertiser');

// Advertiser Billboard Browsing Routes
Route::middleware(['auth'])->prefix('dashboard/advertiser')->name('advertiser.')->group(function () {
    Route::get('/discover', [App\Http\Controllers\AdvertiserBillboardController::class, 'index'])->name('discover');
    Route::get('/billboards/{billboard}', [App\Http\Controllers\AdvertiserBillboardController::class, 'show'])->name('billboard.show');
    Route::post('/billboards/{billboard}/check-availability', [App\Http\Controllers\AdvertiserBillboardController::class, 'checkAvailability'])->name('billboard.check-availability');
    Route::get('/my-bookings', [App\Http\Controllers\AdvertiserBillboardController::class, 'myBookings'])->name('my-bookings');
    Route::post('/bookings/{booking}/cancel', [App\Http\Controllers\AdvertiserBillboardController::class, 'cancelBooking'])->name('bookings.cancel');
    Route::get('/book/{billboard}', function ($billboard) {
        $b = \App\Models\Billboard::findOrFail($billboard);
        if (!$b->is_active || !$b->is_verified || $b->status !== 'available') {
            abort(404);
        }
        return view('payment.booking-form', ['billboard' => $b]);
    })->name('billboard.book');
});

Route::get('/dashboard/advertiser/my-campaigns', function () {
    return view('dashboards.advertiser.my-campaigns');
})->middleware(['auth'])->name('dashboard.advertiser.my-campaigns');

Route::get('/dashboard/advertiser/payments', function () {
    return view('dashboards.advertiser.payments');
})->middleware(['auth'])->name('dashboard.advertiser.payments');

Route::get('/dashboard/advertiser/analytics', function () {
    return view('dashboards.advertiser.analytics');
})->middleware(['auth'])->name('dashboard.advertiser.analytics');

Route::get('/dashboard/advertiser/messages', function () {
    return view('dashboards.advertiser.messages');
})->middleware(['auth'])->name('dashboard.advertiser.messages');

Route::get('/dashboard/advertiser/settings', function () {
    return view('dashboards.advertiser.settings');
})->middleware(['auth'])->name('dashboard.advertiser.settings');

Route::get('/dashboard/regulator', function () {
    return view('dashboards.regulator.regulator');
})->middleware(['auth'])->name('dashboard.regulator');

Route::get('/dashboard/serviceprovider', function () {
    return view('dashboards.serviceprovider.serviceprovider');
})->middleware(['auth'])->name('dashboard.serviceprovider');

Route::get('/dashboard/serviceprovider/my-services', function () {
    return view('dashboards.serviceprovider.my-services');
})->middleware(['auth'])->name('dashboard.serviceprovider.my-services');

Route::get('/dashboard/serviceprovider/jobs', function () {
    return view('dashboards.serviceprovider.jobs');
})->middleware(['auth'])->name('dashboard.serviceprovider.jobs');

Route::get('/dashboard/serviceprovider/clients', function () {
    return view('dashboards.serviceprovider.clients');
})->middleware(['auth'])->name('dashboard.serviceprovider.clients');

Route::get('/dashboard/serviceprovider/earnings', function () {
    return view('dashboards.serviceprovider.earnings');
})->middleware(['auth'])->name('dashboard.serviceprovider.earnings');

Route::get('/dashboard/serviceprovider/messages', function () {
    return view('dashboards.serviceprovider.messages');
})->middleware(['auth'])->name('dashboard.serviceprovider.messages');

Route::get('/dashboard/serviceprovider/settings', function () {
    return view('dashboards.serviceprovider.settings');
})->middleware(['auth'])->name('dashboard.serviceprovider.settings');

// Generic regulator routes removed; use ARCON (national) and State Regulator dashboards instead.

Route::get('/dashboard/admin', [App\Http\Controllers\AdminDashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard.admin');

// Admin - Users Management
Route::middleware(['auth'])->prefix('dashboard/admin')->name('dashboard.admin.')->group(function () {
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [AdminUserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/verify', [AdminUserController::class, 'verify'])->name('users.verify');
    Route::post('/users/{user}/unverify', [AdminUserController::class, 'unverify'])->name('users.unverify');

    // Admin billboard management
    Route::get('/billboards', [AdminBillboardController::class, 'index'])->name('billboards');
    Route::get('/billboards/create', [AdminBillboardController::class, 'create'])->name('billboards.create');
    Route::post('/billboards', [AdminBillboardController::class, 'store'])->name('billboards.store');
    Route::get('/billboards/{billboard}', [AdminBillboardController::class, 'show'])->name('billboards.show');
    Route::post('/billboards/{billboard}/verify', [AdminBillboardController::class, 'verify'])->name('billboards.verify');
    Route::post('/billboards/{billboard}/unverify', [AdminBillboardController::class, 'unverify'])->name('billboards.unverify');
    Route::post('/billboards/{billboard}/toggle-active', [AdminBillboardController::class, 'toggleActive'])->name('billboards.toggle-active');
    Route::post('/billboards/bulk-action', [AdminBillboardController::class, 'bulkAction'])->name('billboards.bulk-action');
    Route::get('/billboards-stats', [AdminBillboardController::class, 'getStats'])->name('billboards.stats');

    // Admin verification queue
    Route::get('/verifications', [AdminBillboardController::class, 'verifications'])->name('verifications');
    
    // Admin payments and earnings
    Route::get('/payments', [AdminPaymentController::class, 'index'])->name('payments');
    Route::get('/payments/dashboard', [App\Http\Controllers\PaymentReportController::class, 'dashboard'])->name('payments.dashboard');
    Route::get('/payments/reports', [App\Http\Controllers\PaymentReportController::class, 'reports'])->name('payments.reports');
    Route::get('/payments/analytics', [App\Http\Controllers\PaymentReportController::class, 'analytics'])->name('payments.analytics');
    Route::get('/payments/export', [App\Http\Controllers\PaymentReportController::class, 'export'])->name('payments.export');
    Route::get('/payments/stats', [PaymentController::class, 'getPaymentStats'])->name('payments.stats');
    Route::get('/payments/ledger', function () {
        $payments = \App\Models\Payment::with(['user', 'billboard', 'booking'])->orderByDesc('created_at')->paginate(20);
        return view('dashboards.admin.payments-ledger', compact('payments'));
    })->name('payments.ledger');
    Route::get('/loap-earnings', [AdminPaymentController::class, 'loapEarnings'])->name('loap-earnings');
    Route::post('/bookings/{booking}/mark-paid', [AdminPaymentController::class, 'markAsPaid'])->name('bookings.mark-paid');
    Route::post('/bookings/{booking}/mark-completed', [AdminPaymentController::class, 'markAsCompleted'])->name('bookings.mark-completed');
    
    Route::view('/reports', 'dashboards.admin.reports')->name('reports');
    Route::view('/settings', 'dashboards.admin.settings')->name('settings');

    // Admin bookings calendar
    Route::get('/calendar', [AdminCalendarController::class, 'index'])->name('calendar');
});

// LOAP Dashboard routes
Route::middleware(['auth', 'role:loap'])->prefix('dashboard/loap')->name('loap.')->group(function () {
    Route::get('/', [LoapDashboardController::class, 'index'])->name('dashboard');
    Route::get('/billboards', [LoapDashboardController::class, 'billboards'])->name('billboards');
    Route::get('/earnings', [LoapDashboardController::class, 'earnings'])->name('earnings');
    Route::get('/analytics', [LoapDashboardController::class, 'analytics'])->name('analytics');
    Route::get('/profile', [LoapDashboardController::class, 'profile'])->name('profile');
    Route::put('/profile', [LoapDashboardController::class, 'updateProfile'])->name('profile.update');

    // Bank details + Paystack helpers
    Route::get('/payment/banks', [PaymentController::class, 'fetchBanks'])->name('payment.banks');
    Route::post('/payment/bank-details', [PaymentController::class, 'addBankDetails'])->name('payment.bank-details.store');

    // LOAP payments ledger
    Route::get('/payments/ledger', function () {
        $payments = \App\Models\Payment::with(['user', 'billboard', 'booking'])
            ->whereHas('booking', function ($q) {
                $q->where('loap_id', auth()->id());
            })
            ->orderByDesc('created_at')
            ->paginate(20);
        return view('dashboards.loap.payments-ledger', compact('payments'));
    })->name('payments.ledger');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Payment routes
Route::middleware(['auth'])->group(function () {
    Route::post('/payment/initialize', [PaymentController::class, 'initializePayment'])->name('payment.initialize');
    // Alias to align with deliverables naming
    Route::post('/payment/initialize-transaction', [PaymentController::class, 'initializeTransaction'])->name('payment.initializeTransaction');
    Route::get('/payment/callback', [PaymentController::class, 'handleCallback'])->name('payment.callback');
    Route::get('/payment/verify/{reference}', [PaymentController::class, 'verifyPayment'])->name('payment.verify');
    Route::post('/payment/subaccount/create', [PaymentController::class, 'createSubaccount'])->name('payment.subaccount.create');
    Route::get('/payment/subaccount', [PaymentController::class, 'getSubaccount'])->name('payment.subaccount.get');
    Route::post('/payment/transfer', [PaymentController::class, 'initiateTransfer'])->name('payment.transfer');
    // Shared profile photo upload for all roles
    Route::get('/profile/photo', [ProfileController::class, 'photo'])->name('profile.photo');
    Route::post('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo.update');
});

// Webhook route (no auth middleware)
Route::post('/payment/webhook', [PaymentController::class, 'handleWebhook'])->name('payment.webhook');

// Notification routes
Route::middleware(['auth'])->group(function () {
    Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/unread-count', [App\Http\Controllers\NotificationController::class, 'unreadCount'])->name('notifications.unread-count');
    Route::get('/notifications/recent', [App\Http\Controllers\NotificationController::class, 'recent'])->name('notifications.recent');
    Route::post('/notifications/{notification}/read', [App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('notifications.mark-read');
    Route::post('/notifications/{notification}/unread', [App\Http\Controllers\NotificationController::class, 'markAsUnread'])->name('notifications.mark-unread');
    Route::post('/notifications/mark-all-read', [App\Http\Controllers\NotificationController::class, 'markAllAsRead'])->name('notifications.mark-all-read');
    Route::delete('/notifications/{notification}', [App\Http\Controllers\NotificationController::class, 'destroy'])->name('notifications.destroy');
});

// Include ARCON and State Regulator routes
require __DIR__.'/arcon.php';
require __DIR__.'/state-regulator.php';

// Citizen Report Form (Public)
Route::get('/citizen-report', function () {
    return view('citizen-report-form');
})->name('citizen-report');

Route::get('/', function () {
    return view('home-react');
});

// Preview the new React homepage without changing the default root yet
Route::get('/new-home', function () {
    return view('home-react');
});
