<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::controller(StudentController::class)->group(function () {

    Route::get('/', 'allStudents')->name('view.all.students');
    Route::get('/singleStudents/{id}', 'singleStudent')->name('view.single.student');

    Route::post('/addStudents', 'addStudents')->name('view.add.students');

    Route::get('/addDemoStudents', 'addDemoStudents')->name('view.demo.students');

    Route::post('/updateStudent/{id}', 'updateStudent')->name('view.update.student');
    Route::get('/updateStudentPage/{id}', 'updateStudentPage')->name('view.update.student.page');

    Route::get('/deleteStudent/{id}', 'deleteStudent')->name('view.delete.student');
    Route::get('/deleteAllStudents', 'deleteAllStudents')->name('view.delete.all.students');
});

Route::view('newStudent', '/add_student')->name('view.add.student');








// Route::get('/', function () {
//     return view('welcome');
// });
// For Earse Of Convenience We've Set Temporarily : "/allStudents" as "/".

// Route::get('/','allStudents')->name('view.all.students');
// Route::get('/singleStudents/{id}','singleStudent')->name('view.single.student');

// Route::post('/addStudents','addStudents')->name('view.add.students');

// Route::get('/updateStudent','updateStudent')->name('view.update.student');
// Route::post('/updateStudentPage/{id}','updateStudentPage')->name('view.update.student.page');

// Route::get('/deleteStudent/{id}','deleteStudent')->name('view.delete.student');
// Route::get('/deleteAllStudents','deleteAllStudents')->name('view.delete.all.students');