@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="row">
        <form action="{{ route('user.liquor.search') }}" type="get" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="searchBar"
                    placeholder={{ __('messages.liquor.search') }}> <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        @foreach ($viewData['liquors'] as $liquor)
            <div class="col-md-4 col-lg-3 mb-2">
                <div class="card">
                    <img src="{{ asset('/storage/' . $liquor->getImage()) }}" class="card-img-top img-card">
                    <div class="card-body text-center">
                        <a href="{{ route('user.liquor.show', ['id' => $liquor->getId()]) }}"
                            class="btn bg-primary text-white">{{ $liquor->getLiquorType() }} {{ $liquor->getBrand() }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
