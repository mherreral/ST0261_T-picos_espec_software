@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $viewData['wishlist']->getName() }}
                    </h5>
                    @foreach ($viewData['wishlist']->items as $item)
                        - {{ __('messages.wishlist.liquor') }} {{ $item->liquor->getName() }} -
                        {{ __('messages.wishlist.liquor.quantity') }} {{ $item->getQuantity() }}<br />
                    @endforeach
                    <div>
                        <a
                            href="{{ route('user.shoppingCart.add', ['id' => $viewData['wishlist']->getId()]) }}"><button>{{ __('messages.wishlist.wishlist.toCart') }}</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
