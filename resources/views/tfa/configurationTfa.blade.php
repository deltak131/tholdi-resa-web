@extends('layouts.cybersecurite')

@section('content')

Configuration de votre second facteur d'authentification via une application TOTP
Depuis votre application TOTP   (freeOTP, Google Authenticator etc.)

 <img src="{{ asset('images/xxxxxx.png') }}" id="logoImg"  />
      
 Configurer votre compte en scannant le code-barres ci-dessous 
                    
 <img src="{{ $QR_Image }}" id="logoImg"  />
                
Une fois  votre compte TOTP configuré, cliquez sur continuer
           
<form class="form-horizontal" method="GET" action="{{ route('r-verificationTfa') }}">
         {{ csrf_field() }}
                <button type="submit" class="btn btn-success">
                    Continuer
                </button>
</form>  
@endsection