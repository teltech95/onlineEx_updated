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
            <li role="presentation" class="active"><a data-toggle="tab" href="#signin">Already a user?</a></li>
            <li role=""><a href="/register">Sign Up</a></li>
         </ul>
         <div class="tab-content">
            <div id="signin" class="tab-pane active">
               
               <div>
                  <form method="POST" action="{{ route('login') }}">
                  @csrf
                     <div class="form-group" style="margin-top: 15px;">
                        <label for="login">E-mail</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                     <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                     <div class="btn-container">
                        <div class="checkbox checkbox-primary">
                           <input class="showpassword" id="showpassword" name="showpassword" type="checkbox" data-target="#password" />
                           <label for="showpassword">
                           Show Password
                           </label>
                        </div>
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
