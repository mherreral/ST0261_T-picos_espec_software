@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ URL::asset($viewData['picture']) }}" class="img-fluid rounded-start">
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
                                    value="{{ __('messages.admin.customer.setAdmin') }}" type="submit"></input>

                            </li>
                        </ul>
                    </form>

                    <form method="POST" action="{{ route('admin.customer.save') }}">
                        @csrf
                        <ul class="nav flex-column">

                            <li>
                                <input type="hidden" name="deleteId" value={{ $viewData['customer']->getId() }} />
                                <input class="mt-2 btn bg-primary text-white"
                                    value="{{ __('messages.admin.customer.deleteCustomer') }}" type="submit"></input>
                            </li>
                        </ul>
                    </form>

                    <form method="POST" action="{{ route('admin.customer.save') }}" enctype="multipart/form-data">
                        @csrf
                        <ul class="nav flex-column">
                            <li>
                                <input type="hidden" name="storage" value="local" />
                                <input type="hidden" name="filename"
                                    value="{{ $viewData['customer']->getName() }}{{ $viewData['customer']->getId() }}.png" />
                                <p class="card-text">{{ __('messages.admin.customer.localImage') }}: <input
                                        type="file" name="profile_image" /> <button type="submit" class="btn btn-primary">{{ __('messages.admin.customer.send') }}</button></p>
                            </li>
                        </ul>
                    </form>
                    <form method="POST" action="{{ route('admin.customer.save') }}">
                        @csrf
                        <ul class="nav flex-column">
                            <li>
                                <input type="hidden" name="storage" value="web" />
                                <input type="hidden" name="filename"
                                    value="{{ $viewData['customer']->getName() }}{{ $viewData['customer']->getId() }}.png" />
                                <p class="card-text">{{ __('messages.admin.customer.webImage') }}: <input type="url"
                                        name="profile_image" /> <button type="submit" class="btn btn-primary">{{ __('messages.admin.customer.send') }}</button></p>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
