<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Model\UtilisateurQuery;
use App\Http\Model\Utilisateur;
use RobThree\Auth\TwoFactorAuth;
use RobThree\Auth\Providers\Qr\QRServerProvider;

class AuthentificationController extends Controller
{
    public function authentificationCompteUtilisateur(Request $request) {
        $identifiant = $request->post("identifiant");
        $password = $request->post("password");

        /** @var  Utilisateur $compteExistant  */
        $compteExistant = UtilisateurQuery::create()
                ->findOneByIdentifiant($identifiant);
        if (Hash::check($password, $compteExistant->getPassword())) {
            $request->session()->put('connected');
            $request->session()->put('utilisateur', $compteExistant);
            
            if ($compteExistant->getTotpSecret() == NULL) {
                return $this->configurationTFA($request);
            } else {
                return view('tfa.verificationTfa');
            }
        }
        return redirect()->route('r-accueil');
    }
    
    public function configurationTFA(Request $request) {

        $tfa = new TwoFactorAuth(new QRServerProvider());
        $totpSecret = $tfa->createSecret();
        /** @var  Utilisateur $compteUtilisateur  */
        $compteUtilisateur = $request->session()->get('utilisateur');
        
        $compteUtilisateur->setTotpSecret($totpSecret);
        $compteUtilisateur->save();

        $qrCode = $tfa->getQRCodeImageAsDataUri(config('app.name'), $totpSecret);

        return view('tfa.configurationTfa',
                ['QR_Image' => $qrCode, 'secret' => $compteUtilisateur->getTotpSecret()]);
    }
    
    public function verificationTfa(Request $request) {
        $compteUtilisateur = $request->session()->get('utilisateur');
        /** @var  Utilisateur $compteUtilisateur  */
        $totpSecret = $compteUtilisateur->getTotpSecret();
        $one_time_password = $request->input('one_time_password');
        $tfa = new TwoFactorAuth(new QRServerProvider());
        
        $result = $tfa->verifyCode($totpSecret, $one_time_password);
        if($result==false){
            $request->session()->flush();
        }
        return redirect()->route('r-accueil');
    }
    
    public function nouvelleConfiguration(Request $request)
    {
        $compteUtilisateur = $request->session()->get('utilisateur');
        $compteUtilisateur->setTotpSecret('null');
        $compteUtilisateur->save();
        return $this->configurationTFA($request);
    }
    
    public function deconnexion(Request $request)
    {
       $request->session()->flush();
       return redirect()->route('r-accueil');
    }
}