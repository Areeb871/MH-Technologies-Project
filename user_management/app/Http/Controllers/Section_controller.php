<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Lecture;
class Section_controller extends Controller
{

            // Display a list of all sections
            public function index()
            {
                $sections = Section::all();
                return view('section_list', compact('sections'));
            }
        
            // Show the form for creating a new section
            public function create()
            {
                return view('create_section');
            }
        
            // Store a newly created section in the database
            public function store(Request $request)
            {
                $request->validate([
                    'name' => 'required|unique:sections',
                ]);
        
                $section = Section::create($request->all());
        
                return redirect()->route('sections.show',$section->id)->with('success', 'Section created successfully.');
            }
        
            // Show the form for editing a section
            public function edit($id)
            {
                $section = Section::findOrFail($id);
                $lectures = Lecture::all(); // Get all lectures for the select options
                return view('edit_section', compact('section', 'lectures'));
            }
        
            // Update a section in the database
            public function update(Request $request, $id)
            {
                $request->validate([
                    'name' => 'required|unique:sections,name,' . $id,
                ]);
        
                $section = Section::findOrFail($id);
                $section->update($request->all());
        
                // Attach selected lectures (if any) to the section
                if ($request->has('lectures')) {
                    $section->lectures()->sync($request->lectures);
                }
        
                return redirect()->route('sections.show', $section->id)->with('success', 'Section updated successfully.');
            }
        
            // Delete a section from the database
            public function destroy($id)
            {
                $section = Section::findOrFail($id);
                $section->lectures()->detach(); // Detach all lectures associated with this section
                $section->delete();
        
                return redirect()->route('sections.show',$section->id)->with('success', 'Section deleted successfully.');
            }
        
            // Show the details of a single section
            public function show($id)
            {
                $section = Section::with('lectures')->findOrFail($id);
                return view('section_show', compact('section'));
            }
        }
        

    
