<?php
 use App\Http\Controllers\usercontroller;
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

Route::get('/', function () {
    return view('welcome');
});

// Route:: get('message',function(){
//     echo 'welcome to laravel';
// });

//

Route::get('UserMessage',[usercontroller::class,'Message']);
Route::get('User/Create',[usercontroller::class,'Create']);
Route::post('User/Store',[userController::class,'store']);


