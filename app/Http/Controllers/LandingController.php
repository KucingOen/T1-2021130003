<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class LandingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
         //Ambil data artikel diurutkan berdasarkan tanggal terbaru. lalu tampilkan 7 artikel per halaman
         $articles = Article::query()->latest()->paginate(7);
         //Ambil artikel pertama dari hasil query diatas
        $featured = $articles->shift();
         return view('landing', compact('articles'));
    }
}
