@extends('layouts.default')

@section('title')
    <h1> Vos Devis </h1>
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-8 offset-2">
        
        @if (count($collectionDevis) > 0)
            
            @foreach ($collectionDevis as $devis)
            <div class="card mb-4 shadow-sm">  
                
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h4 class="m-0">DEVIS N° {{ $devis->getCodedevis() }}</h4>
                    <span class="badge badge-light">
                        Édité le {{ $devis->getDatedevis()->format('d/m/Y') }}
                    </span>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Volume :</strong> {{ $devis->getVolume() ?? 'Non renseigné' }}</p>
                            <p><strong>Nb de containers :</strong> {{ $devis->getNbcontainers() ?? 'En attente' }}</p>
                        </div>
                        <div class="col-md-6 text-right">
                            <h5 class="text-secondary">Montant total</h5>
                            @if($devis->getMontantdevis() != null)
                                <h3 class="text-success">{{ number_format($devis->getMontantdevis(), 2, ',', ' ') }} €</h3>
                            @else
                                <h4 class="text-warning">En cours de calcul...</h4>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-light">
                    @if($devis->getValider() == 1)
                        <strong class="text-success">✔ Devis validé</strong>
                    @else
                        <strong class="text-danger">En attente de validation</strong>
                    @endif
                </div>

            </div>
            @endforeach

        @else
            <div class="alert alert-info text-center mt-5">
                <h4>Vous n'avez aucun devis pour le moment.</h4>
                <p>Générez un devis depuis la page de consultation de vos réservations.</p>
            </div>
        @endif

    </div>
</div>

@endsection