<!-- Authors: Manuela Herrera López -->
@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('messages.admin.editeLiquors') }}
                        {{ $viewData['liquor']->getLiquorType() }} {{ $viewData['liquor']->getBrand() }}</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul id="errors" class="alert alert-danger list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        @if (session()->has('alert'))
                            <ul class="alert alert-success list-unstyled">
                                <li>{{ session()->get('alert') }}</li>
                            </ul>
                        @endif

                        <form method="POST" action="{{ route('admin.liquor.update', $viewData['liquor']->getId()) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="number" class="form-control mb-2"
                                placeholder={{ __('messages.admin.createLiquorsPrice') }} name="price"
                                value="{{ old('price') }}" />
                            <input type="number" class="form-control mb-2"
                                placeholder={{ __('messages.admin.createLiquorsStock') }} name="stock"
                                value="{{ old('stock') }}" />
                            <div class="col">
                                <div class="mb-3 row">
                                    <label
                                        class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{ __('messages.admin.createLiquorsImage') }}</label>
                                    <div class="col-lg-10 col-md-6 col-sm-12">
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Send" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
