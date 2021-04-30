@csrf


<div class="form-group">

  <label for="designation">Designation</label>

  <input value="{{ old('designation') ?? $produit->designation}}" type="text" name="designation" id="designation" class="form-control" placeholder="Designation" aria-describedby="helpId" required>

  @error('designation')              
  
  <small class="text-danger">{{ $message }}</small>

  @enderror

</div>

<div class="form-group">

  <label for="">Prix</label>

  <input value="{{ old('prix') ?? $produit->prix }}" type="text" name="prix" id="prix" class="form-control" placeholder="Prix" aria-describedby="helpId" required>

  @error('prix')              
  
  <small class="text-danger">{{ $message }}</small>

  @enderror

</div>

<div class="form-group">

  <label for="">Quantite</label>                

  <input value="{{ old('quantite') ?? $produit->quantite }}" type="text" name="quantite" id="quantite" class="form-control" placeholder="" aria-describedby="helpId">

  @error('quantite')              
  
  <small class="text-danger">{{ $message }}</small>

  @enderror

</div>

  <div class="form-group">

    <label for="">Categorie</label>

    <select class="form-control" name="category_id" id="category">

        @foreach($categories as $categorie)

            <option {{ $categorie->id == $produit->category_id ? 'selected':"" }} value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>

         @endforeach
      
    </select>

    @error('category_id')              
  
  <small class="text-danger">{{ $message }}</small>

  @enderror

  </div>

  <div class="form-group">

    <label for="">Description</label>

    <textarea value="{{ old('description') ??$produit->description }}" class="form-control" name="description" id="description" rows="3">{{ $produit->description }}</textarea>

@error('description')              
  
  <small class="text-danger">{{ $message }}</small>

@enderror

  </div>

  <div class="form-group">

    <label for=""></label>

    <input type="file" class="form-control-file" name="image" id="image" placeholder="" aria-describedby="fileHelpId">

    @error('image')              
  
        <small class="text-danger">{{ $message }}</small>

    @enderror
    
  </div>
  
  <button type="submit" class="btn btn-primary btn-block btn-lg mt-4">Valider</button>                  
  

</div>
