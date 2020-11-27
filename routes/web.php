<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrijavaRegistracijaController;
use App\Http\Controllers\EdicijaController;
use App\Http\Controllers\IzjavaController;
use App\Http\Controllers\KategorijaController;
use App\Http\Controllers\MedijController;
use App\Http\Controllers\NovostController;
use App\Http\Controllers\OrganizatorController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PostignuceController;
use App\Http\Controllers\PozicijaController;
use App\Http\Controllers\PrijavaUcesnikaController;
use App\Http\Controllers\TrenerController;
use App\Http\Controllers\TreningController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/prijava', [PrijavaRegistracijaController::class, 'prijava'])->name('prijava');
Route::get('/registracija', [PrijavaRegistracijaController::class, 'registracija'])->name('registracija');


Route::get('/admin', [EdicijaController::class, 'getEdicije'])->name('admin');
Route::post('/admin', [EdicijaController::class, 'getEdicije'])->name('admin');

/* Rute za pregled liste edicija, dodavanje edicije, pregled, uređivanje i brisanje edicije*/
Route::get('/admin/edicije', [EdicijaController::class, 'getEdicije'])->name('admin.edicije');
Route::get('/admin/edicije/dodavanje', [EdicijaController::class, 'dodajEdiciju'])->name('admin.edicije.dodavanje');
Route::post('/admin/edicije', [EdicijaController::class, 'spasiEdiciju'])->name('admin.edicije.spasavanje');


/* Rute za pregled liste organizatora, dodavanje organizatora, pregled, uređivanje i brisanje organizatora*/
Route::Resource('/admin/organizatori', OrganizatorController::class);

/* Rute za pregled liste uloga, dodavanje uloge, pregled, uređivanje i brisanje uloga*/
Route::resource('/admin/pozicije', PozicijaController::class);
Route::get('/pozicije/search', [PozicijaController::class, 'search'])->name('admin.pozicije.search');

/* Rute za pregled liste trenera, dodavanje trenera, pregled, uređivanje i brisanje trenera*/
Route::get('/admin/treneri', [TrenerController::class, 'getTreneri'])->name('admin.treneri');
Route::get('/admin/treneri/dodavanje', [TrenerController::class, 'dodajTrenera'])->name('admin.treneri.dodavanje');
Route::post('/admin/treneri', [TrenerController::class, 'spasiTrenera'])->name('admin.treneri.spasavanje');

/* Rute za pregled liste treninga, dodavanje treninga, pregled, uređivanje i brisanje treninga*/
Route::get('/admin/treninzi', [TreningController::class, 'getTreninzi'])->name('admin.treninzi');
Route::get('/admin/treninzi/dodavanje', [TreningController::class, 'dodajTrening'])->name('admin.treninzi.dodavanje');
Route::post('/admin/treninzi', [TreningController::class, 'spasiTrening'])->name('admin.treninzi.spasavanje');
Route::delete('/admin/treninzi/{id}', [TreningController::class, 'obrisiTrening'])->name('admin.treninzi.obrisi');
Route::get('/admin/treninzi/uredjivanje/{id}', [TreningController::class, 'uredjivanje'])->name('admin.treninzi.uredjivanje');
Route::post('/admin/treninzi/uredjivanje/{id}', [TreningController::class, 'spasiPromjene'])->name('admin.treninzi.azuriranje');
Route::get('/admin/treninzi/{id}', [TreningController::class, 'showTrening'])->name('admin.treninzi.detalji');

/* Rute za pregled liste medija, dodavanje medija, pregled, uređivanje i brisanje kategorije*/
Route::get('/admin/kategorije', [KategorijaController::class, 'getKategorije'])->name('admin.kategorije');
Route::get('/admin/kategorije/dodavanje', [KategorijaController::class, 'dodajKategoriju'])->name('admin.kategorije.dodavanje');
Route::post('/admin/kategorije', [KategorijaController::class, 'spasiKategoriju'])->name('admin.kategorije.spasavanje');

/* Rute za pregled liste medija, dodavanje medija, pregled, uređivanje i brisanje medija*/
Route::get('/admin/mediji', [MedijController::class, 'getMediji'])->name('admin.mediji');
Route::get('/admin/mediji/dodavanje', [MedijController::class, 'dodajMedij'])->name('admin.mediji.dodavanje');
Route::post('/admin/mediji', [MedijController::class, 'spasiMedij'])->name('admin.mediji.spasavanje');
Route::get('/admin/mediji/uredjivanje/{id}', [MedijController::class, 'uredjivanje'])->name('admin.mediji.uredjivanje');
Route::post('/admin/mediji/uredjivanje/{id}', [MedijController::class, 'spasiPromjene'])->name('admin.mediji.azuriranje');
Route::delete('/admin/mediji/{id}', [MedijController::class, 'obrisiMedij'])->name('admin.mediji.obrisi');
Route::get('/admin/mediji/{id}', [MedijController::class, 'showMedij'])->name('admin.mediji.detalji');


/* Rute za pregled liste partnera, dodavanje partnera, pregled, uređivanje i brisanje partnera*/
Route::resource('admin/partneri', PartnerController::class);
Route::get('/partneri/search', [PartnerController::class, 'search'])->name('admin.partneri.search');

/* Rute za pregled liste novosti, dodavanje novosti, pregled, uređivanje i brisanje novosti*/
Route::get('/admin/novosti', [NovostController::class, 'getNovosti'])->name('admin.novosti');
Route::get('/admin/novosti/dodavanje', [NovostController::class, 'dodajNovost'])->name('admin.novosti.dodavanje');
Route::post('/admin/novosti', [NovostController::class, 'spasiNovost'])->name('admin.novosti.spasavanje');

/* Rute za pregled liste izjave, dodavanje izjave, pregled, uređivanje i brisanje izjave*/
Route::get('/admin/izjave', [IzjavaController::class, 'getIzjave'])->name('admin.izjave');
Route::get('/admin/izjave/dodavanje', [IzjavaController::class, 'dodajIzjavu'])->name('admin.izjave.dodavanje');
Route::post('/admin/izjave', [IzjavaController::class, 'spasiIzjavu'])->name('admin.izjave.spasavanje');

/* Rute za pregled liste izjave, dodavanje izjave, pregled, uređivanje i brisanje izjave*/
Route::get('/admin/postignuca', [PostignuceController::class, 'getPostignuca'])->name('admin.postignuca');
Route::get('/admin/postignuca/dodavanje', [PostignuceController::class, 'dodajPostignuce'])->name('admin.postignuca.dodavanje');
Route::post('/admin/postignuca', [PostignuceController::class, 'spasiPostignuce'])->name('admin.postignuca.spasavanje');

/* Rute za pregled liste prijava i bodovanje*/
Route::get('/admin/prijave', [PrijavaUcesnikaController::class, 'getPrijave'])->name('admin.prijave');
Route::get('/admin/prijave/bodovanje', [PrijavaUcesnikaController::class, 'bodujPrijavu'])->name('admin.prijave.bodovanje');
Route::post('/admin/prijave', [PrijavaUcesnikaController::class, 'spasiBodovanjePrjave'])->name('admin.prijave.spasavanje');

/* Ruta za pregled rang liste*/
Route::get('/admin/rang', [PrijavaUcesnikaController::class, 'getRang'])->name('admin.rang');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
