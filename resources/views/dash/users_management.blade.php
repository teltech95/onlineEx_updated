@extends('layouts.main')

@section('content')
<div class="account history">
   <div class="row">
      <div class="col-sm-6 col-sm-push-6 col-md-5 col-md-push-7">
         <div class="customer-engagement-container clearfix">

         </div>
      </div>
      <div class="search-container col-sm-6 col-sm-pull-6 col-md-7 col-md-pull-5">

         <ol class="breadcrumb-container clearfix">
            <li class="list-item pull-left hidden-xs ">
               <a title="My Account" class="crumb" href="/home">
                  <div class="image pull-left gradBg" style="border: none; background-image: linear-gradient(to bottom, #185ff9, #99a2ff);">
                     <i class="icon icon-profile"></i>
                  </div>
                  <div class="header">
                     <h2 class="title">Dashboard</h2>
                     <div class="description">
                        dashboard
                     </div>
                  </div>
               </a>
               <div class="next">
                  <i class="icon icon-next"></i>
               </div>
            </li>
            <li class="list-item pull-left  ">
               <a title="Transaction History" class="crumb">
                  <div class="image pull-left gradBg" style="border: none; background-image: linear-gradient(to bottom, #185ff9, #99a2ff);">
                     <i class="icon icon-transactions"></i>
                  </div>
                  <div class="header">
                     <h2 class="title">Users Management</h2>
                     <div class="description">
                        users
                     </div>
                  </div>
               </a>
            </li>
         </ol>
      </div>
   </div>
   <div class="row account-page-controls clearfix">
      <div class="email-report col-md-3 col-md-push-9 hidden-sm hidden-xs">
         <!-- <a class="action-button btn btn-primary btn-block" href="{{route('register')}}">Add new user</a> -->
      </div>
      <div class="transaction-filters col-sm-12 col-md-9 col-md-pull-3 clearfix">
         <div class="form-inline">
            <div class="form-group">
               <label for="purchased">Filter</label>
               <select id="purchased" class="form-control">
                  <option value="">Admin</option>
                  <option value="users">Users</option>
                  
               </select>
            </div>
            <div class="form-group">
               <label for="search">Search</label>
               <input id="search" class="form-control" type="text" value="" placeholder="" />
            </div>
         </div>
      </div>
   </div>
   @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
   <div class="row table-container">
      <table id="list" style="width: 100%" class="light comfortable stripe">
         <thead>
            <tr>
               <th>Name</th>
               <th>Email </th>
               <th>Role</th>
               <th Created At="hidden-xs"></th>
               <th>Actions</th>
            </tr>
         </thead>
         <tbody>
            
            @foreach($users as $user)
            <tr>
               <td class="">{{$user->name}}</td>
               <td class="">{{$user->email}}</td>
               <td class="">
                @if($user->role === 1 )
                user
                @elseif($user->role === 2)
                Admin
                @endif
                </td>
               <td class="">{{$user->created_at}}</td>

               <td class=""><a href="{{route('change_role',['userid'=>$user->id,'roleid'=>$user->role])}}" class="btn btn-danger" >Change Role</a></td>

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
   <!--div class="row button-container">
      <div class="email-report col-xs-12 visible-xs visible-sm">
          <a class="action-button btn btn-primary btn-block" href="#">Send e-mail report (PDF)</a>
      </div>
      </div-->
</div>


@endsection
