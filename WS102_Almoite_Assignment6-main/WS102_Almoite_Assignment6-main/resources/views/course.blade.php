<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>Course Enrollment Page</h2>

    @if($course)
        <p>Course: {{ $course }}</p>
    @endif

    @if($year)
        <p>Year: {{ $year }}</p>
    @endif

   


</body>
</html>