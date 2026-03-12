@extends('layouts.cybersecurite')

@section('content')

Authentification par mot de passe à usage unique
Démarrez votre application TOTP
Sélectionnez le compte TOTP associé à l'application Tholdi-resa
Saisissez le code à usage unique généré et validez

Assurez vous de valider votre code dans les 30 secondes qui suivent l'apparition de cette interface

<form class="form-horizontal" method="POST" action="{{ route('r-verificationTfa') }}">
       {{ csrf_field() }}
           <input id="one_time_password" type="number" class="form-control" name="one_time_password" required autofocus>
           <button type="submit" class="btn btn-primary">
               Validez votre code de sécurité
           </button>                               
</form>
<br>
<form class="form-horizontal" method="POST" action="{{ route('r-nouvelleConfiguration') }}">
         {{ csrf_field() }}
                <button type="submit" class="btn btn-success">
                    nouvelle config
                </button>
</form>  
  
@endsection