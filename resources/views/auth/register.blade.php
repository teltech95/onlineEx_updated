@extends('layouts.main')

@section('content')
<div class="login">
   <div class="row">
      <div class="col-sm-6 col-sm-push-6 col-md-4 col-md-push-8">
         <div class="customer-engagement-container clearfix">
            
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12 col-lg-offset-4 col-md-offset-3 col-sm-offset-2">
         <ul class="nav nav-tabs">
            <li role="" ><a  href="/login">Already a user?</a></li>
            <li role="presentation" class="active"><a data-toggle="tab" href="#newuser">New to topup.co.zw</a></li>
         </ul>
         <div class="tab-content">
            <div id="signin" class="tab-pane active">
               
               <div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group" style="margin-top: 15px;">
                            <label for="login">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group" style="margin-top: 15px;">
                            <label for="login">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group" style="margin-top: 15px;">
                            <label for="login">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            
                        </div>
                        
                        
                        <div class="btn-container">
                            <input type="submit" class="btn btn-primary" value="Log In" />
                            <a id="forgotpassword" class="btn btn-link" href="/user/resetpassword?login=">Forgot My Password</a>
                        </div>
                  </form>
               </div>
            </div>
            
         </div>
      </div>
   </div>
</div>

@endsection