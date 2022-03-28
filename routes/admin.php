<?php

use App\Http\Controllers\Admin\CalendarEventsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClassroomMembersController;
use App\Http\Controllers\Admin\ClassroomPostsController;
use App\Http\Controllers\Admin\ClassroomsController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EnrollUsersController;
use App\Http\Controllers\Admin\NewsNoticesController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\LiveClassesController;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\Admin\TeachersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
|
*/

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

/**
 * Classroom
 */
Route::view('classroom', 'admin.pages.classrooms.index')->name('classrooms');
Route::prefix('classrooms')->name('classroom.')->group(function () {
    Route::view('create', 'admin.pages.classrooms.create')->name('create');
    Route::post('/', [ClassroomsController::class, 'store']);
    Route::get('all', [ClassroomsController::class, 'getPaginatedList']);
    Route::post('members/add', [ClassroomMembersController::class, 'store']);

    Route::post('posts/publish', [ClassroomPostsController::class, 'store']);

    Route::get('{classroom:unique_id}', [ClassroomsController::class, 'show']);
    /**
     * For the vue routes situated in ClassroomsController@show
     */
    Route::get('{classroom:unique_id}/posts', [ClassroomsController::class, 'show']);
    Route::get('{classroom:unique_id}/students', [ClassroomsController::class, 'show']);
    Route::get('{classroom:unique_id}/teachers', [ClassroomsController::class, 'show']);

    Route::patch('{classroom:unique_id}/students/update', [ClassroomsController::class, 'updateStudents']);
    Route::patch('{classroom:unique_id}/teachers/update', [ClassroomsController::class, 'updateTeachers']);

    Route::delete('{classroom:unique_id}', [ClassroomsController::class, 'destroy']);
});

//Live Class
Route::prefix('liveclass')->name('liveclass.')->group(function () {
    Route::get('/', [LiveClassesController::class, 'index'])->name('index');
    Route::get('list', [LiveClassesController::class, 'paginatedList'])->name('list');
    Route::get('create', [LiveClassesController::class, 'create'])->name('create');
    Route::post('store', [LiveClassesController::class, 'store'])->name('store');
    Route::get('edit/{liveclass_id}', [LiveClassesController::class, 'edit'])->name('edit');
    Route::patch('update/{liveclass_id}', [LiveClassesController::class, 'update'])->name('update');
    Route::delete('delete/{liveclass_id}', [LiveClassesController::class, 'destroy'])->name('delete');
});

// Category routes
Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('list', [CategoryController::class, 'getPaginatedList'])->name('list');
    Route::get('all', [CategoryController::class, 'getRawList'])->name('all');
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::post('/', [CategoryController::class, 'store'])->name('store');
    Route::get('edit/{category:slug}', [CategoryController::class, 'edit'])->name('edit');
    Route::patch('edit/{category:slug}', [CategoryController::class, 'update']);
    Route::delete('{category:uuid}', [CategoryController::class, 'destroy']);
});

// Course routes
Route::prefix("courses")->name('courses.')->group(function () {
    Route::get('/', [CoursesController::class, 'index'])->name('index');
    Route::post('/', [CoursesController::class, 'store']);
    Route::get('all', [CoursesController::class, 'getPaginatedList']);
    Route::get('raw', [CoursesController::class, 'getRawList']);
    Route::get('create', [CoursesController::class, 'create'])->name('create');
    Route::get('edit/{course:code}', [CoursesController::class, 'edit']);
    Route::patch('edit/{course:uuid}', [CoursesController::class, 'update'])->name('edit');
    Route::delete('{course:uuid}', [CoursesController::class, 'destroy']);
});

// Enrol User routes
Route::prefix("enroll-users")->name('enroll_users.')->group(function () {
    Route::get('/', [EnrollUsersController::class, 'index'])->name('index');
    Route::post('/', [EnrollUsersController::class, 'store'])->name('store');
});

/**
 * Manage Students routes
 */
Route::prefix("students")->name('students.')->group(function () {
    Route::get('/', [StudentsController::class, 'index'])->name('index');
    Route::get('all', [StudentsController::class, 'getPaginatedList']);
    Route::get('raw', [StudentsController::class, 'getRawList']);
    Route::get('/edit/{student:name}', [StudentsController::class, 'edit']);
    Route::patch('{student:uuid}', [StudentsController::class, 'update']);
    Route::delete('{student:uuid}', [StudentsController::class, 'destroy']);
});

/**
 * Manage Teachers routes
 */
Route::prefix("teachers")->name('teachers.')->group(function () {
    Route::get('/', [TeachersController::class, 'index'])->name('index');
    Route::get('all', [TeachersController::class, 'getPaginatedList'])->name('all');
    Route::get('raw', [TeachersController::class, 'getRawList']);
    Route::get('edit/{teacher:name}', [TeachersController::class, 'edit']);
    Route::patch('{teacher:uuid}', [TeachersController::class, 'update']);
    Route::delete('{teacher:uuid}', [TeachersController::class, 'destroy']);
});

/**
 * Manage calendar events routes
 */
Route::prefix('calendar-events')->name('calendar_events.')->group(function () {
    Route::post('store', [CalendarEventsController::class, 'store']);
    Route::delete('destroy/{event}', [CalendarEventsController::class, 'destroy']);
});

/**
 * Manage news & notice
 */
Route::prefix("news_notices")->name('news_and_notices.')->group(function () {
    Route::get('/', [NewsNoticesController::class, 'index'])->name('index');
    Route::get('all', [NewsNoticesController::class, 'paginatedList']);
    Route::get('create', [NewsNoticesController::class, 'create'])->name('create');
    Route::post('store', [NewsNoticesController::class, 'store']);
    Route::get('edit/{news_notice:slug}', [NewsNoticesController::class, 'edit']);
    Route::patch('edit/{news_notice}', [NewsNoticesController::class, 'update']);
    Route::delete('destroy/{news_notice}', [NewsNoticesController::class, 'destroy']);
});
