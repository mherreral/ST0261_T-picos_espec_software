@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('messages.comment.createComments') }}</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul id="errors" class="alert alert-danger list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="post" action="{{ route('user.comment.save', $viewData['liquor']) }}">
                            @csrf
                            <input type="text" class="form-control mb-2"
                                placeholder={{ __('messages.comment.createCommentDescription') }} name="description"
                                value="{{ old('description') }}" />
                            <label for="score">{{ __('messages.comment.score') }}</label>
                            <input type="range" name="score" min="0" max="5">
                            <input type="submit" class="btn btn-primary"
                                value="{{ __('messages.comment.sendComment') }}" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
