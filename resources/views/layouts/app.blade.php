<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - page</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- icon -->
    <link rel="icon" href="{{ url('images/img/docmed_logo.ico') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper" id="app">
        @include('extension.navbar')
        @include('extension.sidebar')
        <div class="content-wrapper">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ __(session()->get('success')) }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session()->has('danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ __(session()->get('danger')) }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        @include('extension.footer')
    </div>
    @section('script')
<script src="{{ mix('js/app.js') }}" ></script>
@show
<script>
    //traduction des url pour le js
    var route = "{{ route('patient_search') }}";
    var routeRendezVous="{{route('rendezvous_search')}}"
    var routeRe ="{{ url('patients') }}";
    var routeEdit="{{route('patients.index')}}";
    var routeNew="{{ route('rencontres.create') }}";
    var token = "{{ csrf_token()}}";
    //traduction des message pour le js
    var tradList="{{__('login.listeRe')}}";
    var tradNewMeeting="{{__('login.nouvelleRE')}}"
</script>
</body>
<!-- Scripts -->
</html>
