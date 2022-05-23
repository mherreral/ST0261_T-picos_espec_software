<!-- Authors: Manuela Herrera López -->
@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="row">
        @foreach ($viewData['wishlists'] as $wishlist)
            <div class="col-md-4 col-lg-3 mb-2">
                <div class="card">
                    <div class="card-body text-center">
                        <a href="{{ route('user.wishlist.show', ['id' => $wishlist->getId()]) }}"
                            class="btn bg-primary text-white">{{ $wishlist->getName() }}</a>
                    </div>
                </div>
            </div>
        @endforeach
        <div><a href="{{ route('user.wishlist.create') }}"><button
                    class="btn bg-primary text-white">{{ __('messages.wishlist.create') }}</button></a>
        </div>
    </div>
@endsection
