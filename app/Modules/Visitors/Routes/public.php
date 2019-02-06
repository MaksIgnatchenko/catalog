<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 31.01.19
 *
 */

Route::get('/', 'MainPageController')->name('mainPage');
Route::get('result', 'SearchController@search')->name('result');

Route::post('/visitorRegister', 'Auth\RegisterController@register')->name('visitorRegister');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('visitorVerification.verify');
Route::middleware('auth:visitor')->group(function() {
    Route::post('/logout', 'Auth\LoginController@logout')->name('visitorLogout');
});
//Route::post('/visitorRegister', function(\Illuminate\Http\Request $request) {
//    return $request->all();
//})->name('visitorRegister')->middleware('guest:visitor');

Route::get('x', function() {
    \App\Modules\Visitors\Model\Visitor::create(['name' => 'max', 'email' => 'myfuns1989@gmail.com', 'password' => 'password']);
    redirect()->back();
});

Route::get('x', function() {
    $visitor = \App\Modules\Visitors\Model\Visitor::create(['name' => 'max', 'email' => 'myfuns1989@gmail.com', 'password' => 'password']);
    dd($visitor);
    redirect()->back();
});

Route::get('img', function() {
//    $base64string = file_get_contents('http://localhost');

});

Route::get('view', function () {
    return view('mail.verifyEmail',
        [
            'user' => new class {public $name = 'Max'; public $email = 'myfuns1989@gmail.com'; },
            'verificationUrl' => 'http://user.com'
        ]);
});