<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return "<h1>Ini Home!</h1>";
});

// Route::get('/about', function () {
//     echo "<h1 style='text-align: center'><u>Tentang saya</u></h1>";
//     echo "<p>Ini website aku. <i>Never stop learning</i>. <strong>Jangan lupa tidur</strong>.</p>";
// });

Route::get('/salam/{nama}', function ($nama) {
    echo "<h2>Good day, $nama!</h2>";
});

Route::get('/produk/{nama?}/{qty?}', function ($nama = "N/A", $qty = 0) {
    echo "<p>Jual <strong>$nama</strong>. Stok saat ini: $qty</p>";
});

Route::get('users/{id?}', function ($id = -1) {
    return "Displaying user with ID: $id";
})->where('id', '[0-9]+');

// Route::get('/hubungi-kami', function () {
//     return '<h3>Hubungi kami</h3>';
// });

// Route::redirect('/contact-us', '/hubungi-kami', 301);


Route::fallback(function () {
    return "Wah kamu nyasar, turn back!";
});

Route::get('/', function () {
    return view('landing');
});

Route::view('/', 'landing');

Route::get('/about', function () {
    $title = 'About Us';
    $description = 'Blogging is website for sharing your thoughts and ideas with the world.';
    $button = '<a class="btn btn-lg btn-secondary" href="/">Back to Landing Page</a>';
    return view('about', compact('title', 'description', 'button'));
});

Route::get('/about', function () {
    $title = 'About Us';
    $description = 'Blogging is website for sharing your thoughts and ideas with the world.';
    $button = '<a class="btn btn-lg btn-secondary" href="/">Back to Landing Page</a>';

    $sponsors = [
        [
            "name" => "Google",
            "image" => "https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/2008px-Google_%22G%22_Logo.svg.png",
            "link" => "https://www.google.com"
        ],
        [
            "name" => "STMIK LIKMI",
            "image" => "https://likmi.ac.id/wp-content/uploads/2018/09/Logo200.png",
            "link" => "https://likmi.ac.id"
        ],
        [
            "name" => "KFC",
            "image" => "https://assets.stickpng.com/images/58429977a6515b1e0ad75ade.png",
            "link" => "https://kfcku.com/"
        ],
        [
            "name" => "Coca Cola",
            "image" => "https://companieslogo.com/img/orig/KO-b23a2a5e.png?t=1684129869",
            "link" => "https://www.coca-cola.com/"
        ],
        [
            "name" => "Youtube",
            "image" => "https://img.freepik.com/premium-vector/red-youtube-logo-social-media-logo_197792-1803.jpg?w=2000",
            "link" => "https://about.youtube//"
        ],
        [
            "name" => "Pepsi",
            "image" => "https://seeklogo.com/images/P/pepsi-logo-94D7DEF922-seeklogo.com.png",
            "link" => "https://www.pepsi.com/"
        ]
    ];

    $faqs = [
        [
            "question" => "What are the benefits of sponsoring a blogging website?",
            "answer" => "When your brand is featured on our popular website, it will be seen by a large audience of potential customers.",
        ],
        [
            "question" => "How much does it cost to sponsor our website?",
            "answer" => "The cost of sponsorship depends on the size of your brand and the length of time you want to sponsor us.",
        ],
        [
            "question" => "How long does it take to sponsor our website?",
            "answer" => "The length of sponsorship depends on the size of your brand and the length of time you want to sponsor us.",
        ],
        [
            "question" => "How do I sponsor your website?",
            "answer" => "Please contact us using the form on this page and we will get back to you with more details.",
        ],
        [
            "question" => "How do I contact you?",
            "answer" => "Please contact us using the form on this page and we will get back to you with more details.",
        ]
    ];

    return view('about', compact('title', 'description', 'button', 'sponsors', 'faqs'));
});

use App\Http\Controllers\LandingController;

Route::get('/', LandingController::class);


use App\Http\Controllers\AboutController;

Route::get('/about', [AboutController::class, 'index']);

use App\Http\Controllers\ContactController;

Route::get('/contact-us', [ContactController::class, 'index']);

Route::get('/contact-us', [ContactController::class, 'index'])->name('contact-us.index');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact-us.store');

use App\Http\Controllers\ArticleController;
Route::resource('articles', ArticleController::class);
