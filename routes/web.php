<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\App;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\FilmController;

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
// ruta ne treba da bude u okviru grupisanih ruta, jer nam treba da ti linkovi budu dostupni i kada korisnik nije logovan
//obavezan parametar {locale} i njega hvatamo preko $locale
Route::get('/lang/{locale}', function (string $locale) {
    //App::setLocale($locale); ovo nam nije potrebno, imamo midlwer
    session(['locale' => $locale]); // vrednost dobjena get metodom i onda imamo mogucnost da pomocu midlwera izvucemo tu vrednost iz sesije u localization.php

    //povratak na prethodnu stranicu
    return redirect()->back(); //kad promenimo jezik, redirect ponovo prolazi kroz sve fajlove i konfig i tu u konfigu defaultna podesavanja nam ne dozvoljavaju promenu i zato moramo da podignemo midlwer
})->whereIn('locale', ['en', 'sr'])->name('lang');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //prikaz svih podataka
    Route::get('/genre', [GenreController::class, 'index'])->name('genre.index');

   //prikaz forme za unos
   Route::get('/genre/create', [GenreController::class, 'create'])->name('genre.create');

   //validacija podataka i upis novog reda u tabelu
   Route::post('/genre', [GenreController::class, 'store'])->name('genre.store');

   //forma za izmenu podatka
   Route::get('/genre/{genre}/edit', [GenreController::class, 'edit'])->name('genre.edit');

   //izmena postojećeg podatka
   Route::put('/genre/{genre}', [GenreController::class, 'update'])->name('genre.update');

    // brisanje podataka
   Route::delete('/genre/{genre}', [GenreController::class, 'destroy'])->name('genre.destroy');

   //Route::get('/film/{film}', [FilmController::class, 'show'])->name('film.show');

       //definisanje svih 7 ruta za kontroler
       Route::resource('film', FilmController::class);

       Route::post('/film', [FilmController::class, 'index'])->name('film.index');


    Route::get('/person', [PersonController::class, 'index'])->name('person.index');

    Route::get('/person/create', [PersonController::class, 'create'])->name('person.create');

    Route::post('/person', [PersonController::class, 'store'])->name('person.store');

    Route::get('/person/{person}/edit', [PersonController::class, 'edit'])->name('person.edit');

    Route::put('/person/{person}', [PersonController::class, 'update'])->name('person.update');

    Route::delete('/person/{person}', [PersonController::class, 'destroy'])->name('person.destroy');

    Route::get('/person/{person}', [PersonController::class, 'show'])->name('person.show');

});

require __DIR__.'/auth.php';

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
