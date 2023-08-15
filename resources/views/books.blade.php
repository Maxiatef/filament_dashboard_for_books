@extends('book-layout')
@section('content')
@section('title', 'Books')
<head>
    <title>@yield('title', 'Default Title')</title>
    <style>
        .pagination .page-link {
            font-size: 14px; /* Adjust the font size as needed */
        }
        .t{
            background-color:  beige;
        }
</style>
    <!-- Other head elements -->
</head>
<h1>{{ $page }}</h1>
    @isset($books)
        <table class="table">
            <thead>
                <tr>
                    <th style="background-color:beige;" scope="col">ID</th>
                    <th style="background-color:beige;">Image</th>
                    <th style="background-color:beige;">Title</th>
                    <th style="background-color:beige;">Price</th>
                    <th style="background-color:beige;">Category</th>
                    <th style="background-color:beige;">Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($books as $index => $book)
                    <tr>
                    <th scope="row">{{ $book["id"] }}</th>
                    <td><img width="60px" height="60px" src="{{ asset('storage/books/') ."/" . $book->pic}}" alt=""></td>
                        <td>{{ $book['title'] }}</td>
                        <td>{{ $book['price'] }}</td>
                        <td>{{ $book->categories->name ?? '-' }}</td>
                        <td>
                        <form action="{{ route('show_book', ['id' => $book['id']]) }}" method="GET" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success">👁</button>
                        </form>

                        <form action="{{ route('destroy_book', ['id' => $book['id']]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">❌</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$books->links()}}
    @else
        <p> No Books</p>
        @endif
@endsection
