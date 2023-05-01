<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
$router->get('/users',['uses' => 'TeacherController@get']);

});
$router->post('/insert', 'TeacherController@addTeacher'); // INSERT NEW RECORD
$router->delete('/delete/{id}', 'TeacherController@deleteTeacher'); // DELETE teacher RECORD BY teacher
$router->put('/update/{id}', 'TeacherController@updateTeachersInfo'); // UPDATE teacher RECORD BY teacher
$router->get('/search/{id}', 'TeacherController@getTeachersID'); // SEARCH teacher BY teacher
$router->get('/browse', 'TeacherController@getallTeacher'); // VIEW ALL teachers RECORDS