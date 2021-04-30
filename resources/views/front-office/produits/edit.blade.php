<x-master-layout>

<div class="container">

    <div class="row">

        <div class="col-md-6 offset-3">

            <h1 class="text-center bg-danger pb-2 text-white" style="border-radius:10px">Modification d'un produit</h1>

        </div>

    </div>

    <div class="row">

        <div class="col-md-6 offset-md-3">

            <form method="post" action="{{ route('produits.update', $produit) }}">

              @method("PUT")

              @include('partials._produit-form')           


            </form>

        </div>

    </div>

    

</div>



</x-master-layout>