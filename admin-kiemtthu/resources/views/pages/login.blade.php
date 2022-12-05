@extends("master")
@section('context')
    <section id="form">
        <!--form-->
        <div class="container">
            <div class="row">
                <!-- {{-- thong bao loi --}}

                {{-- custom message error --}} -->
                {!! messageErrors() !!}
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <!--login form-->
                        <h2>Login to your account</h2>
                        <form method="POST" action="{{ url('/login') }}">
                            @csrf
                            <input type="email" name="email" {{ old('email') }} placeholder="Email Address" />
                            <input type="password" name="password" {{ old('password') }} placeholder="Password" />
                            <span>
                                <input type="checkbox" name="savePasword" class="checkbox">
                                Keep me signed in
                            </span>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div>
                    <!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form">
                        <!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="FullName" value="{{ old('FullName') }}" placeholder="Full name " />
                            <input type="text" name="Username" value="{{ old('Username') }}" placeholder="User" />
                            <input type="password" name="password" value="{{ old('password') }}" placeholder="Password" />
                            <input type="password" name="passwordAgain" value="{{ old('passwordAgain') }}" placeholder="Password Again" />
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email " />
                            <input type="tel" name="Phone" value="{{ old('Phone') }}" placeholder="Phone " />
                            <input type="text" name="Address" value="{{ old('Address') }}" placeholder="Address " />
                            <input type="file" onchange="LoadImage(this, '#imageReview')" accept="image/*" id="imgInp" name="Avatar" />
                            <img id="imageReview" src="#" style="width: 100px;padding:10px;display:none;"  />
                            <button type="submit" class="btn btn-default">Signup</button>
                        </form>
                    </div>
                    <!--/sign up form-->
                </div>
            </div>
        </div>
    </section>
    <!--/form-->

@endsection
@section('script')
    {{--  <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                $('#imageReview').show();
                imageReview.src = URL.createObjectURL(file)
            }
        }
    </script>  --}}
@endsection
