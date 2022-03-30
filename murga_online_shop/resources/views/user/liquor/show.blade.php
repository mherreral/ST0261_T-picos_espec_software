<!-- Authors: Manuela Herrera López -->
@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ $viewData['liquor']->getImage() }}" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $viewData['liquor']->getLiquorType() }} {{ $viewData['liquor']->getBrand() }}
                    </h5>
                    <p class="card-text">{{ __('messages.liquor.price') }}{{ $viewData['liquor']->getPrice() }}</p>
                    <p class="card-text">
                        {{ __('messages.liquor.millilietrs') }}{{ $viewData['liquor']->getMilliliters() }}ml</p>
                    <p class="card-text">
                        {{ __('messages.liquor.presentation') }}{{ $viewData['liquor']->getPresentation() }}</p>
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
    <a
        href="{{ route('user.comment.create', $viewData['liquor']->getId()) }}"><button>{{ __('messages.comment.createComments') }}</button></a>
    @if (count($viewData['liquor']['comments']) > 0)
        </div>
        <div class="row justify-content-center">
            <div class="col-md-7">
                <ul class="list-group">
                    @foreach ($viewData['liquor']['comments'] as $comment)
                        <li class="list-group-item mb-3 d-flex flex-column">
                            <div class="score">
                                @for ($i = 0; $i < $comment->getScore(); $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-star-fill text-primary" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>
                                @endfor
                            </div>
                            {{ $comment->getDescription() }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
@endsection
