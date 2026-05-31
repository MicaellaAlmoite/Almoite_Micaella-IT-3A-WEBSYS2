<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>OJT Company Information Page</h2>

    
        <p>Company Name: {{ $company}}</p>
        <p>City : {{ $city }}</p>

        @if($allowance)
            <p>Allowance: {{ $allowance }}</p>
        @endif
 


</body>
</html>