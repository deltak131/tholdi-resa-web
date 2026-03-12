@extends('layouts.default')

@section('title')
<h1 > Les Assurances </h1>
@endsection

@section('content')


<div class="row justify-content-center">
    <div class="col-8 offset-2">
        @foreach ($collectionAssurance as $AssuranceCourante)
        <div class="card ">  
            <div class="card-header bg-info">
                
               
            </div>
            <div class="card-body ">
                <p>
                    ID :
                    {{ 
                     
                        $AssuranceCourante
                                ->getnom()
                        
                    }}
                    
                    <br>
                    DESCR :
                    {{ 
                     $AssuranceCourante
                                ->getDescription()
                        
                    }}

                    
                    
                </p>
                
                        @endforeach
                
            </div>
        </div>
        <br>

    </div>
</div>
@endsection