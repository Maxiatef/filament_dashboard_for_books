@extends('book-layout')
@section('content')
@section('title', $title . ' Details')
<head>
    <title>@yield('title', 'Default Title')</title>
    <!-- Other head elements -->
</head>
    <h1>{{ $page }}</h1>
    @isset($book)

        <table class="table">
            <thead>
                <tr>
                    <th style="background-color:beige;" scope="col">ID</th>
                    <th style="background-color:beige;" scope="col">Title</th>
                    <th style="background-color:beige;" scope="col">Price</th>
                    <th style="background-color:beige;" scope="col">Category</th>
                    <th style="background-color:beige;" scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ $book->id }}</th>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->price }}</td>
                    <td>{{ $book->categories->name ?? '-' }}</td>
                    <td>{{ $book->description }}</td>
                </tr>
            </tbody>
        </table>
    @else
        <p>No Book Found</p>
    @endisset
@endsection