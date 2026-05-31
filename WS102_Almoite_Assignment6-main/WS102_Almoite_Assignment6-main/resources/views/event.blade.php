<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>Event Registration Page</h2>

    @if(isset($event) && isset($name) && isset($year))

        <p>Event Name: {{ $event}}</p>
        <p>Participant Name : {{ $name }}</p>
        <p>Year Level: {{ $year }}</p>

    @endisset


</body>
</html>