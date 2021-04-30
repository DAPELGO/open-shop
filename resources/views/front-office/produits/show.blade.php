<x-master-layout>

    <div class="container">

        <div class="row">

            @if(session('statut'))

                <div class="col-md-12">

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                    <strong>  {{ session('statut') }}</strong> 
                    
                    </div>  

                </div>                       

                
            @endif          

        </div>

        <div class="row">

            <div class="col-md-12"> 
                
                <div class="col-md-4 offset-4 ">
                
                <ul class="list-group">
                    <li class="list-group-item list-group-item-primary">Prix: {{ $produit->prix }}</li>
                    <li class="list-group-item list-group-item-warning">Quantite : {{ $produit->quantite }}</li>
                    <li class="list-group-item list-group-item-dark"> {{ $produit->description }}</li>
                </ul>
            </div>
                

            </div>

        </div>


    </div>

    
</x-master-layout>