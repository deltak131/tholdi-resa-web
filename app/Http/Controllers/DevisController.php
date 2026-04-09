<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\Devis;
use App\Http\Model\DevisQuery;
use App\Http\Model\ReservationQuery;
use App\Http\Model\Reservation;

class DevisController extends Controller
{
    public function creeDevis(Request $request) {
        
        $codeReservation = $request->input('codeReservation');
        
        $dateDevis = now()->format('Y-m-d');
        $montantDevis = null;
        $volume = $request->input('qteReserver');
        $nbcontainer = null;
        $valider = 0;
        
        $unDevis = new Devis;
        
        $unDevis->setDatedevis($dateDevis);
        $unDevis->setMontantdevis($montantDevis);
        $unDevis->setVolume($volume);
        $unDevis->setNbcontainers($nbcontainer);
        $unDevis->setValider($valider);
        
        $unDevis->save();
        
        
        $uneReservation = ReservationQuery::create()->findPk($codeReservation);
        $codeDevis = $unDevis->getCodedevis();
        $uneReservation->setCodedevis($codeDevis);
        
        $uneReservation->save();
        
        return redirect()->action([DevisController::class, 'consulterDevis']);
        
    }
    
    public function consulterDevis(Request $request) {
        
        $compteUtilisateur = $request->session()->get('utilisateur');
        
        $collectionDevis = DevisQuery::create()
                ->useReservationQuery()
                    ->filterByUtilisateur($compteUtilisateur)
                ->endUse()
                ->find();
                
        return view('devis.consulterDevis', [
            'collectionDevis' => $collectionDevis
        ]);
    }
}
