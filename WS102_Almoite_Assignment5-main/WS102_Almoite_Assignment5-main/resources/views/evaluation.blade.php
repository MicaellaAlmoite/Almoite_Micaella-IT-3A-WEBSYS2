<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Student Academic Evaluation</h2>

    <h3>Input</h3>

    @if(isset($name) && isset($prelim) && isset($midterm) && isset($final))


     @php
            $average = ($prelim + $midterm + $final) / 3;
        @endphp

        <p>Name: {{ $name }}</p>
        <p>Prelim: {{ $prelim }}</p>
        <p>Midterm: {{ $midterm }}</p>
        <p>Final:{{ $final }}</p>

        @php
            $average = ($prelim + $midterm + $final) / 3;
        @endphp

        <h3>Output</h3>

        <p>Average: {{ number_format($average, 2) }}</p>

        
        <p>Letter Grade:
            @if ($average >= 90)
                A
            @elseif ($average >= 80)
                B
            @elseif ($average >= 70)
                C
            @elseif ($average >= 60)
                D
            @else
                F
            @endif
        </p>

        <p>Remarks:
            @if ($average >= 75)
                Passed
            @else
                Failed
            @endif
        </p>

        <p>Award: 
            @if ($average >= 98)
                With Highest Honors
            @elseif ($average >= 95)
                With High Honors
            @elseif ($average >= 90)
                With Honors
            @else
                No Award
            @endif
        </p>

    @endisset


</body>
</html>