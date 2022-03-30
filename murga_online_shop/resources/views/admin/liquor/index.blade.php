<!-- Authors: Ana Arango -->
@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="row">
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
                        <a href="{{ route('admin.liquor.show', ['id' => $liquor->getId()]) }}"
                            class="btn bg-primary text-white">{{ $liquor->getLiquorType() }}
                            {{ $liquor->getBrand() }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
