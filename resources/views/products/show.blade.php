@extends('layouts.app')

@section('page-title', $product->name)

@section('main-content')
<h1>
    {{ $product->name }}
</h1>

<div class="card">
    <div class="card-body">
        <ul>
            <li>
                Prezzo: € {{ number_format($product->price, 2, ',', '.') }}
            </li>
            <li>
                Quantità: {{ $product->quantity }}
            </li>
            <li>
                Categoria: {{ $product->category }}
            </li>
            <li>
                Tag:

                <div>
                    <ul>
                        @foreach (json_decode($product->tags, true) as $tag)
                            <li>
                                {{ $tag }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>
            <li>
                @if ($product->visible)
                    <strong class="text-success">
                        SI
                    </strong>
                @else
                    <strong class="text-danger">
                        NO
                    </strong>
                @endif
            </li>
        </ul>

        <p>
            {{ $product->description }}
        </p>
    </div>
    <img src="{{ $product->img }}" alt="{{ $product->name }}" class="card-img-bottom">
</div>
@endsection
