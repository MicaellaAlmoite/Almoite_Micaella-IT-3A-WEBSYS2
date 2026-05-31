<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Almoite Biodata</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e6f1f3;
            padding: 20px;
        }
        p {
            text-indent: 20px;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }
        .header {
            display: flex;
            background: #4c8893;
            color: white;
            padding: 20px;
        }
        .photo img {
            width: 400px;
            border-radius: 5px;
            border: 6px solid #ffffff;
        }
        .details {
            margin-left: 20px;
        }
        .section {
            padding: 20px;
            border-top: 1px solid #ddd;
        }
        h3 {
            color: #4c8893;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="header">
        <div class="photo">
            <img src="{{ asset('images/mica.jpg') }}">
        </div>

        <div class="details">
            <h1>{{ $fullName }}</h1>

            <p>
                <strong>Age:</strong>
                {{ $age }}

                @if ($age == 21)
                    (Dalawampu’t isa)
                @elseif ($age >= 22 && $age <= 23)
                    (Duapulo ket dua / tallo)
                @elseif ($age > 24)
                    (Dalawampu tan lima)
                @endif
            </p>

            <p><strong>Date & Place of Birth:</strong> {{ $birthInfo }}</p>
            <p><strong>Residence:</strong> {{ $residence }}</p>
            <p><strong>Nationality:</strong> {{ $nationality }}</p>
            <p><strong>Religion:</strong> {{ $religion }}</p>
            <p><strong>Height:</strong> {{ $height }}</p>
            <p><strong>Education:</strong> {{ $education }}</p>
            <p><strong>Occupation:</strong> {{ $occupation }}</p>
            <p><strong>Languages:</strong> {{ $languages }}</p>
        </div>
    </div>

    <div class="section">
        <h3>About Me</h3>
            <p>{{ $aboutMe }}</p>
    </div>

    <div class="section">
        <h3>Family Background</h3>
            <p><strong>Father's Name:</strong> {{ $father }}</p>
            <p><strong>Father's Profession:</strong> {{ $fatherProf }}</p>
            <p><strong>Mother:</strong> {{ $mother }}</p>
            <p><strong>Mother's Profession:</strong> {{ $motherProf }}</p>
            <p><strong>No.of Brother:</strong> {{ $noBrother }}</p>
            <p><strong>No. of Sister:</strong> {{ $noSister }}</p>
            <p><strong>Family Type:</strong> {{ $familyType }}</p>
            <p><strong>Social Class:</strong> {{ $socialClass }}</p>
            <p><strong>Place of Residence:</strong> {{ $placeRes }}</p>
    </div>

    <div class="section">
        <h3>Expectations</h3>
            <p>{{ $expectations }}</p>
    </div>

    <div class="section">
        <h3>Contact Details</h3>
            <p><strong>Contact:</strong> {{ $contact }}</p>
            <p><strong>Residence Address:</strong> {{ $address }}</p>
    </div>

</div>

</body>
</html>
