<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateBookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(){
        // dd(Auth::user());
        $books = Book::orderBy('id', 'desc')->paginate(5);
        $cat = Category::all();
        $page = "Books";
        return view('books', [
            "page" => $page,
            "books" => $books,
            "cat" => $cat
        ]); //resource/views/''
    }

    public function show(){
        $page = "create book";
        $categories = Category::all();
        return view('create-book', ['page' => $page,'categories'=>$categories]);
    }

    public function create(CreateBookRequest $request){
        // dd($request->file('pic'));
        // // dd($request->all());
        // $cat = new Category();
        // $validated = $request->validate([
        //     'title' => 'required|min:6|max:255',
        //     'price' => 'required|min_digits:0',
        //     'categories' => 'required|exists:categories,id',
        // ]);
        // $book = new Book();
        $fileName = Book::uploadFile($request, $request->pic);
        Book::create([
            "title" => $request->title,
            "price" => $request->price,
            "description" => $request->description,
            "cat_id" => $request->categories,
            "pic" => $fileName
        ]);
        return redirect()->route('books');
    }

    public function destroy($book){
        $book = Book::find($book);
        $book->delete();
        return redirect()->back();
    }    

    public function showBook($book){
        $book = Book::findOrFail($book);
        $title = $book->title;
        $page = $title . " Details";
        return view('book_details', [
            "page" => $page,
            "book" => $book,
            "title" => $title
        ]);
        // dd($book);
        //task: return view();
    }

}
