<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\TypeassuranceQuery;
use App\Http\Model\Typeassurance;
use App\Http\Model\ReservationQuery;
use App\Http\Model\Reservation;
use App\Http\Model\Souscriptionassurance;
use App\Http\Model\SouscriptionassuranceQuery;
use App\Http\Model\Utilisateur;
use Propel\Runtime\Collection\ObjectCollection;

class AssuranceController extends Controller
{
    
    public function souscrireAssurance() {
        $collectionAssurance = TypeassuranceQuery::create()->find();
        $collectionReservation = ReservationQuery::create()->find();
        return view('assurance.effectuerUneSouscription', [
            'collectionAssurance' => $collectionAssurance,
            'collectionReservation' => $collectionReservation
        ]);
    }
    
    public function consultationTypeAssurance() {
        
    $collectionAssurance = TypeassuranceQuery::create()
        ->orderById()   // optionnel, juste pour avoir un tri propre
        ->find();

    return view('assurance.consultationTypeAssurance', [
        'collectionAssurance' => $collectionAssurance
    ]);
        
    }
    
    public function ajouterSouscription(Request $request) {
        
        $codeAssurance = $request->input('codeAssurance');
        $codeReservation = $request->input('codeReservation');
        
        
        $souscriptionAssurance = new Souscriptionassurance();
        
        $souscriptionAssurance->setdateSouscription(date("Y-m-d H:i:s"));
        $souscriptionAssurance->setidTypeAssurance($codeAssurance);
        $souscriptionAssurance->setcodeReservation($codeReservation);

        $souscriptionAssurance->save();
        
//        $view = view('assurance.consultationSouscription',
//                ['souscriptionAssurance' => $souscriptionAssurance],
        return redirect()->action([AssuranceController::class, 'consultationSouscription']
                
        );
    }    
    
    public function consultationSouscription(Request $request) {
        
        $collectionSouscription = SouscriptionassuranceQuery::create()
                ->leftJoinWithTypeassurance()
                ->leftJoinWithReservation()                
                ->useReservationQuery()
                ->leftJoinWithUtilisateur()
                ->filterByUtilisateur($request->session()->get('utilisateur'))
                ->enduse()
                ->find();
         
        
 
       $view = view('assurance.consultationSouscription',
                ['collectionSouscription' => $collectionSouscription],
        );
        return $view;
        
    }
    
}
