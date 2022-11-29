@extends('master')
@section('css')
@endsection
@section('context')
    <div class="container">
        <div class="row m-auto">
            {{-- custom message error --}}
            {!! messageErrors() !!}
            <div class="col-8">
                <div class="signup-form">
                    <!--sign up form-->
                    <h2 style="text-align: center;">Detail User {{ $userLoginDetail->FullName }}!</h2>
                    <form method="POST" action="{{ url('/detail-user') }}" enctype="multipart/form-data" style="margin: auto;width: 50vw;">
                        @csrf
                        <input type="text" name="FullName" value="{{ $userLoginDetail->FullName }}"
                            placeholder="Full name " />
                        <input type="text" name="Username" value="{{ $userLoginDetail->Username }}"
                            placeholder="User" />
                        <p style="color: red;">Nếu muốn đổi mật khẩu thì điền vào !!</p>
                        <input type="password" name="password" value="{{ old('password') }}" placeholder="Password" />
                        <input type="email"  disabled value="{{ $userLoginDetail->email }}" placeholder="Email " />
                        <input type="hidden" name="email"  value="{{ $userLoginDetail->email }}" placeholder="Email " />
                        <input type="tel" name="Phone" value="{{ $userLoginDetail->Phone }}" placeholder="Phone " />
                        <input type="text" name="Address" value="{{ $userLoginDetail->Address }}"
                            placeholder="Address " />
                        <input type="file" onchange="LoadImage(this, '#imageReview')" accept="image/*" id="imgInp"
                            name="Avatar" />
                        <img id="imageReview" src="Avatar/{{ $userLoginDetail->Avatar}}"
                            style="width: 100px;padding:10px;" />
                        <button type="submit" class="btn btn-default">Sửa</button>
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
@endsection
