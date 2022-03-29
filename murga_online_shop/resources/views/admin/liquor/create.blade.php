@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('messages.admin.createLiquors') }}</div>
          <div class="card-body">
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif

            @if(session()->has("alert"))
              <ul class="alert alert-success list-unstyled">
                <li>{{ session()->get("alert") }}</li>
              </ul>
            @endif
            
            <form method="POST" action="{{ route('admin.liquor.save') }}">
              @csrf
              <input type="text" class="form-control mb-2" placeholder={{ __('messages.admin.createLiquorsType') }} name="liquor_type" value="{{ old('liquor_type') }}" />
              <input type="text" class="form-control mb-2" placeholder={{ __('messages.admin.createLiquorsBrand') }} name="brand" value="{{ old('brand') }}" />
              <input type="number" class="form-control mb-2" placeholder={{ __('messages.admin.createLiquorsPrice') }} name="price" value="{{ old('price') }}" />
              <input type="number" class="form-control mb-2" placeholder={{ __('messages.admin.createLiquorsStock') }} name="stock" value="{{ old('stock') }}" />
              <input type="text" class="form-control mb-2" placeholder={{ __('messages.admin.createLiquorsPresentation') }} name="presentation" value="{{ old('presentation') }}" />
              <input type="number" class="form-control mb-2" placeholder={{ __('messages.admin.createLiquorsMilliliters') }} name="milliliters" value="{{ old('milliliters') }}" />
              <input type="text" class="form-control mb-2" placeholder={{ __('messages.admin.createLiquorsImage') }} name="image" value="{{ old('image') }}" />
              <input type="submit" class="btn btn-primary" value="Send" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
