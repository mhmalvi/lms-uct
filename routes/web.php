<?php

use App\Http\Controllers\CalendarEventsController;
use App\Http\Controllers\ClassroomMembersController;
use App\Http\Controllers\ClassroomsController;
use App\Http\Controllers\ClassroomPostsController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\EnrollmentsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
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

Route::view('/', 'index')->middleware('guest')->name('learnque');

Route::view('dashboard', 'pages.dashboard')->middleware('auth')->name('dashboard');
Route::view('ptr', 'pages.ptr-form');
Route::view('enrollment', 'pages.enrollment-form');
Route::get('payment/{uid}', [PaymentController::class, 'paymentPage']);
Route::post('make-paypal-payment', [PaymentController::class, 'makePayPalPayment']);
Route::post('make-bank-payment', [PaymentController::class, 'makeBankPayment']);
Route::get('success', [PaymentController::class, 'success'])->name('success');
// Route::view('courses', 'pages.courses')->middleware('auth');
// Route::view('my-courses', 'pages.my-courses')->middleware('auth');
// Route::view('my-paths', 'pages.my-paths')->middleware('auth');
// Route::view('path-details', 'pages.path-details')->middleware('auth');
// Route::view('course-preview', 'pages.course-preview')->middleware('auth');
// Route::view('lesson-preview', 'pages.lesson-preview')->middleware('auth');
// Route::view('take-lesson', 'pages.take-lesson')->middleware('auth');
// Route::view('take-quiz', 'pages.take-quiz')->middleware('auth');
// Route::view('quiz-results', 'pages.quiz-results')->middleware('auth');
// Route::view('quiz-results-details', 'pages.quiz-results-details')->middleware('auth');
// Route::view('path-assessment', 'pages.path-assessment')->middleware('auth');
// Route::view('path-assessment-result', 'pages.path-assessment-result')->middleware('auth');
// Route::view('paths', 'pages.paths')->middleware('auth');

Route::get('course/{course:uuid}', [CoursesController::class, 'show']);

require __DIR__ . '/auth.php';

Route::get('enrolment', [EnrollmentsController::class, 'index']);
Route::post('enrolment', [EnrollmentsController::class, 'store'])->name('enrollment.store');

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
});

Route::middleware('auth:web')->group(function () {
    Route::view('dashboard', 'pages.dashboard')->name('dashboard');

    Route::prefix('classroom')->name('classroom.')->group(function () {
        Route::get('/', [ClassroomsController::class, 'index'])->name('index');
        Route::get('{classroom:unique_id}/posts/list', [ClassroomPostsController::class, 'getPaginatedList']);
        Route::get('{classroom:unique_id}/teachers/list', [ClassroomPostsController::class, 'getTeacherList']);
        Route::get('list', [ClassroomsController::class, 'getPaginatedList']);

        Route::get('{classroom:unique_id}', [ClassroomsController::class, 'show']);
        /**
         * For the vue routes situated in ClassroomsController@show
         */
        Route::get('{classroom:unique_id}/posts', [ClassroomsController::class, 'show']);
        Route::get('{classroom:unique_id}/students', [ClassroomsController::class, 'show']);
        Route::get('{classroom:unique_id}/teachers', [ClassroomsController::class, 'show']);

        Route::get('{classroom:unique_id}/students', [ClassroomMembersController::class, 'getStudents']);
    });

    

    Route::get('calendar-events/list', [CalendarEventsController::class, 'getList']);
});


