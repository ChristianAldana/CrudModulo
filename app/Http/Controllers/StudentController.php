<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
   // Get all students
   public function index()
   {
       return Student::all();
   }

   // Create a new student
   public function store(Request $request)
   {
       $validated = $request->validate([
           'name' => 'required|string|max:255',
           'email' => 'required|email|unique:students',
           'age' => 'required|integer',
           'course' => 'required|string|max:255',
       ]);

       $student = Student::create($validated);
       return response()->json($student, 201);
   }

   // Get a single student by ID
   public function show($id)
   {
       $student = Student::findOrFail($id);
       return response()->json($student);
   }

   // Update a student
   public function update(Request $request, $id)
   {
       $student = Student::findOrFail($id);

       $validated = $request->validate([
           'name' => 'required|string|max:255',
           'email' => 'required|email|unique:students,email,' . $student->id,
           'age' => 'required|integer',
           'course' => 'required|string|max:255',
       ]);

       $student->update($validated);
       return response()->json($student);
   }

   // Delete a student
   public function destroy($id)
   {
       $student = Student::findOrFail($id);
       $student->delete();

       return response()->json(null, 204);
   }
}