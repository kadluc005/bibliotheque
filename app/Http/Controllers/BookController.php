<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrow;


class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', ['book' => $book]);
    }

    public function borrow(Request $request, $id)
    {
        // Validation des données du formulaire
        $request->validate([
            'return_date' => 'required|date',
            'borrow_date' => 'required|date',
        ]);

        // Logique pour traiter l'emprunt du livre
        Borrow::create([
            'book_id' => $id,
            'borrowed_at' => $request->input('borrow_date'),
            'due_at' => $request->input('return_date'),
            'user_id' => auth()->id(), // Assurez-vous que l'utilisateur est authentifié
        ]);

        return redirect()->route('books.show', ['id' => $id])->with('success', 'Livre emprunté avec succès !');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $books = Book::where('title', 'LIKE', "%$query%")
                    ->orWhere('author', 'LIKE', "%$query%")
                    ->get();

        return view('books.index', compact('books'));
    }
}
