<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\test1;
use App\Models\sessiontest;

class AdminController extends Controller
{
    // Renders the Form Handler page
    public function formHandler()
    {
        return view('handlers.admin.formHandler');
    }

    // Process form data
    public function formHandler_send(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'hobby' => 'required|string|max:255',
        ]);

        // Create a new human record in the database
        $human = test1::create([
            'name' => $validatedData['name'],
            'hobby' => $validatedData['hobby'],
        ]);

        // Optionally, return some success response or redirect
        return view('handlers.admin.formHandler', compact('human'));
    }

    public function formHandler_search(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $human = test1::where('name', $validatedData['name'])->first();

        if ($human) {
            return response()->json($human->hobby, 200);
        } else {
            return response()->json('No record found', 200);
        }
    }

    // Renders the Session Handler page
    public function sessionHandler()
    {
        return view('handlers.admin.sessionHandler');
    }

    public function sessionHandler_session(Request $request)
    {
        $person = $request->person;
        $person_decode = json_decode($person);

        $nickname = $person_decode->nickname;
        $age = $person_decode->age;
        $point = $person_decode->point;

        $res1 = sessiontest::create([
            'nickname' => $nickname,
            'age' => $age,
            'point' => $point,
        ]);

        return response()->json('session saved!.', 200);
    }
}
