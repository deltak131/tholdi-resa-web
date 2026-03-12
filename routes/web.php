<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TableauDeBordController;
use App\Http\Controllers\AssuranceController;

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

Route::get('/', function () {
    return view('accueil.welcome');
})->name('r-accueil');

Route::group(['prefix' => 'tableauDeBord'], function () {
    Route::get('nombreDeReservationParMois', [TableauDeBordController::class, 'nombreDeReservationParMois'])
            ->name('r-nombreDeReservationParMois');});

Route::post('/authentification', [AuthentificationController::class, 'authentificationCompteUtilisateur'])
        ->name('r-authentification');

Route::get('/deconnexion', [AuthentificationController::class, 'deconnexion'])
        ->name('r-Deconnexion');

Route::group(['prefix' => 'reservation'], function () {
    Route::get('saisirReservation', [ReservationController::class, 'saisirReservation'])
            ->name('r-saisirReservation');
    Route::post('ajouterReservation', [ReservationController::class, 'ajouterReservation'])
            ->name('r-ajouterReservation');
    Route::post('ajouterLigneReservation', [ReservationController::class, 'ajouterLigneDeReservation'])
            ->name('r-ajouterLigneReservation');
    Route::post('finaliserLaReservation', [ReservationController::class, 'finaliserLaReservation'])
            ->name('r-finaliserLaReservation');   
    Route::get('consulterLesReservations', [ReservationController::class, 'consulterLesReservations'])
            ->name('r-consulterLesReservations'); }
            );
            
Route::group(['prefix' => 'assurance'], function () {
    Route::get('consultationAssurance', [AssuranceController::class, 'consultationTypeAssurance'])
            ->name('r-consultationAssurance');
    Route::get('souscriptionAssurance', [AssuranceController::class, 'souscrireAssurance'])
            ->name('r-souscriptionAssurance');});
    Route::post('ajouterSouscription', [AssuranceController::class, 'ajouterSouscription'])
            ->name('r-ajouterSouscription');  
    Route::get('consultationSouscription', [AssuranceController::class, 'consultationSouscription'])
            ->name('r-consultationSouscription');  
    
/*route pour accéder au formulaire de saisie du code à usage unique*/
Route::get('/verificationTfa', function(){
    return view('tfa.verificationTfa');
})->name('r-verificationTfa');

/*route pour vérifier si le code à usage unique saisi est correct*/
Route::post('/verificationTfa', [AuthentificationController::class, 'verificationTfa'])
        ->name('r-verificationTfa');

/*route pour accéder au QrCode permettant de configurer son TOTP*/
Route::get('/configurationTfa', [AuthentificationController::class, 'configurationTfa'])
        ->name('r-configurationTfa');

Route::post('/nouvelleConfiguration', [AuthentificationController::class, 'nouvelleConfiguration'])
        ->name('r-nouvelleConfiguration');

Route::post('/reinitialiserTotp', [AuthentificationController::class, 'reinitialiserTotp'])
        ->name('r-reinitialiserTotp');

