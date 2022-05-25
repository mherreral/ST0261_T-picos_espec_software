<!-- Authors: Manuela Herrera López -->
@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="row">
        <form method="POST" action="{{ route('user.liquor.search') }}">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control" name="searchBar" placeholder={{ __('messages.liquor.search') }}>
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
                <select name="orderBy" class="btn btn-primary">
                    <option value='asc'>{{ __('messages.liquor.priceASC') }}</option>
                    <option value='desc'>{{ __('messages.liquor.priceDESC') }}</option>
                </select>
                <select name="liquorType" class="btn btn-primary">
                    <option value='NA'>{{ __('messages.liquor.select') }}</option>
                    @foreach ($viewData['liquorTypes'] as $liquor)
                        <option value='{{ $liquor->getLiquorType() }}'>{{ $liquor->getLiquorType() }}</option>
                    @endforeach
                </select>
                <input type="submit" class="btn btn-primary" value="{{ __('messages.liquor.send') }}" />
            </div>
        </form>
        @if (session()->has('alert'))
            <ul class="alert alert-success list-unstyled">
                <li>{{ session()->get('alert') }}</li>
            </ul>
        @endif
        @foreach ($viewData['liquors'] as $liquor)
            <div class="col-md-4 col-lg-3 mb-2">
                <div class="card">
                    <img src="{{ asset('/img/' . $liquor->getImage()) }}" class="card-img-top img-card">
                    <div class="card-body text-center">
                        <a href="{{ route('user.liquor.show', ['id' => $liquor->getId()]) }}"
                            class="btn bg-primary text-white">{{ $liquor->getLiquorType() }}
                            {{ $liquor->getBrand() }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
