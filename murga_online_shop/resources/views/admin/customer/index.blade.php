@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="row">
        @foreach ($viewData['customers'] as $customer)
            <div class="col-md-4 col-lg-3 mb-2">
                <div class="card">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png"
                        class="card-img-top img-card">
                    <div class="card-body text-center">
                        <a href="{{ route('admin.customer.show', ['id' => $customer->getId()]) }}"
                            class="btn bg-primary text-white">{{ $customer->getName() }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
