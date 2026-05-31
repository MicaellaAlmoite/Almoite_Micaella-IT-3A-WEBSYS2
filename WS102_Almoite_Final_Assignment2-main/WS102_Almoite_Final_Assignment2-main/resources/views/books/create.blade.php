<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book - MICA ALMOITE</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 450px;
            width: 100%;
        }

        h1 {
            color: #2c3e50;
            font-size: 24px;
            margin-bottom: 8px;
            text-align: center;
        }

        .subtitle {
            text-align: center;
            color: #7f8c8d;
            font-size: 14px;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e0e0e0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #34495e;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 10px 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        input:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        button {
            width: 100%;
            padding: 12px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 10px;
        }

        button:hover {
            background: #2980b9;
        }

        .required {
            color: #e74c3c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add New Book</h1>
        <div class="subtitle">MICA ALMOITE</div>
        
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label>Title <span class="required">*</span></label>
                <input type="text" name="title" required placeholder="Enter book title">
            </div>
            
            <div class="form-group">
                <label>Author <span class="required">*</span></label>
                <input type="text" name="author" required placeholder="Enter author name">
            </div>
            
            <div class="form-group">
                <label>Published Date <span class="required">*</span></label>
                <input type="date" name="published_date" required>
            </div>
            
            <button type="submit">Save Book</button>
        </form>
    </div>
</body>
</html>