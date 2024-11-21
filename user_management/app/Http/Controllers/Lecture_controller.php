<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecture;
use App\Models\Section;

class Lecture_controller extends Controller
{

        // Display a list of all lectures
        public function index()
        {
            $lectures = Lecture::with('sections')->get(); // Eager load sections
            return view('lecture_list', compact('lectures'));
        }
    
        // Show the form for creating a new lecture
        public function create()
        {
            $sections = Section::all(); // Fetch all sections
            return view('lectures_create', compact('sections'));
        }
    
        // Store a newly created lecture in the database
        public function store(Request $request)
        {
            $request->validate([
                'title' => 'required|unique:lectures',
                'description' => 'nullable',
                'sections' => 'required|array', // Expect an array of section IDs
            ]);
    
            $lecture = Lecture::create($request->only('title', 'description'));
            $lecture->sections()->attach($request->sections); // Attach selected sections
            return redirect()->route('lectures.show',$lecture->id)->with('success', 'Lecture created successfully.');
        }
    
        // Show the form for editing a lecture
        public function edit($id)
        {
            $lecture = Lecture::with('sections')->findOrFail($id);
            $sections = Section::all(); // Fetch all sections for selection
            return view('lectures_edit', compact('lecture', 'sections'));
        }
    
        // Update a lecture in the database
        public function update(Request $request, $id)
        {
            $request->validate([
                'title' => 'required|unique:lectures,title,' . $id,
                'description' => 'nullable',
                'sections' => 'required|array', // Expect an array of section IDs
            ]);
            $lecture = Lecture::findOrFail($id);
            $lecture->update($request->only('title', 'description'));
            $lecture->sections()->sync($request->sections); // Sync selected sections
    
            return redirect()->route('lectures.show',$lecture->id)->with('success', 'Lecture updated successfully.');
        }
    
        // Delete a lecture from the database
        public function destroy($id)
        {
            $lecture = Lecture::findOrFail($id);
            $lecture->delete();
    
            return redirect()->route('lectures.show',$lecture->id)->with('success', 'Lecture deleted successfully.');
        }
    
        // Show the details of a single lecture
        public function show($id)
        {
            $lecture = Lecture::with('sections')->findOrFail($id);
            return view('lecture_show', compact('lecture'));
        }
    }
    
    
