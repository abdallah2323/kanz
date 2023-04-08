<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CvController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\GuaranteeController;
use App\Http\Controllers\ObjectiveController;
use App\Http\Controllers\FreeCourseController;
use App\Http\Controllers\InstructorController;

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

Route::prefix('/')->group(function() {
    Route::get('', [WebController::class, 'index'])->name('al-kanz');
    Route::get('logout', [WebController::class, 'logout'])->name('user-logout');
    Route::get('courses', [WebController::class, 'coursesPage'])->name('courses-page');
    Route::get('course-details/{id}', [WebController::class, 'courseDetails'])->name('course-details');
    Route::get('course-content/{id}', [WebController::class, 'courseContent'])->name('course-content');
    Route::get('instructor/{id}', [WebController::class, 'instructorShow'])->name('instructor-show');
    Route::get('about', [WebController::class, 'aboutPage'])->name('about-page');
    Route::get('lib', [WebController::class, 'libraryPage'])->name('library-page');
    Route::get('lib-search', [WebController::class, 'getMoreLibraries'])->name('library.search');
    Route::get('lib/{id}', [WebController::class, 'filePage'])->name('file-page');
    Route::get('q&a', [WebController::class, 'questions'])->name('q&a-page');
    Route::get('privacy&policy', [WebController::class, 'privacy'])->name('privacy-page');
    Route::get('guarantee', [WebController::class, 'guarantee'])->name('guarantee-page');
});

Route::prefix('/')->middleware('guest:web')->group(function() {
    Route::get('login', [WebController::class, 'showLogin'])->name('user-login');
    Route::post('login', [WebController::class, 'login']);
    Route::get('forget-password', [WebController::class, 'forgetPass'])->name('forget-pass');
    Route::get('sign-up', [WebController::class, 'showSignUp'])->name('user-register');
    Route::post('sign-up', [WebController::class, 'register']);
});

Route::prefix('/')->middleware('auth:web')->group(function() {
    Route::get('my-profile', [WebController::class, 'userShow'])->name('user-profile');
    Route::get('edit-profile', [WebController::class, 'editProfileShow'])->name('edit-profile-show');
    Route::put('edit-profile', [WebController::class, 'editProfile'])->name('edit-profile');
    Route::get('change-password', [WebController::class, 'changePassShow'])->name('change-pass-show');
    Route::post('change-password', [WebController::class, 'changePass'])->name('change-pass');
    Route::get('contact-us', [WebController::class, 'contactUsPage'])->name('contact_us-page');
    Route::get('student-register/{id}', [WebController::class, 'studentRegister'])->name('student-register');
    Route::get('lecture-show/{id}', [WebController::class, 'lectureShow'])->name('lecture-show');
    Route::get('payment/{id}', [WebController::class, 'paymentShow'])->name('payment-page');
    Route::post('comment-store', [WebController::class, 'comment'])->name('comment-store');
    Route::post('contact-us', [WebController::class, 'contact'])->name('contact_store');
    Route::post('student-register/{id}', [WebController::class, 'studentStore'])->name('student_store');
    Route::get('/lib/download/{file}', [WebController::class, 'download'])->name('downloadLibWeb');
    Route::get('/download/{file}', [WebController::class, 'fileDownload'])->name('downloadFileWeb');
});


Route::prefix('cms/admin')->middleware('guest:admin')->group(function() {

    Route::get('login', [AuthController::class, 'viewLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('admin_login');

});

Route::prefix('cms/admin')->group(function(){
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});



Route::prefix('cms/admin')->middleware('auth:admin')->group(function(){
    Route::get('', [DashboardController::class, 'index'])->name('Dashboard');

    Route::get('edit-password', [AuthController::class, 'edit_password'])->name('reset-password');
    Route::post('update-password', [AuthController::class, 'update_password'])->name('update-password');


    Route::resource('admins', AdminController::class);
    Route::resource('instructors', InstructorController::class);
    Route::resource('cv', CvController::class);
    Route::resource('users', UserController::class);
    Route::resource('students', StudentController::class);
    Route::resource('materials', MaterialController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('objectives', ObjectiveController::class);
    Route::resource('posts', PostController::class);
    Route::resource('lectures', LectureController::class);
    Route::resource('files', FileController::class);
    Route::get('/lib/download/{file}', [DownloadController::class, 'download'])->name('downloadLib');
    Route::get('/download/{file}', [DownloadController::class, 'fileDownload'])->name('downloadFile');
    Route::get('psychological-courses', [FreeCourseController::class, 'psychologicalCourses'])->name('psychological-courses');
    Route::get('free-courses', [FreeCourseController::class, 'freeCourses'])->name('free-courses');
    Route::get('paid-courses', [FreeCourseController::class, 'paidCourses'])->name('paid-courses');
    Route::resource('levels', LevelController::class);
    Route::resource('educations', EducationController::class);
    Route::resource('libraries', LibraryController::class);
    Route::resource('activities', ActivityController::class);
    Route::resource('news', ArticleController::class);
    Route::resource('opinions', OpinionController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('about-us', AboutController::class);
    Route::resource('main-page', MainController::class);
    Route::resource('course-page', SliderController::class);
    Route::resource('socials', SocialController::class);
    Route::resource('policy', PolicyController::class);
    Route::resource('guarantees', GuaranteeController::class);
    Route::resource('questions', QuestionController::class);
    Route::resource('logo', LogoController::class);
    Route::resource('comments', CommentController::class);
});

