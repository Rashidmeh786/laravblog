@extends('customAuth.master')

@section('title')
    Blog -register
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-6 col-md-6">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                {{--  <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>  --}}
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form method="POST" class="user" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">

                                <div class="col-sm-12">
                                    <input id="name" placeholder="Enter Your Name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>


                            </div>
                            <div class="form-group">

                                    <input id="email" type="email" placeholder="Email Address"class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">

                                        <input id="password" type="password" placeholder="Password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col-sm-6">

                                <input id="password-confirm" type="password" placeholder="Confirm  Password" class=" form-control-user form-control" name="password_confirmation" required autocomplete="new-password">

                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block"> Register Account</button>

                            <hr>

                        </form>
                        <hr>

                        <div class="text-center">
                            <a class="" href="{{ route('login') }}">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


@endsection
