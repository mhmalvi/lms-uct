<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClassroomsController;
use App\Http\Controllers\EnrollmentsController;
use App\Http\Controllers\PDFGenerateController;
use App\Http\Controllers\CalendarEventsController;
use App\Http\Controllers\ClassroomPostsController;
use App\Http\Controllers\ClassroomMembersController;
use App\Http\Controllers\Admin\EnrollmentFormController;

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

Route::view('/', 'index')->middleware('guest')->name('learnque');

Route::view('dashboard', 'pages.dashboard')->middleware('auth')->name('dashboard');
Route::get('payment/{uid}', [PaymentController::class, 'paymentPage']);
Route::post('make-paypal-payment', [PaymentController::class, 'makePayPalPayment']);
Route::post('make-bank-payment', [PaymentController::class, 'makeBankPayment']);
Route::get('success/{uid}', [PaymentController::class, 'success'])->name('success');

Route::get('course/{course:uuid}', [CoursesController::class, 'show']);
Route::get('enrolment', [EnrollmentsController::class, 'index'])->name('enrolment');
Route::post('enrolment', [EnrollmentsController::class, 'store'])->name('enrollment.store');
Route::get('generate-pdf/{form_id}', [PDFGenerateController::class, 'generatePDF'])->name('generate-pdf');
// Route::get('/downloadPDF/{id}','DisneyplusController@downloadPDF');



/**
 * For both admin and users
 */
Route::middleware(('auth:web,admin'))->group(function () {
    /**
     * User profile routes
     */
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::post('/', [ProfileController::class, 'update']);
        Route::put('avatar/update', [ProfileController::class, 'avatarUpdate']);
        Route::delete('avatar/delete', [ProfileController::class, 'avatarDelete']);
    });



    Route::get('calendar-events/list', [CalendarEventsController::class, 'getList']);
});


Route::middleware('auth:web')->group(function () {
    Route::view('dashboard', 'pages.dashboard')->name('dashboard');

    Route::prefix('classroom')->name('posts.')->group(function () {
        Route::get('/', [PostsController::class, 'index'])->name('index');
        Route::get('all', [PostsController::class, 'getList']);
        Route::get('{post}', [PostsController::class, 'show']);
    });
});

require __DIR__ . '/auth.php';
