<!-- Retrieved from
    https://github.com/PracticalBooks/Practical-Laravel/blob/main/Chapter28/onlineStore/resources/views/layouts/admin.blade.php -->

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
    <title>@yield('title', 'Admin panel')</title>
</head>

<body>
    <div class="row g-0">
        <!-- sidebar -->
        <div class="p-3 col fixed text-white bg-dark">
            <span class="fs-4">{{ __('messages.admin.title') }}</span>
            </a>
            <hr />
            <ul class="nav flex-column">
                <li><a href="{{ route('admin.liquor.create') }}" class="nav-link text-white">{{ __('messages.admin.createLiquors') }}</a></li>
                <li><a href="#" class="nav-link text-white">{{ __('messages.admin.manageLiquors') }}</a></li>
                <li><a href="{{ route('admin.customer.index') }}"
                    class="nav-link text-white">{{ __('messages.admin.customer.indexTitle') }}</a></li>
                <li><a href="{{ route('admin.customer.setAdmin') }}"
                        class="nav-link text-white">{{ __('messages.admin.manageSetAdmin') }}</a></li>
                <li><a href="{{ route('admin.customer.delete') }}"
                        class="nav-link text-white">{{ __('messages.admin.manageDeleteCustomer') }}</a></li>
                <li>
                    <a href="{{ route('user.home.index') }}"
                        class="mt-2 btn bg-primary text-white">{{ __('messages.home.goBackHome') }}</a>
                </li>
            </ul>
        </div>
        <!-- sidebar -->
        <div class="col content-grey">
            <nav class="p-3 shadow text-end">
                <span
                    class="profile-font">{{ __('messages.admin.name', ['name' => Auth::user()->getName()]) }}</span>
                <img class="img-profile rounded-circle" src="{{ asset('/img/cat.jpg') }}">
            </nav>

            <div class="g-0 m-5">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- footer -->
    <div class="copyright py-4 text-center text-white">
        <div class="container">
            <small>
                {{ __('messages.home.copyright') }} <a class="text-reset fw-bold text-decoration-none"
                    target="_blank" href="https://twitter.com/danielgarax">
                    {{ __('messages.home.author') }}
            </small>
        </div>
    </div>
    <!-- footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
