<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Borrow;

class BorrowController extends Controller
{
    public function index()
    {
        // $borrows = Borrow::all();
        // return view('borrows.index', compact('borrows'));
        $user = Auth::user();

        // Récupérer les emprunts de l'utilisateur connecté
        $borrows = $user->borrows;

        // Retourner la vue avec les emprunts de l'utilisateur connecté
        return view('borrows.index', compact('borrows'));
    }
}
