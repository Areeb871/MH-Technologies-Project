<!DOCTYPE html>
<html>
<head>
    <title>Timetable</title>
</head>
<body>
    <h1> {{ $users->name }}</h1> <!-- Replace 'name' with the actual user field -->

    <h2>Sections and Lectures</h2>
    @foreach($users->sections as $section)
        <h3>Section: {{ $section->name }}</h3> <!-- Replace 'name' with the actual section field -->
        <ul>
            @foreach($section->lectures as $lecture)
                <li>Lecture: {{ $lecture->title }}</li> <!-- Replace 'title' with the actual lecture field -->
            @endforeach
        </ul>
    @endforeach
</body>
</html>
