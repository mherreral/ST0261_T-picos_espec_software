<!-- Authors: Manuela Herrera López -->
@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        <b> {{ $viewData['wishlist']->getName() }} </b>
                    </h5>
                    @foreach ($viewData['wishlist']->items as $item)
                        - {{ __('messages.wishlist.liquor') }} {{ $item->liquor->getLiquorType() }}
                        {{ $item->liquor->getBrand() }} -
                        {{ __('messages.wishlist.liquor.quantity') }} {{ $item->getQuantity() }}<br />
                    @endforeach
                    @if (count($viewData['wishlist']->items) > 0)
                        <form method="POST"
                            action="{{ route('user.shoppingCart.add', ['id' => $viewData['wishlist']->getId()]) }}">
                            @csrf
                            <div>
                                <button name="addToCart">{{ __('messages.wishlist.toCart') }}</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
