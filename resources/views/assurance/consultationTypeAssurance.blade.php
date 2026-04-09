@extends('layouts.default')

@section('title')
<h1> Les Assurances </h1>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-8 offset-2">
        
        @foreach ($collectionAssurance as $AssuranceCourante)
            <div class="card mb-3">  
                
                <div class="card-header bg-info text-white">
                    <strong>{{ $AssuranceCourante->getnom() }}</strong>
                </div>
                
                <div class="card-body">
                    <p>
                        <strong>Description :</strong><br>
                        {{ $AssuranceCourante->getDescription() }}
                    </p>
                </div>
                
            </div> @endforeach

    </div>
</div>
@endsection