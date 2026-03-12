@extends('layouts.default')

@section('title')
<h1 > Souscrire a une assurance </h1>
@endsection

@section('content')

<form action="{{ route("r-ajouterSouscription") }}"  method="post">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-5 offset-4  mb-4 ">
            <div class="card">
                <div class="card-header bg-info">
                    <h5>Selectionner les options de souscription</h5>
                </div>
                <div class="card-body">
                    <select class="custom-select" id="codeAssurance" name="codeAssurance">
                                @foreach($collectionAssurance as $Assurance) 
                                <option value="{{ $Assurance->getid() }}"> 
                                    {{$Assurance->getnom()}}
                                </option>
                                @endforeach 
                    </select>
                    <div class="row">
                        <div class="col mb-2">
                            <label class="control-label" for="dateFinReservation">sur la reservation :</label>
                        </div>
                        <div class="col mb-2">
                            <select class="custom-select" id="codeReservation" name="codeReservation">
                                @foreach($collectionReservation as $Reservation) 
                                <option value="{{ $Reservation->getcodeReservation() }}"> 
                                    {{$Reservation->getcodeReservation()}}
                                </option>
                                @endforeach 
                            </select>
                        </div>  
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">S
            <div class="col-5 offset-4 text-center">
                <button type="submit" id="ajouterSouscription" class="btn btn-primary btn-lg">Valider</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
        </div>
</form>

@endsection
