@extends('admin')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Attendance Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
@section('content')
@if(Auth::user()->roles->contains('name', 'Student'))
    <h2>Your Attendance Status</h2>
    @foreach($sections as $section)
        <div class="section-info">
            <h4>Section: {{ $section->name }}</h4>
            <h5>User: {{ Auth::user()->name }}</h5>
            
            @php
                // Get all attendances for the logged-in user in the current section
                $attendances = $section->attendances->where('user_id', Auth::user()->id);
            @endphp
            
            @if($attendances->isEmpty())
                <p>No attendance records found for this section.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attendances as $attendance)
                            <tr>
                                <td>{{ $attendance->attendance_date }}</td> <!-- Display attendance date -->
                                <td>{{ $attendance->status }}</td>          <!-- Display attendance status (present/absent) -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <hr>
    @endforeach
@endif
@endsection
</body>
</html>
