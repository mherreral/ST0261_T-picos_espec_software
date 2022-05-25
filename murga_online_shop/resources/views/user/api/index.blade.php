@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="row">
        @foreach ($beers['data'] as $beer)
            <div class="col-md-4 col-lg-3 mb-2">
                <div class="card">
                    <img src="'.$beer['image'].'" class="card-img-top img-card">
                    <div class="card-body text-center">
                        <a href="{{ route('user.api.index', ['id'=> $beer['id']]) }}" class="btn bg-primary text-white">{{ $beer['name'] }} {{ $beer['format'] }}-{{ $beer['brand'] }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
