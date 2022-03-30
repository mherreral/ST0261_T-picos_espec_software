@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="text-center">
        <a href="{{ route('user.home.index') }}"
            class="mt-2 btn bg-primary text-white">{{ __('messages.home.goBackHome') }}</a>
        <a href="{{ route('admin.home.index') }}"
            class="mt-2 btn bg-primary text-white">{{ __('messages.admin.goBackHome') }}</a>
    </div>
@endsection
