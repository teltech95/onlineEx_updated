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
   @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <form method="POST" action="{{ route('add_prodct', ['companyid'=>request()->companyid ]) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Product Name</label>
            <input id="" type="number" class="hidden" name="compid" value="{{ request()->companyid }}" >
            <input id="name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') }}" required autocomplete="name" autofocus>
            @error('product_name')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                
            @enderror
        </div>
        
        <div class="form-group">
            <label for="name">Product description</label>
            <textarea id="" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="name" autofocus></textarea>
            @error('description')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Image One</label>
            <input id="" type="file" class="form-control @error('image_one') is-invalid @enderror" name="image_one" required  autofocus>
            @error('image_one')
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