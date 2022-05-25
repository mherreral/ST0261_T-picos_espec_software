@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="row">
        @foreach ($viewData['beers'] as $beer)
            <div class="col-md-4 col-lg-3 mb-2">
                <div class="card">
                    <img src="{{ asset($beer['image']) }}" class="card-img-top img-card">
                    <div class="card-body text-center">
                        <p>{{ $beer['name'] }} {{ $beer['format'] }}-{{ $beer['brand'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
