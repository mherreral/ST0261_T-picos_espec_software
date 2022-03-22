@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('messages.admin.title') }}
        </div>
        <div class="card-body">
            {{ __('messages.admin.message') }}
        </div>
    </div>
@endsection
