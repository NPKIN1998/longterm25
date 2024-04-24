<!DOCTYPE html>
<html lang="en">

<head>
    <title> </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords"
        content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->

    <link rel="icon" href="{{ env('APP_URL') }}/admin_assets/images/favicon.ico" type="image/x-icon">
    <!-- Required Fremwork -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/bower_components/bootstrap/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- choose one -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- feather Awesome -->

    <!-- Style.css -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/admin_assets/css/style.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/admin_assets/css/pricing.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/admin_assets/pricing/common.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/admin_assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/css/iziToast.css">

</head>
<style>
    .menuicons {
        height: 16px;
    }
</style>

<body>
    @include('components.alert')
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="menuicons" data-feather="menu"></i>
                        </a>
                        <!--<a href="#">-->
                        <!--    <img class="img-fluid" src="{{ env('APP_URL') }}/admin_assets/images/T-removebg-preview.png" alt="FASTTIME">-->
                        <!--</a>-->
                        <a class="mobile-options">
                            <i class="menuicons" data-feather="more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-right">
                            <!-- Authentication Links -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    ADMIN <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/logout"
                                        onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                        <input type="hidden" name="_token"
                                            value="IhfikduleOdg812cwzfHofK4ebz1hdSstjx8VAsI">
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">Navigation</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active pcoded-trigger">
                                    <a href="{{ env('APP_URL') }}/dashboard">
                                        <span class="pcoded-micon"><i class="menuicons"
                                                data-feather="home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu dropdown-toggle">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon">
                                            <i class="menuicons" data-feather="users"></i>
                                        </span>
                                        <span class="pcoded-mtext">Manage Users</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="{{ env('APP_URL') }}/users/all">
                                                <span class="pcoded-mtext">All Users</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="{{ env('APP_URL') }}/users/active">
                                                <span class="pcoded-mtext">Active Users</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ env('APP_URL') }}/users/inactive">
                                                <span class="pcoded-mtext">Dormant Users</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="{{ env('APP_URL') }}/users/free_agents">
                                                <span class="pcoded-mtext">Free Agents</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="{{ env('APP_URL') }}/users/all_investments">
                                                <span class="pcoded-mtext">All Investments</span>
                                            </a>
                                        </li>
                                    </ul>

                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="menuicons"
                                                data-feather="upload"></i></span>
                                        <span class="pcoded-mtext">Withdrawal System</span>
                                        <span class="pcoded-badge label label-danger">
                                            <?php $w = DB::table('cashouts')->where('status', 'pending')->get()->count(); ?>
                                            {{ $w }}
                                        </span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="{{ env('APP_URL') }}/withdrawals/all">
                                                <span class="pcoded-mtext">All Withdrwals</span>
                                            </a>
                                        </li>
                                        <li class="  ">
                                            <a href="{{ env('APP_URL') }}/withdrawals/pending">
                                                <span class="pcoded-mtext">Pending Withdrawals</span>
                                                <span class="pcoded-badge label label-danger">
                                                    {{ $w }}
                                                </span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="{{ env('APP_URL') }}/withdrawals/approved">
                                                <span class="pcoded-mtext">Approved Withdrwals</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="{{ env('APP_URL') }}/withdrawals/rejected">
                                                <span class="pcoded-mtext">Rejected Withdrwals</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="menuicons"
                                                data-feather="download"></i></span>
                                        <span class="pcoded-mtext">Deposit System</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="{{ env('APP_URL') }}/deposits/all">
                                                <span class="pcoded-mtext">All Deposits</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="{{ env('APP_URL') }}/deposits/approved">
                                                <span class="pcoded-mtext">Approved Deposits</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ env('APP_URL') }}/deposits/pending">
                                                <span class="pcoded-mtext">Pending Deposits</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ env('APP_URL') }}/deposits/rejected">
                                                <span class="pcoded-mtext">Rejected Deposits</span>
                                            </a>
                                        </li>
                                        {{-- <li class="">
                                            <a href="/deposits/mpesa/list">
                                                <span class="pcoded-mtext">Mpesa Transactions</span>
                                            </a>
                                        </li> --}}
                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="menuicons"
                                                data-feather="link"></i></span>
                                        <span class="pcoded-mtext">Affiliate Program</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="{{ env('APP_URL') }}/affiliates/all">
                                                <span class="pcoded-mtext">All Referals</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="{{ env('APP_URL') }}/affiliates/active">
                                                <span class="pcoded-mtext">Active Referals</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="{{ env('APP_URL') }}/affiliates/dormant">
                                                <span class="pcoded-mtext">Dormant Referrals</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="pcoded">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="menuicons"
                                                data-feather="settings"></i></span>
                                        <span class="pcoded-mtext">Settings</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="pcoded-navigatio-lavel">Extra Servces</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class=" ">
                                    <a href="">
                                        <span class="pcoded-micon"><i class="menuicons"
                                                data-feather="bell"></i><b>A</b></span>
                                        <span class="pcoded-mtext">Notifications</span>
                                    </a>
                                </li>

                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class=" ">
                                    <a href="/logout"
                                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                                        <span class="pcoded-micon"><i class="menuicons"
                                                data-feather="power"></i></span>
                                        <span class="pcoded-mtext">Log Out</span>
                                    </a>
                                </li>

                            </ul>

                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <div class="row mb-2">

                                            <div>
                                                <div class="btn-wrapper">
                                                    <a href="#"
                                                        class="btn btn-otline-dark bg-success btn-sm w-100 align-items-center"
                                                        data-bs-toggle="modal" data-bs-target="#addgame"><i
                                                            class="icon-share"></i> Add Bet</a>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="card p-2 mb-2">
                                                        <?php $users = DB::table('users')->get()->count(); ?>
                                                        <div class="card-title">
                                                            <p class="">Total Users</p>
                                                        </div>

                                                        <h3 class="rate-percentage">{{ $users }} users</h3>
                                                        <p class="text-danger d-flex"><i
                                                                class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
                                                    </div>
                                                    <div class="card p-2 mb-2">
                                                        <?php $invest = DB::table('invests')->get()->count(); ?>
                                                        <div class="card-title">
                                                            <p class="card-title">All Investments</p>
                                                        </div>
                                                        <h3 class="rate-percentage">{{ $invest }}</h3>
                                                        <p class="text-success d-flex"><i
                                                                class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
                                                    </div>
                                                    <div class="card p-2 mb-2">
                                                        <?php $investAmt = DB::table('invests')->sum('amount'); ?>
                                                        <div class="card-title">
                                                            <p class="card-title">Total Bets</p>
                                                        </div>
                                                        <h3 class="rate-percentage">KES.{{ $investAmt }}</h3>
                                                        <p class="text-danger d-flex"><i
                                                                class="mdi mdi-menu-down"></i><span>KES</span></p>
                                                    </div>
                                                    <?php $deposits = DB::table('deposits')->sum('amount'); ?>
                                                    <div class="card p-2 mb-2">
                                                        <div class="card-title">
                                                            <p class="card-title">Total Deposits</p>
                                                        </div>
                                                        <h3 class="rate-percentage">{{ $deposits }}</h3>
                                                        <p class="text-success d-flex"><i
                                                                class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                                                    </div>
                                                    <div class="card p-2 mb-2">
                                                        <?php $cashoutAmt = DB::table('cashouts')->sum('amount'); ?>
                                                        <div class="card-title">
                                                            <p class="card-title">Total Withdrawal</p>
                                                        </div>
                                                        <h3 class="rate-percentage">KES.{{ $cashoutAmt }}</h3>
                                                        <p class="text-danger d-flex"><i
                                                                class="mdi mdi-menu-down"></i><span>KES</span></p>
                                                    </div>
                                                    <div class="card p-2 mb-2">
                                                        <div class="card-title">
                                                            <?php $cashoutPending = DB::table('cashouts')->where('status', 'pending')->sum('amount'); ?>
                                                        </div>
                                                        <p class="card-title">Pending Cashouts</p>
                                                        <h3 class="rate-percentage">{{ $cashoutPending }}</h3>
                                                        <p class="text-success d-flex"><i
                                                                class="mdi mdi-menu-down"></i><span>{{ ($cashoutPending / $cashoutAmt) * 100 }}/%</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="addgame" tabindex="-1"
                                            aria-labelledby="addgameLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="addgameLabel">Create A Bet
                                                        </h1>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- resources/views/bets/create.blade.php -->

                                                        <form action="{{ route('create-bet') }}" method="post"
                                                            enctype="multipart/form-data">
                                                            @csrf

                                                            <div class="form-group">
                                                                <label for="home">Home Team:</label>
                                                                <input type="text"
                                                                    class="form-control @error('home') is-invalid @enderror"
                                                                    name="home" id="home" required>
                                                                @error('home')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="away">Away Team:</label>
                                                                <input type="text"
                                                                    class="form-control @error('away') is-invalid @enderror"
                                                                    name="away" id="away" required>
                                                                @error('away')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="percentage">Percentage:</label>
                                                                <input type="number"
                                                                    class="form-control @error('percentage') is-invalid @enderror"
                                                                    name="percentage" id="percentage" required>
                                                                @error('percentage')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="home_slug">Home Slug (Image):</label>
                                                                <input type="file"
                                                                    class="form-control-file @error('home_slug') is-invalid @enderror"
                                                                    name="home_slug" id="home_slug" required>
                                                                @error('home_slug')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="away_slug">Away Slug (Image):</label>
                                                                <input type="file"
                                                                    class="form-control-file @error('away_slug') is-invalid @enderror"
                                                                    name="away_slug" id="away_slug" required>
                                                                @error('away_slug')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="home_name">Home Name:</label>
                                                                <input type="text"
                                                                    class="form-control @error('home_name') is-invalid @enderror"
                                                                    name="home_name" id="home_name" required>
                                                                @error('home_name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="away_name">Away Name:</label>
                                                                <input type="text"
                                                                    class="form-control @error('away_name') is-invalid @enderror"
                                                                    name="away_name" id="away_name" required>
                                                                @error('away_name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="time">Time:</label>
                                                                <input type="time"
                                                                    class="form-control @error('time') is-invalid @enderror"
                                                                    name="time" id="time" required>
                                                                @error('time')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="date">Date:</label>
                                                                <input type="date"
                                                                    class="form-control @error('date') is-invalid @enderror"
                                                                    name="date" id="date" required>
                                                                @error('date')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="category_name">Category Name:</label>
                                                                <input type="text"
                                                                    class="form-control @error('category_name') is-invalid @enderror"
                                                                    name="category_name" id="category_name" required>
                                                                @error('category_name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="category_slug">Category Slug:</label>
                                                                <input type="text"
                                                                    class="form-control @error('category_slug') is-invalid @enderror"
                                                                    name="category_slug" id="category_slug" required>
                                                                @error('category_slug')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <button type="submit" class="btn btn-primary">Create
                                                                Bet</button>
                                                        </form>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="subModal" class="modal fade" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">
                                                            Subtract User
                                                            Balance
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('subtrbalance') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $user->id ?? '1' }}"
                                                            name="userid">
                                                        <div class="modal-body">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label>Enter
                                                                        Amount<span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input id="amount"
                                                                            placeholder="Enter a Positve Value"
                                                                            type="text" class="form-control"
                                                                            name="amount" value="" required
                                                                            autocomplete="amount" autofocus />
                                                                        <span class="input-group-addon"
                                                                            id="basic-addon3">Ksh</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" class="btn btn-success">
                                                                Approve
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="addModal" class="modal fade" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">
                                                            Add User Balance
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('addbalance') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $user->id ?? '1' }}"
                                                            name="userid">
                                                        <div class="modal-body">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label>Enter
                                                                        Amount<span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input id="amount"
                                                                            placeholder="Enter a Positve Value"
                                                                            type="text" class="form-control"
                                                                            name="amount" value="" required
                                                                            autocomplete="amount" autofocus />
                                                                        <span class="input-group-addon"
                                                                            id="basic-addon3">Ksh</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" class="btn btn-success">
                                                                Approve
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="addUserReferer" class="modal fade" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">
                                                            Add User Referer
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true"
                                                                class="feather icon-close"></span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('changeupline') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $user->id ?? '1' }}"
                                                            name="userid">
                                                        <div class="modal-body">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label>Username<span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="input-group has_append">
                                                                        <input type="text" name="username"
                                                                            class="form-control"
                                                                            placeholder="Please enter a valid Username" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-dark"
                                                                data-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" class="btn btn-success">
                                                                Send
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="changeUserPassword" class="modal fade" tabindex="-1"
                                            role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">
                                                            Change User
                                                            Password
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true"
                                                                class="feather icon-close"></span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('changepassword') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $user->id ?? '1' }}"
                                                            name="userid">
                                                        <div class="modal-body">
                                                            <div class="form-group mb-3">
                                                                <div class="row">
                                                                    <div class="col-md-6 mb-3">
                                                                        <label for="password">Enter
                                                                            Password</label>
                                                                        <input class="form-control" name="password"
                                                                            type="password" id="password"
                                                                            required=""
                                                                            placeholder="Enter your Password" />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="password_confirmation">Confirm
                                                                            Password</label>
                                                                        <input class="form-control"
                                                                            name="password_confirmation"
                                                                            type="password" id="password_confirmation"
                                                                            required=""
                                                                            placeholder="Confirm your Password" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-dark"
                                                                data-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" class="btn btn-success">
                                                                Update Now
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="sendEmailModal" class="modal fade" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">
                                                            Send Email
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('sendmail') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $user->id ?? '1' }}"
                                                            name="userid">
                                                        <div class="modal-body">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label>Subject<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" name="subject"
                                                                        class="form-control"
                                                                        placeholder="Email Subject" />
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label>Message<span
                                                                            class="text-danger">*</span></label>
                                                                    <textarea rows="5" name="message" class="form-control nicEdit" placeholder="Your Message"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-dark"
                                                                data-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" class="btn btn-success">
                                                                Send
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                        <div id="modal-approve" class="modal fade" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Approve User Withdrawal</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('approvecashout') }}" method="POST">
                                                        @csrf

                                                        <input type="hidden" name="id">
                                                        <input type="hidden" class="withdraw-amount" name="id">
                                                        <input type="hidden" name="withdraw-user"
                                                            class="withdraw-user">
                                                        <div class="modal-body">
                                                            <h6>Do you want to <span
                                                                    class="font-weight-bold">APPROVE</span>
                                                                <span
                                                                    class="font-weight-bold withdraw-amount text-success"></span>
                                                                Withdrawal of <span
                                                                    class="font-weight-bold withdraw-user"></span>?
                                                            </h6>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                class="btn btn-primary">Approve</button>
                                                            <button type="button" class="btn btn-dark"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                        <div id="modal-decline" class="modal fade" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Reject User Withdrawal </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('rejectcashout') }}" method="POST">

                                                        @csrf
                                                        <input type="hidden" name="id">
                                                        <input type="hidden" class="withdraw-amount" name="id">
                                                        <input type="hidden" name="withdraw-user"
                                                            class="withdraw-user">

                                                        <div class="modal-body">
                                                            <h6>Do you want to <span
                                                                    class="font-weight-bold">REJECT</span> <span
                                                                    class="font-weight-bold withdraw-amount text-danger"></span>
                                                                Withdrawal of
                                                                <span class="font-weight-bold withdraw-user"></span>?
                                                            </h6>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                class="btn btn-danger">Reject</button>
                                                            <button type="button" class="btn btn-dark"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        feather.replace()
    </script>

    <script>
        $('.approveBtn').on('click', function() {
            var modal = $('#modal-approve');
            modal.find('input[name=id]').val($(this).data('id'));
            modal.find('.withdraw-amount').text($(this).data('amount'));
            modal.find('.withdraw-user').text($(this).data('username'));
            modal.modal('show');
        });
        $('.declineBtn').on('click', function() {
            var modal = $('#modal-decline');
            modal.find('input[name=id]').val($(this).data('id'));
            modal.find('.withdraw-amount').text($(this).data('amount'));
            modal.find('.withdraw-user').text($(this).data('username'));
            modal.modal('show');
        });
    </script>

    <!-- Required Jquery -->
    <script src="{{ env('APP_URL') }}/js/iziToast.js"></script>
    <script src="{{ env('APP_URL') }}/bower_components/jquery/js/jquery.min.js"></script>
    <script src="{{ env('APP_URL') }}/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script src="{{ env('APP_URL') }}/bower_components/popper.js/js/popper.min.js"></script>
    <script src="{{ env('APP_URL') }}/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script src="{{ env('APP_URL') }}/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script src="{{ env('APP_URL') }}/bower_components/modernizr/js/modernizr.js"></script>
    <!-- Chart js -->
    <script src="{{ env('APP_URL') }}/bower_components/chart.js/js/Chart.js"></script>
    <!-- amchart js -->
    <script src="{{ env('APP_URL') }}/admin_assets/pages/widget/amchart/amcharts.js"></script>
    <script src="{{ env('APP_URL') }}/admin_assets/pages/widget/amchart/serial.js"></script>
    <script src="{{ env('APP_URL') }}/admin_assets/pages/widget/amchart/light.js"></script>
    <script src="{{ env('APP_URL') }}/admin_assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="{{ env('APP_URL') }}/admin_assets/js/SmoothScroll.js"></script>
    <script src="{{ env('APP_URL') }}/admin_assets/js/pcoded.min.js"></script>
    <!-- custom js -->
    <script src="{{ env('APP_URL') }}/admin_assets/js/vartical-layout.min.js"></script>
    <script src="{{ env('APP_URL') }}/admin_assets/js/script.min.js"></script>
    <script src="{{ env('APP_URL') }}/admin_assets/pages/dashboard/crm-dashboard.min.js"></script>
    <script src="js/share.js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-23581568-13');
    </script>
    <script>
        function show(type, options) {
            if (type === 'info') {
                iziToast.info(options);
            } else if (type === 'success') {
                iziToast.success(options);
            } else if (type === 'warning') {
                iziToast.warning(options);
            } else if (type === 'error') {
                iziToast.error(options);
            } else {
                iziToast.show(options);
            }

        }
    </script>



    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
</body>

</html>
