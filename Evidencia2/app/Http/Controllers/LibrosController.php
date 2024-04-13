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

         $validateData=$request->validate([
             'title'=>'required|max:255',
             'author_name'=>'required',
             'isbn'=>'required',
             'published_year'=>'required'
         ]);

         $libro=new libros;
         $libro->title=$validateData['title'];
         $libro->author_name=$validateData['author_name'];
         $libro->isbn=$validateData['isbn'];
         $libro->published_year=$validateData['published_year'];

        // $libro = new libros;
        // $libro -> title = $request -> title;
        // $libro -> author_name = $request -> author_name;
        // $libro -> isbn = $request -> isbn;
        // $libro -> published_year = $request -> published_year;

        if($request->hasFile('image')){
            $imagePath= $request->file('image')->store('LibrosImages','public');
            //Esta linea obtiene el archivo enviado desde un formulario web y la guarda con el metodo store en el path storage/app/public/LibrosImages
            $libro->image_path=$imagePath;
        }
        $libro -> save(); //SQL: INSET INTO courses(title, description, ...)
        return redirect()->route('biblioteca.index');
    }

    public function edit($id){
        $libro=libros::find($id); //SELECT * VROM courses WHERE id=6 LIMIT 1;
        return view('edit', ['libro'=>$libro]);
    }

    public function update(Request $request,$id){
        $validateData=$request->validate([
            'title'=>'required|max:255',
            'author_name'=>'required',
            'isbn'=>'required',
            'published_year'=>'required',
            
        ]);

        $libro=libros::find($id);
        $libro->title=$validateData['title'];
        $libro->author_name=$validateData['author_name'];
        $libro->isbn=$validateData['isbn'];
        $libro->published_year=$validateData['published_year'];
        if($request->hasFile('image')){
            $imagePath= $request->file('image')->store('LibrosImages','public');
            //Esta linea obtiene el archivo enviado desde un formulario web y la guarda con el metodo store en el path storage/app/public/LibrosImages
            $libro->image_path=$imagePath;
        }
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
