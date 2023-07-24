@include('include.styles')


<style>
    .invalid-feedback {
        padding: 10px;
    }
</style>

<div class="main-content">
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                        <h1 class="text-white">Welcome!</h1>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <small>Sign in with credentials</small>
                            </div>

                            <form role="form" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                                    <label class="custom-control-label" for=" customCheckLogin">
                                        <span class="text-muted">Remember me</span>
                                    </label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Sign in</button>
                                </div>
                                <br>
                                @error('email')
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <span class="alert-text">{{ $message }}</span>
                                    </div>
                                @enderror
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <a href="{{ route('password.request') }}" class="text-light"><small>Forgot
                                    password?</small></a>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ route('register') }}" class="text-light"><small>Create new account</small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('include.javascript')
    @include('include.alerts')
