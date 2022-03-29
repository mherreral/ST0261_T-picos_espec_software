<!-- Authors: Manuela Herrera López -->
@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('messages.wishlist.create') }}</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul id="errors" class="alert alert-danger list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form method="POST" action="{{ route('user.wishlist.save') }}">
                            @csrf
                            <input type="text" class="form-control mb-2" placeholder="{{ __('messages.wishlist.name') }}"
                                name="name" value="{{ old('name') }}" />
                            <input type="text" class="form-control mb-2"
                                placeholder="{{ __('messages.wishlist.customers') }}" name="customers"
                                value="{{ old('customers') }}" />
                            <input type="submit" class="btn btn-primary" value="Send" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
