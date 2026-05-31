<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Books - MICA ALMOITE</title>
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
            max-width: 800px;
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

        .add-button {
            display: inline-block;
            background: #3498db;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            margin-bottom: 20px;
            transition: background 0.3s ease;
        }

        .add-button:hover {
            background: #2980b9;
        }

        .books-list {
            list-style: none;
            padding: 0;
        }

        .book-item {
            background: #f8f9fa;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
        }

        .book-item:hover {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .book-info {
            flex: 1;
            color: #34495e;
            font-size: 14px;
        }

        .book-title {
            font-weight: 600;
            color: #2c3e50;
            font-size: 16px;
        }

        .book-actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .edit-link {
            background: #27ae60;
            color: white;
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            transition: background 0.3s ease;
        }

        .edit-link:hover {
            background: #229954;
        }

        .delete-form {
            margin: 0;
        }

        .delete-btn {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .delete-btn:hover {
            background: #c0392b;
        }

        .empty-message {
            text-align: center;
            color: #7f8c8d;
            padding: 40px;
            font-size: 16px;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }
            
            .book-item {
                flex-direction: column;
                gap: 12px;
                align-items: flex-start;
            }
            
            .book-actions {
                width: 100%;
                justify-content: flex-end;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>All Books</h1>
        <div class="subtitle">MICA ALMOITE</div>
        
        <a href="{{ route('books.create') }}" class="add-button"> Add New Book</a>
        
        @if($books->count() > 0)
            <ul class="books-list">
                @foreach ($books as $book)
                    <li class="book-item">
                        <div class="book-info">
                            <span class="book-title">{{ $book->title }}</span><br>
                            <span>by {{ $book->author }}</span><br>
                            <span>{{ $book->published_date }}</span>
                        </div>
                        <div class="book-actions">
                            <a href="{{ route('books.edit', $book->id) }}" class="edit-link">✏️ Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this book?')">🗑️ Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="empty-message">
                No books found. Click "Add New Book" to get started!
            </div>
        @endif
    </div>
</body>
</html>