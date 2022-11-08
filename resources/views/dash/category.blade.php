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
                    <div class="image pull-left gradBg"
                        style="border: none; background-image: linear-gradient(to bottom, #185ff9, #99a2ff);">
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
                    <div class="image pull-left gradBg"
                        style="border: none; background-image: linear-gradient(to bottom, #185ff9, #99a2ff);">
                        <i class="icon icon-profile"></i>
                    </div>
                    <div class="header">
                        <h2 class="title">Add category</h2>
                        <div class="description">
                            New category
                        </div>
                    </div>
                </a>
            </li>
        </ol>
    </div>
</div>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="row col-sm-12 col-md-8">

        <form method="POST" action="{{ route('category') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>

                @enderror
            </div>
            <div class="form-group">
                <label for="">Theme Color One</label>
                <input id="" type="text" class="form-control @error('theme_one') is-invalid @enderror"
                    placeholder="#99a2ff" name="theme_one" value="{{ old('theme_one') }}" required
                    autocomplete="theme_one" autofocus>
                @error('theme_one')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Theme Color Two</label>
                <input id="theme_two" type="text" class="form-control @error('theme_two') is-invalid @enderror"
                    placeholder="#99a2ff" name="theme_two" value="{{ old('theme_two') }}" required
                    autocomplete="theme_two" autofocus>
                @error('theme_two')
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
    <div class="row col-sm-6 col-md-4 text-center ">
      <h2 class="title">Available Category</h2>
    <div class="row table-container" style="padding-left:30px">
      <table id="list" style="width: 100%" class="light comfortable stripe table-bordered">
         <thead>
            <tr>
               <th>Name</th>
               <th>Theme One </th>
               <th>Theme Two</th>
            </tr>
         </thead>
         <tbody>
          	 
         @foreach($categories as $category)
            <tr>
               <td class="">{{$category->name}}</td>
               <td class="">{{$category->theme_one}}</td>
              
               <td class="">{{$category->theme_two}}</td>

            </tr>
         @endforeach
         </tbody>
      </table>
      <div class="pagination">
         <button class="btn btn-default round prev" disabled="disabled" onclick="HISTORY.LoadList(-1)" aria-label="Previous"></button>
         <span class="description"></span>
         <button class="btn btn-default round next" disabled="disabled" onclick="HISTORY.LoadList(1)" aria-label="Next"></button>
      </div>
   </div>
    </div>

    @endsection