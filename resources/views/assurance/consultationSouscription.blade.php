@extends('layouts.default')

@section('title')
<h1 > Les Assurances Souscrite</h1>
@endsection

@section('content')



<div class="row justify-content-center">
    <div class="col-8 offset-2">
        @foreach ($collectionSouscription as $Assurance)
        <div class="card ">  
            <div class="card-header bg-info">
                <h4>
                    NUMERO DE RESERVATION : {{
                    $Assurance->getCodereservation()
                    }}
                </h4> 
                <h6>
                    EFFECTUEE LE : {{ 
                    $Assurance->getdateSouscription()->format('d/m/Y')
                    }}<br>

                </h6>
               
            </div>
            
        </div>
        <br>

        @endforeach
    </div>
</div>


@endsection