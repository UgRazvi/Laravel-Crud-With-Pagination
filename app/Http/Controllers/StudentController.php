<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Add This ... to StudentController.php
use PhpParser\Node\Stmt\Echo_;

class studentController extends Controller
{

    public function allstudents()
    {
        // $students = DB::table('students')->get();
        $students = DB::table('students')->paginate(3);
        return view('all_students', ['students_data' => $students]);
    }


    public function Singlestudent(string $id)
    {
        $students = DB::table('students')->where('id', $id)->get();
        return view('single_student', ['students_data' => $students]);
    }

    public function addDemoStudents()
    {
        // Add Static Demo Data
        $student = DB::table('students')->insert(
            [
                [
                    'name' => 'Name 01',
                    'email' => '01.email@gmail.com',
                    'age' => 15,
                    'city' => 'Jaipur',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Name 02',
                    'email' => '02.email@gmail.com',
                    'age' => 55,
                    'city' => 'Jaisalmer',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Name 03',
                    'email' => '03.email@gmail.com',
                    'age' => 45,
                    'city' => 'Jodhpur',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Name 04',
                    'email' => '04.email@gmail.com',
                    'age' => 35,
                    'city' => 'Haryana',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Name 05',
                    'email' => '05.email@gmail.com',
                    'age' => 25,
                    'city' => 'Delhi',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Name 06',
                    'email' => '06.email@gmail.com',
                    'age' => 20,
                    'city' => 'Mumbai',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Name 07',
                    'email' => '07.email@gmail.com',
                    'age' => 30,
                    'city' => 'Ranchi',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Name 08',
                    'email' => '08.email@gmail.com',
                    'age' => 40,
                    'city' => 'Jharkhand',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Name 09',
                    'email' => '09.email@gmail.com',
                    'age' => 50,
                    'city' => 'Patna',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Name 10',
                    'email' => '10.email@gmail.com',
                    'age' => 60,
                    'city' => 'Pune',
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]

        );
        if ($student) {
            // echo "Data Has Been Added Successfully...";
            return redirect()->route('view.all.students');
        } else {
            echo "Sorry, unable To Add";
        }
    }

    public function addStudents(Request $request)
    {
        // Add Dynamic data
        $student = DB::table('students')->insert(
            [
                'name' => $request->studentname,
                'email' => $request->studentemail,
                'age' => $request->studentage,
                'city' => $request->studentcity,
                'created_at' => now(),
                'updated_at' => now()
            ]

        );
        if ($student) {
            // echo "Data Has Been Added Successfully...";
            return redirect()->route('view.all.students');
        } else {
            echo "Sorry, unable To Add";
        }
    }

    public function updateStudentPage(string $id)
    {
        // $student = DB::table("students")->where("id", $id)->get();
        // return $student;

        $student = DB::table("students")->find($id);
        return view("update_student", ['student_data' => $student]);
        if ($student) {
            echo "Data Has Been Updated Successfully...";
            // return redirect()->route('view.all.students');
        } else {
            echo "Sorry, unable To Update";
        }
    }

    // // Static
    // public function updatestudent()
    // {
    //     // // Block : X_01 Method - 01
    //     // $students = DB::table('students')
    //     //     ->updateOrInsert(
    //     //         [
    //     //             'name' => 'New Name 05',
    //     //             'email' => 'namey@gmail.com',
    //     //             'city' => 'Pipar City'
    //     //         ],
    //     //         [
    //     //             'age' => 21
    //     //         ]
    //     //     );
    //     // // Block : X_01 Method - 01


    //     // // Block : X_01 Method - 02
    //     // $students = DB::table('students')
    //     //     ->where('id', 3)
    //     //     ->update([
    //     //         'age' => 25,
    //     //     ]);

    //     // // Block : X_01 Method - 02

    //     if ($students) {
    //         return "Updated Successfully";
    //     } else {
    //         echo "Sorry, unable To Delete";
    //     }
    // }


    public function updatestudent(Request $request, $id)
    {
        // // return $request; // To View JSON
        $students = DB::table('students')
            ->where('id', $id)
            // ->updateOrInsert(
            ->update(
                [
                    'name' => $request->studentname,
                    'email' => $request->studentemail,
                    'city' => $request->studentcity,
                    'age' => $request->studentage,
                    'updated_at' => now()
                    // 'created_at' => now(),
                ]
            );
        // Block : X_01 Method - 03

        if ($students) {
            // return "Updated Successfully";
            return redirect()->route('view.all.students');
        } else {
            echo "Sorry, unable To Delete";
        }
    }

    public function deletestudent(string $id)
    {
        $students = DB::table('students')
            ->where('id', $id)
            ->delete();
        if ($students) {
            return redirect()->route('view.all.students');
        } else {
            echo "Sorry, unable To Delete";
        }
    }

    public function deleteAllstudents()
    {
        $students = DB::table('students')
            ->truncate(); // Resets Id Parameter = 0 After Deleting All Data.
        // ->delete();
        return redirect()->route('view.all.students');
    }
}
