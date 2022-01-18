<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('shpargalka')->group(function () {

    Route::get('/vectorisShevseba', function() {
        return "int main(){
            vector <int> a;
            int number, ind{};
            cout << \"Enter 5 integers\n\";
            while (ind < 5) {
                cin >> number;
                a.push_back(number);
                ind++;
            }
            int sum{};
            ind = 0;
            while (ind < a.size()) {
                sum += a[ind];
                ind++;
            }
            double average = double(sum) /a.size();
            cout << \"The average of numbers = \" << average << endl;
        }
        ";
    });


    Route::get('/dzemoni', function() {
        return "

             DZEMONOOO DAMALEVINE TRAWIIIIIII
             AAAAAAAAAAAAAAA
             DRAKULAAAA
             DZEMONIIIIIIIIIIIIIIIIIIIIIII

        ";
    });


});

