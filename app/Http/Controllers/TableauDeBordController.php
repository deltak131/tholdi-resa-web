<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Propel\Runtime\Propel;

class TableauDeBordController extends Controller
{
    public function nombreDeReservationParMois(Request $request) {
     $utilisateur = $request->session()->get('utilisateur');
     $codeUtilisateur = $utilisateur->getCodeutilisateur();
     $pdo = Propel::getWriteConnection(\App\Http\Model\Map\ReservationTableMap::DATABASE_NAME);
     $sql = "select COUNT(DATE_FORMAT(`dateDebutReservation`, '%m-%Y')) as nbReservationParMoisPourUnUtilisateur,
    DATE_FORMAT(`dateDebutReservation`, '%m-%Y') as moisAnneeDeReservation
    from reservation rs
    join  utilisateur u on u.codeUtilisateur = rs.codeUtilisateur
    where u.codeUtilisateur = :codeUtilisateur
    group by DATE_FORMAT(`dateDebutReservation`, '%m-%Y')";

   $pdoStatement = $pdo->prepare($sql);
   $pdoStatement->execute(array(':codeUtilisateur' => $codeUtilisateur));
    $data = $pdoStatement->fetchAll(\PDO::FETCH_ASSOC);
        
    return view('tableauDeBord.nombreDeReservationParMois',
                ['dataJson'=> json_encode($data)]
        );
    }
}

