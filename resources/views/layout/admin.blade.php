<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @notifyCss
    {{-- <link href="/css/bootstrap.min.css" rel="stylesheet" /> --}} 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
    <title>@yield('title', __('Admin - MOD - Court Case Management System'))</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row bg-info">
            {{-- header and NavBar --}}
            <div class="col-lg-2 col-md-3 col-sm-0 text-white">
                <a class="navbar-brand text-white fs-4" href="/">{{ __('MOD-CCMS') }}</a>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-0 p-0 text-end">
                {{-- <spa*-n class="fs-3 text-white">MOD - Course Case Management System</spa*-n> --}}
                <nav class="p-2 shadow text-end">
                    @guest
                        <a href="{{ route('login') }}" class="nav-link active">{{ __('Login') }}</a>
                        {{-- <a href="{{ route('register') }}" class="nav-link active">Register</a> --}}
                    @else
                        <img class="img-profile rounded-circle float-right" src="{{ asset('/images/undraw_image.png') }}"
                            style="float: right;" alt="">
                        <form action="{{ route('logout') }}" id="logout" method="POST">
                            <a role="button" class="nav-link active text-white"
                                onclick="document.getElementById('logout').submit();">{{ __('Logout') }}({{ Auth::user()->email }})</a>
                            @csrf
                        </form>
                    @endguest
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            </div>
            {{-- middle area container container and left sidebar --}}
            <div class="col-lg-2 col-md-3 col-sm-0 text-white bg-dark" style="min-height: 100%">
                {{-- left side bar --}}

                <a href="{{ route('admin.home.index') }}" class="text-white text-decoration-none">
                    <span class="fs-4">{{ __('Dashboard Panel') }}</span>
                </a>
                <hr />
                <ul class="nav flex-column sidebar">
                    <li><a href="{{ route('admin.home.index') }}" class="nav-link text-white">{{__('Home')}}</a></li>
                    <li>
                        @can('manage-basic-file')
                            <ul class="nav flex-column sidebar">
                                <h5 class="nav-link-header text-white">{{__('Setup Entries')}}</h5>
                                <li><a href="{{ route('admin.staffrole.index') }}" class="nav-link text-white">{{__('Staff Role')}}</a>
                                </li>
                                <li><a href="{{ route('admin.case_type.index') }}" class="nav-link text-white">{{__('Case Type')}}</a>
                                </li>
                                <li><a href="{{ route('admin.event-type.index') }}" class="nav-link text-white">{{__('Event Type')}}</a>
                                </li>
                                <li><a href="{{ route('admin.document_type.index') }}"
                                        class="nav-link text-white">{{__('Document Type')}}</a>
                                </li>
                                <li><a href="{{ route('admin.party_type.index') }}" class="nav-link text-white">{{__('Party Type')}}</a>
                                </li>
                            </ul>
                        @endcan
                    </li>
                    <li>
                        @can('manage-court-staff')
                            <ul class="nav flex-column sidebar">
                                <h5 class="nav-link-header text-white">{{__('Court and Staff')}}</h5>
                                @can('court-list')
                                    <li><a href="{{ route('admin.court.index') }}" class="nav-link text-white">{{__('Courts')}}</a>
                                    </li>
                                @endcan
                                @can('profile-list')
                                    <li><a href="{{ route('admin.person.index') }}" class="nav-link text-white">{{__('Profile')}}</a>
                                    </li>
                                @endcan
                                @can('court-staff-list')
                                    <li><a href="{{ route('admin.courtstaff.index') }}" class="nav-link text-white">{{__('Courts Staff')}}</a>
                                    </li>
                                @endcan

                                @can('court-staff-list')
                                    <li><a href="{{ route('admin.change_court_staff.index') }}" class="nav-link text-white">{{__('Courts Staff')}}</a>
                                    </li>
                                @endcan
                            </ul>
                        @endcan
                    </li>
                    <li>
                        @can('manage-case')
                            <ul class="nav flex-column sidebar">
                                <h5 class="nav-link-header text-white">{{__('Case Management')}}</h5>
                                @can('case-staff-assignment-list')
                                    <li><a href="{{ route('admin.case_staff_assignments.index') }}"
                                            class="nav-link text-white">{{__('Case Staff Assignment')}}</a></li>
                                @endcan
                                @can('party-list')
                                    <li><a href="{{ route('admin.party.index') }}" class="nav-link text-white">{{__('Parties')}}</a></li>
                                @endcan
                                @can('event-list')
                                    <li><a href="{{ route('admin.event.index') }}" class="nav-link text-white">{{__('Event')}}</a></li>
                                @endcan
                                @can('document-list')
                                    <li><a href="{{ route('admin.document.index') }}" class="nav-link text-white">{{__('Document')}}</a>
                                    @endcan
                                </li>
                            </ul>
                        @endcan
                    </li>
                    {{-- @can('user-list')
                       <li><a class="nav-link text-white" href="{{ route('admin.users.index') }}">Manage Users</a></li>
                    @endcan
                    @can('role-list')
                       <li><a class="nav-link text-white" href="{{ route('admin.roles.index') }}">Manage Role</a></li>
                    @endcan --}}
                    <li>
                        @can('manage-rbac')
                            <ul class="nav flex-column sidebar">
                                <h5 class="nav-link-header text-white">RBAC</h5>
                                <li><a href="{{ route('admin.roles.index') }}" class="nav-link text-white">{{__('Roles')}}</a></li>
                                <li><a href="{{ route('admin.users.index') }}" class="nav-link text-white">{{__('Users')}}</a></li>
                            </ul>
                        @endcan
                    </li>
                    <li>
                        <ul class="nav flex-column sidebar">
                            <h5 class="nav-link-header text-white">{{__('Manage Account')}}</h5>
                            <li><a href="{{ route('myaccount.change.username') }}" class="nav-link text-white">{{__('Change User Name')}}</a></li>
                            <li><a href="{{ route('myaccount.change.password') }}" class="nav-link text-white">{{__('Change password')}}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('home.index') }}" class="mt-2 btn bg-primary text-white">{{__('Go back to the home page')}}</a>
                    </li>
                </ul>
                <br><br><br>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-12 py-2" style="margin-bottom: 15%; min-height: 99%">
                {{-- main-content --}}
                <div class="container-fluid">
                    <div class="row my-2 bg-light">
                        <div class="col-md-6 text-alig-center ">
                            <h3>@yield('innerTitle')</h3>
                        </div>
                        <div class="col-md-6 text-alig-right ">
                            <h4>@yield('breadCrumb')</h4>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="col-12 alert alert-warning alert-dismissible">
                            <ul class="alert alert-danger list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="container-fluid" style="margin-bottom: 15%;">
                    @yield('content')
                </div>
            </div>
        </div>
        <br><br>
        <div style="clear: both"></div>
        <div class="row">
            {{-- footer location --}}
            <div class="copyright py-3 text-center text-white">
                <div class="container-fluid ">
                    <small class="copyright">
                        Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank" href="#">
                            MOD
                        </a> - <b>ICT <i>YoungTigers</i></b>
                    </small>
                    @include('partials.language_switcher')
                </div>
            </div>
        </div>
    </div>
    {{-- include JS file here --}}
    {{-- <script src="/css/bootstrap.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    @notifyJs
    @include('notify::components.notify')
</body>

</html>
