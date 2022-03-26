<!-- Authors: Manuela Herrera López -->
@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="text-center">
        {{ __('messages.home.welcome') }}
    </div>
@endsection
