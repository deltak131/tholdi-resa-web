@extends('layouts.default')

@section('title')
<h1 > Vos réservations </h1>
@endsection

@section('content')



@if (count($collectionReservation)>0)
<div class="row justify-content-center">
    <div class="col-8 offset-2">
        @foreach ($collectionReservation as $reservationCourante)
        <div class="card ">  
            <div class="card-header bg-info">
                <h4>
                    REFERENCE RESERVATION : {{
                    $reservationCourante->getReferencereservation()
                    }}
                </h4> 
                <br>
                <h5>
                    NUMERO DE RESERVATION : {{
                    $reservationCourante->getCodereservation()
                    }}
                </h5>
                <h6>
                    EFFECTUEE LE : {{ 
                    $reservationCourante->getDatereservation()->format('d/m/Y')
                    }}<br>

                </h6>
               
            </div>
            <div class="card-body ">
                <p>
                    MISE A DISPOSITION :
                    {{ 
                     
                        $reservationCourante
                                ->getVilleRelatedByCodevillemisedispo()
                                ->getNomville()
                        
                    }}
                    le {{ $reservationCourante->getDatefinreservation()->format('d/m/Y') }}
                    <br>
                    RESTITUTION :
                    {{ 
                     $reservationCourante
                                ->getVilleRelatedByCodevillemisedispo()
                                ->getNomville()
                        
                    }}
                    le {{ $reservationCourante->getDatefinreservation()->format('d/m/Y') }}
                    <br>
                    commentaire :
                    {{ 
                     $reservationCourante
                                ->getcommentaire()
                                
                        
                    }}
                    <br>
                    type de transit :
                    {{ 
                     $reservationCourante
                                ->gettransit()
                                
                        
                    }}
                    
                    <br>
                
                    
                </p>
                <table class="table table-sm table-striped">  
                    <thead class="thead-dark">
                        <tr>
                            <th>Type de container</th>
                            <th>Quantité</th>
                        </tr> 
                    </thead>

                    <tbody>
                        @php $quantiteTotalReserver = 0; @endphp

                        @foreach ($reservationCourante->getReservers() as $reserver)
                        <tr>
                            <td>{{ $reserver->getTypecontainer()->getLibelletypecontainer() }}</td>
                            <td>{{ $reserver->getQtereserver() }}</td>
                        </tr>  

                        @php
                            $quantiteTotalReserver += $reserver->getQtereserver();
                        @endphp

                        @endforeach
                    </tbody>
                </table>

                <form action="{{ route('r-creeDevis') }}" method="post">
                    @csrf 

                    <input type="hidden" name="codeReservation" value="{{ $reservationCourante->getCodereservation() }}" />
                    <input type="hidden" name="qteReserver" value="{{ $quantiteTotalReserver }}" />

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary btn-lg">Générer le devis global</button>
                    </div>
                </form>
            </div>
        </div>
        <br>

        @endforeach
    </div>
</div>

@endif

@endsection