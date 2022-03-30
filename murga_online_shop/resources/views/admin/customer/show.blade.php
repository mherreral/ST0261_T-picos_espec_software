@extends('layouts.admin')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ $viewData['picture'] }}" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $viewData['customer']->getName() }} - ID: {{ $viewData['customer']->getId() }}
                    </h5>

                    <p class="card-text">{{ __('auth.phoneNumber') }}:
                        {{ $viewData['customer']->getPhoneNumber() }}</p>
                    <p class="card-text">{{ __('auth.email') }}:
                        {{ $viewData['customer']->getEmail() }}</p>
                    <p class="card-text">{{ __('auth.idNumber') }}:
                        {{ $viewData['customer']->getIdNumber() }}</p>
                    <p class="card-text">{{ __('messages.user.customer.availableMoney') }}:
                        {{ $viewData['customer']->getAvailableMoney() }}</p>
                    <form method="POST" action="{{ route('admin.customer.save') }}">
                        @csrf
                        <ul class="nav flex-column">
                            <li>
                                <input type="hidden" name="adminId" value={{ $viewData['customer']->getId() }} />
                                <input type="hidden" name="adminFlag" value="1" />
                                <input class="mt-2 btn bg-primary text-white"
                                    value="{{ __('messages.admin.manageSetAdmin') }}" type="submit"></input>

                            </li>
                    </form>
                    <form method="POST" action="{{ route('admin.customer.save') }}">
                        @csrf
                        <li>
                            <input type="hidden" name="deleteId" value={{ $viewData['customer']->getId() }} />
                            <input class="mt-2 btn bg-primary text-white"
                                value="{{ __('messages.admin.manageDeleteCustomer') }}" type="submit"></input>

                        </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
