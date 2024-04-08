<?php
namespace App\Http\Controllers;
use App\Models\libros;
use Illuminate\Http\Request;

class LibrosController extends Controller
{
    public function index(){
        $books = libros::all(); 
        $booksObject=$books[0];
        return view('index', ['books' => $books], ['booksObject' => $booksObject]);
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $libro = new libros;
        $libro -> title = $request -> title;
        $libro -> author_name = $request -> author_name;
        $libro -> isbn = $request -> isbn;
        $libro -> published_year = $request -> published_year;

        $libro -> save(); //SQL: INSET INTO courses(title, description, ...)
        return redirect()->route('biblioteca.index');
    }

    public function edit($id){
        $libro=libros::find($id); //SELECT * VROM courses WHERE id=6 LIMIT 1;
        return view('edit', ['libro'=>$libro]);
    }

    public function update(Request $request,$id){
        $libro = libros::find($id);
        $libro -> title = $request -> title;
        $libro -> author_name = $request -> author_name;
        $libro -> isbn = $request -> isbn;
        $libro -> published_year = $request -> published_year;
        $libro -> save();
        return redirect()->route('biblioteca.index');
    }

    public function show($libro, $category=null){
        return view('show', compact('libro','category'));
    }

    public function destroy ($id){
        $libro = libros::find($id);
        $libro -> delete();
        return redirect() -> route ('biblioteca.index');
    }
}
