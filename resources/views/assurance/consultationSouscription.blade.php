@extends('layouts.default')

@section('title')
<h1> Les Assurances Souscrites </h1>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-8 offset-2">
        
        @foreach ($collectionSouscription as $Assurance)
        <div class="card mb-3">  
            
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">
                    NUMÉRO DE RÉSERVATION : {{ $Assurance->getCodereservation() }}
                </h5> 
            </div>
            
            <div class="card-body">
                <p class="mb-0">
                    <strong>EFFECTUÉE LE :</strong> 
                    {{ $Assurance->getdateSouscription()->format('d/m/Y') }}
                </p>
            </div>
            
        </div>
        @endforeach
        
    </div>
</div>
@endsection