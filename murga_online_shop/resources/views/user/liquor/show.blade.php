@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('/storage/' . $viewData['liquor']->getImage()) }}" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $viewData['liquor']->getLiquorType() }} {{ $viewData['liquor']->getBrand() }}
                        (${{ $viewData['liquor']->getPrice() }})
                    </h5>
                    <p class="card-text">{{ $viewData['liquor']->getMilliliters() }}</p>
                    <p class="card-text">{{ $viewData['liquor']->getPresentation() }}</p>
                    <p class="card-text">
                    <form method="POST" action="{{ route('user.wishlist.add', ['id' => $viewData['liquor']->getId()]) }}">
                        <div class="row">
                            @csrf
                            <div class="col-auto">
                                <div class="input-group col-auto">
                                    <div class="input-group-text">{{ __('messages.liquor.quantity') }}</div>
                                    <input type="number" min="1" max="10" class="form-control quantity-input"
                                        name="quantity" value="1">
                                    <div class="input-group-text">{{ __('messages.liquor.wishlist') }}</div>
                                    <select name="wishlist">
                                        @foreach ($viewData['wishlists'] as $wishlist)
                                            <option value="{{ $wishlist->getId() }}">{{ $wishlist->getName() }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="btn bg-primary text-white"
                                    type="submit">{{ __('messages.wishlist.add') }}</button>
                            </div>
                        </div>
                    </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
