@extends('layouts.app')

@section('page-title', 'Prodotti')

@section('main-content')
<h1>
    Prodotti
</h1>

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
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
