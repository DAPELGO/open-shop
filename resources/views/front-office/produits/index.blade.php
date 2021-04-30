<x-master-layout>

    <div class="container">


        <div class="row">

            <div class="col-md-12">

                <h1 class="text-center mt-2">Tous nos Produits </h1>
                <hr>
                <h6 class="text-center">Nous avons {{  nb_produit(1) }} {{ format_number(111111111) }}</h6>

            </div>
            

        </div>

        <div class="row">

            <div class="col-md-12">

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
            
            
                @if(Auth::user() != null && Auth::user()->isAdmin())
                    <div class="">
                        <a class="btn btn-primary btn-sm" href="{{ route('produits.create') }}"><i class="fas fa-plus">Ajouter</i></a>
                    </div> 
                @endif
                

                
            
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>Designation</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($produits as $produit)
                        
                        <tr>
                            <td scope="row">{{ $produit->designation }}</td>

                            <td>{{ format_number($produit->prix) }} FCFA</td>

                            <td>{{ $produit->quantite }}</td>

                            <td>{{ $produit->description }}</td>

                            <td class="d-flex">
                                @if(Auth::user() != null && Auth::user()->isAdmin())
                                <a class="btn btn-primary btn-sm mr-2" href="{{ route('produits.edit', $produit) }}"><i class="fas fa-edit "></i></a>                               

                                <a onclick="event.preventDefault(); if(confirm('Etes vous sur de cette supression?')) document.getElementById('{{ $produit->id }}').submit()" class="btn btn-danger btn-sm mr-2" href=""><i class="fa fa-trash"></i></a>

                                <form style="display:none" id="{{ $produit->id }}" method="post" action="{{ route('produits.destroy', $produit) }}">

                                    @csrf

                                    @method('DELETE');
                                
                                </form>
                                @endif
                                <a class="btn btn-warning btn-sm mr-2" href="{{ route('produits.show', $produit) }}"><i class="fa fa-eye"></i></a>               

                                
                                {{-- <a class="btn btn-primary btn-sm mr-2" href="#">Modifier</a> --}}

                                {{-- <a class="btn btn-danger btn-sm" href="#">Supprimer</a> --}}
                            </td>
                            <td>

                            </td>
                        </tr>
                        
                        @endforeach                    
                        
                    </tbody>
                </table>
                <div class="row d-flex justify-content-center mt-5">

                    <div class="">

                        {{ $produits->links() }}

                    </div>
                </div>

            </div>

        </div>


    </div>

    
</x-master-layout>