<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendence; // Ensure you have the Attendance model
use App\Models\Section;
use Illuminate\Http\Request;

class Attendence_controller extends Controller
{
    public function store(Request $request, $sectionId)
    {
        $request->validate([
            'attendance_date' => 'required|date',
            'attendance.*' => 'required|in:present,absent',
        ]);
        $attendanceDate = $request->input('attendance_date') ?? now()->toDateString();
        $attendanceData = $request->input('attendance');
        foreach ($attendanceData as $userId => $status) {
            if ($status === 'present' || $status === 'absent') {
                // dd($attendanceDate);
                Attendence::updateOrCreate(
                    [
                        'user_id' => $userId,
                        'section_id' => $sectionId,
                        'status' => $status,
                        'attendance_date'=> $attendanceDate,
                    ],
                
                );

            }
        }

        return redirect()->back()->with('success', 'Attendance recorded successfully!');
    }
    public function show()
{
    $users = Auth::user(); 
    if (!$users) {
        return redirect()->route('user.create')->with('error', 'Student not found.');
    }
       $sections = $users->sections()->with('attendances')->get();
       return view('attendence', compact('sections'));
    }
}

