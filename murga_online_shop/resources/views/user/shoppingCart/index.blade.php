@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="card">
        <div class="card-header">
            <b>{{ __('messages.shoppingCart.wishlists') }}</b>
        </div>
        <div class="card-body">
            @foreach ($viewData['wishlists'] as $wishlist)
                <p style="text-align:center"><b>{{ $wishlist->getName() }}</b></p>
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('messages.shoppingCart.wishlists.item.name') }}</th>
                            <th scope="col">{{ __('messages.shoppingCart.wishlists.item.quantity') }}</th>
                            <th scope="col">{{ __('messages.shoppingCart.wishlists.item.total') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wishlist['items'] as $item)
                            <tr>
                                <td>{{ $item->liquor->getLiquorType() }} {{ $item->liquor->getBrand() }}</td>
                                <td>{{ $item->getQuantity() }}</td>
                                <td>${{ $item->getSubtotal() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="text-end">
                        <a class="btn btn-outline-secondary mb-2"><b>{{ __('messages.shoppingCart.wishlists.total') }}</b>
                            ${{ $viewData['total'] }}</a>
            @endforeach
            @if (count($viewData['wishlists']) > 0)
                <a href="{{ route('user.shoppingCart.purchase') }}"
                    class="btn bg-primary text-white mb-2">{{ __('messages.shoppingCart.purchase') }}</a>
                <a href="{{ route('user.shoppingCart.delete') }}">
                    <button class="btn btn-danger mb-2">
                        {{ __('messages.shoppingCart.delete') }}
                    </button>
                </a>
            @endif
        </div>
    </div>
    </div>
    </div>
@endsection
