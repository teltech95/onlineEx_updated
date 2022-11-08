@extends('layouts.main')

@section('content')
<class="row">
<div class="col-sm-6 col-sm-push-6 col-md-4 col-md-push-8">
   <div class="customer-engagement-container clearfix">

   </div>
</div>
<div class="col-sm-6 col-sm-pull-6 col-md-8 col-md-pull-4">
  
   <ol class="breadcrumb-container clearfix">
      <li class="list-item pull-left hidden-xs ">
         <a title="My Account" class="crumb" href="/home">
            <div class="image pull-left gradBg" style="border: none; background-image: linear-gradient(to bottom, #185ff9, #99a2ff);">
               <i class="icon icon-profile"></i>
            </div>
            <div class="header">
               <h2 class="title">Dashboard</h2>
               <div class="description">
               Dashboard
               </div>
            </div>
         </a>
         <div class="next">
            <i class="icon icon-next"></i>
         </div>
      </li>
      <li class="list-item pull-left  ">
         <a title="Manage My Profile" class="crumb">
            <div class="image pull-left gradBg" style="border: none; background-image: linear-gradient(to bottom, #185ff9, #99a2ff);">
               <i class="icon icon-profile"></i>
            </div>
            <div class="header">
               <h2 class="title">Products</h2>
               <div class="description">
                  Add New
               </div>
            </div>
         </a>
      </li>
   </ol>
</div>
</div>
<div class="row col-sm-12 col-md-8">
   
    <form method="POST" action="{{ route('register_company') }}">
        @csrf
        <div class="form-group">
            <label for="name">Company Name</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                
            @enderror
        </div>
        <div class="form-group">
            <label for="">location</label>
            <select id="databundlecode" name="categoryid" class="form-control" required="">
                @php
                    $categories = DB::select('select * from category');
                @endphp
                @foreach($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>

        </div>
        
        <div class="form-group">
            <label for="name">Location</label>
            <input id="" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required autocomplete="location" autofocus>
            @error('location')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                
            @enderror
        </div>
        <p>
            <button type="submit" class="btn btn-primary">Add New</button>
        </p>
   </form>
</div>
@endsection