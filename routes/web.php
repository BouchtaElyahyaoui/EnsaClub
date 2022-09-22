<?php

use App\Http\Controllers\User\ClubController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\FriendController;
use App\Http\Controllers\User\MemberController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\PostLikeController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\CommentLikeController;
use App\Http\Controllers\User\EventController;
use App\Http\Controllers\User\NotificationController;
use App\Http\Controllers\User\RevisionController;
use App\Http\Controllers\User\RoomController;
use Mockery\Generator\Method;

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


Route::middleware('guest')->get('/', [WelcomeController::class, 'show'])->name('welcome');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->prefix('user')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/profile/{user:username}', [ProfileController::class, 'show'])->name('profiles.show');
        Route::get('/members', [MemberController::class, 'index'])->name('members.index');

        Route::prefix('posts')->name('posts.')->group(function () {
            Route::post('', [PostController::class, 'store'])->name('store');
            Route::delete('/{post}', [PostController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('clubs')->name('clubs.')->group(function () {
            Route::get('', [ClubController::class, 'index'])->name('index');
            Route::get('/create', [ClubController::class, 'create'])->name('create');
            Route::post('/first-step',  [ClubController::class, 'firstStep'])->name('first.step');
            Route::post('/second-step',  [ClubController::class, 'secondStep'])->name('second.step');
            Route::post('/store', [ClubController::class, 'store'])->name('store');
            Route::get('/{club:clubName}', [ClubController::class, 'show'])->name('show');
        });

        Route::prefix('revisions')->name('revisions.')->group(function () {
            Route::get('', [RevisionController::class, 'index'])->name('index');
            Route::post('', [RevisionController::class, 'store'])->name('store');
            Route::delete('/{club}', [RevisionController::class, 'destroy'])->name('destroy');
            Route::post('/{revision}', [RevisionController::class, 'accept'])->name('accept');
        });

        Route::prefix('events')->name('events.')->group(function () {
            Route::get('', [EventController::class, 'index'])->name('index');
            Route::post('', [EventController::class, 'store'])->name('store');
            Route::delete('/{event}', [EventController::class, 'destroy'])->name('destroy');
            Route::get('/filter', [EventController::class, 'filter'])->name('filter');
            Route::put('/{event}', [EventController::class, 'update'])->name('update');
        });

        Route::prefix('comments')->name('comments.')->group(function () {
            Route::post('/{post}/comments', [CommentController::class, 'store'])->name('store');
            // Route::delete('/{post}', [PostController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('friends')->name('friends.')->group(function () {
            Route::post('/{user}', [FriendController::class, 'store'])->name('store');
            Route::get('', [FriendController::class, 'index'])->name('index');
            Route::patch('/{user}', [FriendController::class, 'update'])->name('update');
            Route::get('/{user}', [FriendController::class, 'deny'])->name('deny');
            Route::delete('/{user}', [FriendController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('chat/rooms')->name('chat-rooms.')->group(function () {
            Route::get('/{room:slug?}', [RoomController::class, 'index'])->name('index');
            Route::post('/{room}/messages', [RoomController::class, 'store'])->name('store');
            Route::post('/', [RoomController::class, 'storeRoom'])->name('storeRoom');
            // Route::get('/{room:slug}', [RoomController::class, 'show'])->name('show');
        });



        Route::prefix('post-like')->name('post-like.')->group(function () {
            Route::post('/{post}', [PostLikeController::class, 'store'])->name('store');
            Route::delete('/{post}', [PostLikeController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('comment-like')->name('comment-like.')->group(function () {
            Route::post('/{comment}', [CommentLikeController::class, 'store'])->name('store');
            Route::delete('/{comment}', [CommentLikeController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('notifications')->name('notifications.')->group(function () {
            Route::post('/mark-one/{id}', [NotificationController::class, 'store'])->name('store');
            Route::get('/mark-all', [NotificationController::class, 'update'])->name('update');
            Route::get('/mark-delete/{id}', [NotificationController::class, 'destroy'])->name('destroy');
        });
    });
