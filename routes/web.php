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
Route::get('/admin/organizatori', [OrganizatorController::class, 'getOrganizatori'])->name('admin.organizatori');
Route::get('/admin/organizatori/dodavanje', [OrganizatorController::class, 'dodajOrganizatora'])->name('admin.organizatori.dodavanje');
Route::post('/admin/organizatori', [OrganizatorController::class, 'spasiOrganizatora'])->name('admin.organizatori.spasavanje');

/* Rute za pregled liste uloga, dodavanje uloge, pregled, uređivanje i brisanje uloga*/
Route::get('/admin/pozicije', [PozicijaController::class, 'getPozicije'])->name('admin.pozicije');
Route::get('/admin/pozicije/dodavanje', [PozicijaController::class, 'dodajPoziciju'])->name('admin.pozicije.dodavanje');
Route::post('/admin/pozicije', [PozicijaController::class, 'spasiPoziciju'])->name('admin.pozicije.spasavanje');

/* Rute za pregled liste trenera, dodavanje trenera, pregled, uređivanje i brisanje trenera*/
Route::get('/admin/treneri', [TrenerController::class, 'getTreneri'])->name('admin.treneri');
Route::get('/admin/treneri/dodavanje', [TrenerController::class, 'dodajTrenera'])->name('admin.treneri.dodavanje');
Route::post('/admin/treneri', [TrenerController::class, 'spasiTrenera'])->name('admin.treneri.spasavanje');

/* Rute za pregled liste treninga, dodavanje treninga, pregled, uređivanje i brisanje treninga*/
Route::get('/admin/treninzi', [TreningController::class, 'getTreninzi'])->name('admin.treninzi');
Route::get('/admin/treninzi/dodavanje', [TreningController::class, 'dodajTrening'])->name('admin.treninzi.dodavanje');
Route::post('/admin/treninzi', [TreningController::class, 'spasiTrening'])->name('admin.treninzi.spasavanje');
Route::delete('/admin/treninzi/{id}', [TreningController::class, 'obrisiTrening'])->name('admin.treninzi.obrisi');
Route::get('/admin/treninzi/{id}', [TreningController::class, 'showTrening'])->name('admin.treninzi.detalji');

/* Rute za pregled liste medija, dodavanje medija, pregled, uređivanje i brisanje kategorije*/
Route::get('/admin/kategorije', [KategorijaController::class, 'getKategorije'])->name('admin.kategorije');
Route::get('/admin/kategorije/dodavanje', [KategorijaController::class, 'dodajKategoriju'])->name('admin.kategorije.dodavanje');
Route::post('/admin/kategorije', [KategorijaController::class, 'spasiKategoriju'])->name('admin.kategorije.spasavanje');

/* Rute za pregled liste medija, dodavanje medija, pregled, uređivanje i brisanje medija*/
Route::get('/admin/mediji', [MedijController::class, 'getMediji'])->name('admin.mediji');
Route::get('/admin/mediji/dodavanje', [MedijController::class, 'dodajMedij'])->name('admin.mediji.dodavanje');
Route::post('/admin/mediji', [MedijController::class, 'spasiMedij'])->name('admin.mediji.spasavanje');

/* Rute za pregled liste partnera, dodavanje partnera, pregled, uređivanje i brisanje partnera*/
Route::get('/admin/partneri', [PartnerController::class, 'getPartneri'])->name('admin.partneri');
Route::get('/admin/partneri/dodavanje', [PartnerController::class, 'dodajPartnera'])->name('admin.partneri.dodavanje');
Route::post('/admin/partneri', [PartnerController::class, 'spasiPartnera'])->name('admin.partneri.spasavanje');

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
