@extends('layouts.app')

@section('page-title', 'Crea prodotto')

@section('main-content')
<h1>
    Crea prodotto
</h1>

@if ($errors->any())
    <div class="my-3 alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.store') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Inserisci il nome del prodotto..." value="{{ old('name') }}">
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Prezzo</label>
        <input type="number" class="form-control" id="price" name="price" placeholder="Inserisci il prezzo del prodotto..." value="{{ old('price') }}">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="img" class="form-label">Immagine</label>
        <input type="text" class="form-control" id="img" name="img" placeholder="Inserisci l'immagine del prodotto...">
    </div>

    <div class="mb-3">
        <label for="quantity" class="form-label">Quantità</label>
        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Inserisci la quantità del prodotto...">
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">Categoria</label>
        <input type="text" class="form-control" id="category" name="category" placeholder="Inserisci la categoria del prodotto...">
    </div>

    <div class="mb-3">
        <label for="tags" class="form-label">Tag</label>
        <input type="text" class="form-control" id="tags" name="tags" placeholder="Inserisci i tag del prodotto..." aria-describedby="tags-help">
        <div id="tags-help" class="form-text">
            Inserisci tutti i tag separati da virgole (senza spazi tra di essi)
        </div>
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" value="1" id="visible" name="visible">
        <label class="form-check-label" for="visible">
            Visibile
        </label>
    </div>

    <div>
        <button type="submit" class="btn btn-success w-100">
            + Aggiungi
        </button>
    </div>

</form>
@endsection
