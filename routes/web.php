<?php

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
Route::get("/", function () {
    return view("welcome");
});
Route::get('/report/{id}', 'TeacherController@report');
Route::get('/reports/{id}', 'TeacherController@reports');
Route::get('/test/{id}', 'AddController@student');
Route::post("/period/update","PeriodController@update");
Route::get("message_test/{id}", 'MessagesController@test');
Route::get("teacher_register", 'Teacher_userController@index');
Route::post("teacher_register", 'Teacher_userController@create');
Route::get("messages", "MessagesController@index");
Route::get("messagesAjax", "MessagesController@select");
Route::get("archives", "MessagesController@archives");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/addStudent', 'AddController@index');
Route::post('/addStudent', 'AddController@storeStudent');
Route::post('/addLevel', 'AddController@storeLevel');
Route::post('/addClass', 'AddController@storeClass');
Route::post('/addStudent', 'AddController@storeStudent');
Route::get('/addTeacher', 'AddController@teacher');
Route::get("/data", function () {
    return view("test.data");
});
Route::get('/addLesson', 'AddController@lesson');
Route::get('/lessons', 'LessonsController@index');
Route::get('/lessons/select/{id}', 'LessonsController@room');
Route::get("/lesson/{id}", "LessonsController@lesson");
Route::get("/lesson/table/{id}", "LessonsController@table");
Route::get("/lesson/students/{id}", "LessonsController@students");
Route::get("/lesson/exam/{id}", "LessonsController@exam");
Route::post("/lesson/update/{id}", "LessonsController@update");
Route::post('/addLesson', 'AddController@storeLesson');
Route::post('/addTeacher', 'AddController@storeTeacher');
Route::get('/del_teacher/{id}', 'AddController@delTeacher');
Route::get('/teacher/table', 'AddController@table');
Route::get('/students', 'StudentsController@index');
Route::get('/students/{id}', 'StudentsController@selected');
Route::get("/tables/{name}","HomeController@table");
Route::get("/tables/edit/{name}","HomeController@edit");
Route::get('/students/class/{id}', 'StudentsController@table');
Route::get('/student/alone/{id}', 'StudentsController@student');
Route::get('/student/search/{search}', 'StudentsController@search');
Route::get('/nexmo', function () {
    \Nexmo\Laravel\Facade\Nexmo::message()->send([
        'to' => '250788809391',
        'from' => 'Alain',
        'text' => 'Bonjour, Mama Ni MUCYO, Ibyangombwa Barabyemeye.'
    ]);
});
Route::get('/sms', 'smsController@index');
Route::get('/sms/delete/{id}', 'smsController@delete');
Route::post('/sms', 'smsController@send');
Route::get('/delete/{id}', 'StudentsController@delete');
Route::get('/update/{id}', 'StudentsController@update');
Route::post('/update/{id}', 'StudentsController@updateStore');
Route::get('/del_admin/{id}', 'Auth\RegisterController@delete');
Route::post("message", "MessagesController@store");
Route::get("/sms/{id}", "smsController@parent");
Route::post("/sms/{id}", "smsController@send");
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('teacher')->group(function () {
    Route::get("index", "TeacherController@index");
    Route::post("addQuiz", "QuizController@store");
    Route::get("quiz", "QuizController@index");
    Route::get("thisQuiz/{id}", "QuizController@thisQuiz");
    Route::get("lesson/{id}", "QuizController@lesson");
    Route::get("delete/{id}", "QuizController@delete");
    Route::get("delete/exam/{id}", "ExamController@delete");
    Route::get("update/{marks}/{std_id}/{quiz_id}", "QuizController@update");
    Route::post("addExam", "ExamController@store");
    Route::get("room/{id}", "TeacherController@students");
    Route::get("exam", "ExamController@index");
    Route::get("thisExam/{id}", "ExamController@thisExam");
    Route::get("update/exam/{marks}/{std_id}/{exam_id}", "ExamController@update");
});
Route::prefix("parent")->group(function () {
    Route::post("register", "ParentController@index");
    Route::post("student", "ParentController@student");
    Route::post("send", "ParentController@sent");
    Route::get("quiz/{id}", "ParentController@quiz");
    Route::get("exam/{id}", "ParentController@exam");
    Route::get("messages/{id}","ParentController@messages");
    Route::get("noty/{id}","ParentController@noty");
});