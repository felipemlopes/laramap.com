<?php

use Illuminate\Support\Facades\Auth;

Route::get('/', 'Pages\PageController@home');
//Route::get('sitemap', 'Site\SitemapController@getSitemap');

Route::group(['prefix' => 'auth'], function() {
    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthExtendedController@getLogout');

    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('register', 'Auth\AuthExtendedController@postRegister');

    Route::get('github', 'Auth\AuthController@redirectToProvider');
    Route::get('github/callback', 'Auth\AuthController@handleProviderCallback');
});

Route::group(['prefix' => 'password'], function() {
    Route::get('email', 'Auth\PasswordController@getEmail');
    Route::post('email', 'Auth\PasswordController@postEmail');

    Route::get('reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('reset', 'Auth\PasswordController@postReset');
});

Route::get('home', 'Pages\PageController@home');
Route::get('imprint', function() {
    return view('pages.imprint');
});
Route::get('p/about', function() {
    return view('pages.about');
});

Route::resource('contact', 'Site\ContactController');
Route::resource('sponsor', 'Site\SponsorController');

//Route::get('testkey', 'TestController@key');

//Route::get('test', function () {
//    $faker = Faker\Factory::create();
//    $article = new App\Article();
//
//    $article->title = $faker->sentence();
//    $article->image = $faker->imageUrl(500, 500, 'cats');
//    $article->content = $faker->paragraph(50);
////    $article->url = $faker->paragraph(50);
////    $article->description = $faker->paragraph(10);
//    Auth::user()->articles()->save($article);
////    $article->save();
//});

Route::get('@{username}', 'User\UserController@show');
Route::resource('articles', 'Site\ArticleController');
Route::resource('user_articles', 'User\ArticleController');
//Route::get('@{username}/articles/new', 'User\ArticleController@create');
Route::get('@{username}/articles', 'User\ArticleController@index');
Route::get('@{username}/article/{slug}', 'User\ArticleController@show');
Route::get('@{username}/article/{slug}/like', 'User\ArticleController@like');
Route::get('@{username}/article/{slug}/dislike', 'User\ArticleController@dislike');

Route::get('@{username}/tutorials', 'User\TutorialController@index');
Route::get('@{username}/tutorial/{slug}', 'User\TutorialController@show');
Route::get('@{username}/tutorial/{slug}/like', 'User\TutorialController@like');
Route::get('@{username}/tutorial/{slug}/dislike', 'User\TutorialController@dislike');

Route::get('@{username}/projects', 'User\ProjectController@index');
Route::get('@{username}/project/{slug}', 'User\ProjectController@show');
Route::get('@{username}/project/{slug}/like', 'User\ProjectController@like');
Route::get('@{username}/project/{slug}/dislike', 'User\ProjectController@dislike');

Route::get('@{username}/meetups', 'User\MeetupController@index');
Route::get('@{username}/meetup/{slug}', 'User\MeetupController@show');
Route::get('@{username}/meetup/{slug}/like', 'User\MeetupController@like');
Route::get('@{username}/meetup/{slug}/dislike', 'User\MeetupController@dislike');

Route::post('@{username}/report', 'User\UserController@report');

//Route::get('@{username}/friends', 'User\FriendController@index');
//Route::get('@{username}/friend/show/@{friendshow}', 'User\FriendController@show');

Route::resource('artisans', 'User\UserController');
Route::resource('search', 'Api\SearchController');

Route::resource('bug_report', 'Api\BugreportController');

Route::group(['prefix' => 'backend', 'middleware' => 'admin'], function() {
    Route::get('/', 'Backend\Pages\PageController@index');

    Route::resource('users', 'Backend\Users\UserController');
    Route::resource('users.activities', 'Backend\Users\ActivityController');
    Route::resource('users.articles', 'Backend\Users\ArticleController');
    Route::resource('users.meetups', 'Backend\Users\MeetupController');
    Route::resource('users.projects', 'Backend\Users\ProjectController');
    Route::resource('users.tutorials', 'Backend\Users\TutorialController');
    Route::resource('users.reports', 'Backend\Users\ReportController');

    Route::resource('articles', 'Backend\Articles\ArticleController');
    Route::resource('articles.categories', 'Backend\Articles\CategoryController');
    Route::resource('articles.reports', 'Backend\Articles\ReportController');

    Route::resource('tutorials', 'Backend\Tutorials\TutorialController');
    Route::resource('tutorials.categories', 'Backend\Tutorials\CategoryController');
    Route::resource('tutorials.reports', 'Backend\Tutorials\ReportController');

    Route::resource('meetups', 'Backend\Meetups\MeetupController');
    Route::resource('meetups.categories', 'Backend\Meetups\CategoryController');
    Route::resource('meetups.reports', 'Backend\Meetups\ReportController');

    Route::resource('projects', 'Backend\Projects\ProjectController');
    Route::resource('projects.categories', 'Backend\Projects\CategoryController');
    Route::resource('projects.reports', 'Backend\Projects\ReportController');

    Route::resource('reports', 'Backend\Reports\ReportController');
    Route::resource('reports.judges', 'Backend\Reports\JudgeController');

    Route::resource('offers', 'Backend\Offers\OfferController');

    Route::resource('callouts', 'Backend\Site\CalloutController');
    Route::GET('callouts/delete/{id}', 'Backend\Site\CalloutController@delete');

    Route::resource('bugreports', 'Backend\Bugreports\BugReportController');
    Route::GET('callouts/delete/{id}', 'Backend\Bugreports\BugReportController@delete');

    Route::resource('products', 'Backend\Shop\ArticleController');
    Route::resource('orders', 'Backend\Shop\OrderController');
    Route::GET('bugreports/delete/{id}', 'Backend\Bugreports\BugReportController@delete');
});

Route::group(['prefix' => 'account', 'middleware' => 'auth'], function() {
    Route::get('/', 'Account\ProfileController@index');
    Route::get('profile', 'Account\ProfileController@index');
    Route::post('password', 'Account\PasswordController@change_password');

    Route::post('update', 'Account\ProfileController@update');
    Route::post('profile/update', 'Account\ProfileController@update');
    Route::resource('profile', 'Account\ProfileController');
    Route::resource('settings', 'Account\SettingsController');
    Route::resource('reports', 'Account\ReportController');

    Route::resource('offers', 'Account\OfferController');

    Route::resource('orders', 'Account\OrderController');
});

Route::group(['prefix' => 'shop'], function() {
    Route::get('/', 'Shop\ArticleController@index');
    Route::resource('articles', 'Shop\ArticleController');
    Route::resource('orders', 'Shop\OrderController');
});

Route::resource('api/mobile/users', 'Api\Mobile\UsersController');