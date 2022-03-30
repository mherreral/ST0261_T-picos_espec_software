<!-- Authors: Ana Arango -->
@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('/img/' . $viewData['liquor']->getImage()) }}" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $viewData['liquor']->getLiquorType() }} {{ $viewData['liquor']->getBrand() }}
                    </h5>
                    <p class="card-text">{{ __('messages.liquor.price') }}{{ $viewData['liquor']->getPrice() }}</p>
                    <p class="card-text">
                        {{ __('messages.liquor.milliliters') }}{{ $viewData['liquor']->getMilliliters() }}ml</p>
                    <p class="card-text">
                        {{ __('messages.liquor.presentation') }}{{ $viewData['liquor']->getPresentation() }}</p>
                </div>
            </div>
        </div>
    </div>
    <form method="post" action="{{ route('admin.liquor.delete', ['id' => $viewData['liquor']->getId()]) }}">
        @csrf
        <input class="btn btn-outline-danger" type="submit" value="{{ __('messages.admin.delete.liquor') }}">
    </form>
    <a
        href="{{ route('admin.liquor.edit', $viewData['liquor']->getId()) }}"><button>{{ __('messages.admin.update.liquor') }}</button></a>

@endsection
