@extends('layouts.app')

@section('page-title', 'Prodotti')

@section('main-content')
<h1>
    Prodotti
</h1>

<div class="my-3">
    <a href="{{ route('products.create') }}" class="btn btn-success w-100">
        + Aggiungi
    </a>
</div>

<div class="my-3">
    <form action="{{ route('products.index') }}" method="GET">

        <div class="row">
            <div class="col">
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ request()->input('name') }}"
                    placeholder="Cerca per nome...">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">
                    Cerca
                </button>
            </div>
        </div>

    </form>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Quantità</th>
            <th scope="col">Prezzo</th>
            <th scope="col">Visibile</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>€ {{ number_format($product->price, 2, ',', '.') }}</td>
                <td>
                    @if ($product->visible)
                        <strong class="text-success">
                            SI
                        </strong>
                    @else
                        <strong class="text-danger">
                            NO
                        </strong>
                    @endif
                </td>
                <td>
                    <a href="{{ route('products.show', ['product' => $product->id]) }}" class="btn btn-primary btn-sm">
                        Vedi
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
