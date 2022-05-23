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
                    @foreach ($viewData['items'] as $item)
                        - {{ __('messages.wishlist.liquor') }} {{ $item->liquor->getLiquorType() }}
                        {{ $item->liquor->getBrand() }} -
                        {{ __('messages.wishlist.liquor.quantity') }} {{ $item->getQuantity() }}<br />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row g-1">
        <div class="col-md-8">
            @if (count($viewData['wishlist']->items) > 0)
                <form method="POST"
                    action="{{ route('user.shoppingCart.add', ['id' => $viewData['wishlist']->getId()]) }}">
                    @csrf
                    <div class="left-btn">
                        <button class="btn bg-primary text-white"
                            name="addToCart">{{ __('messages.wishlist.toCart') }}</button>
                    </div>
                </form>
            @endif
            <div class="right-btn">
                <form method="POST"
                    action="{{ route('user.wishlist.delete', ['id' => $viewData['wishlist']->getId()]) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">
                        {{ __('messages.wishlist.delete') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
