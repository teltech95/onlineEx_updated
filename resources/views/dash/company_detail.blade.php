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
               <a title="My Account" class="crumb" href="#">
                  <div class="image pull-left gradBg" style="border: none; background-image: linear-gradient(to bottom, #185ff9, #99a2ff);">
                     <i class="icon icon-profile"></i>
                  </div>
                  <div class="header">
                     <h2 class="title">{{$company->name}}</h2>
                     <div class="description">
                        Company
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
                     <h2 class="title">Product list</h2>
                     <div class="description">
                        all products
                     </div>
                  </div>
               </a>
            </li>
         </ol>
      </div>
   </div>
   <div class="row account-page-controls clearfix">
      <!-- <div class="email-report col-md-3 col-md-push-9 hidden-sm hidden-xs">
         <a class="action-button btn btn-primary btn-block" href="{{route('add_prodct', ['companyid'=>$company->id])}}">Add New Product</a>
      </div> -->
      <div class="transaction-filters col-sm-12 col-md-9 col-md-pull-3 clearfix">
         <div class="form-inline">
            <div class="form-group">
               <label for="purchased">Filter</label>
               <select id="purchased" class="form-control">
                  <option value="">Anytime</option>
                  <option value="yesterday">Yesterday</option>
                  <option value="lastweek">Last Week</option>
                  <option value="thismonth">This Month</option>
                  <option value="lastmonth">Last Month</option>
                  <option value="lastyear">Last Year</option>
               </select>
            </div>
            <div class="form-group">
               <label for="search">Search</label>
               <input id="search" class="form-control" type="text" value="" placeholder="" />
            </div>
         </div>
      </div>
   </div>
   <div class="row table-container">
      <table id="list" style="width: 100%" class="light comfortable stripe">
         <thead>
            <tr>
               <th>Image</th>
               <th>Product Name</th>
               <th>Description</th>
               <th class="hidden-xs">Created At</th>
               <th>Actions</th>
            </tr>
         </thead>
         <tbody>
            
            @foreach($products as $prod)
            <tr>
               
               <td class=""><img src="{{url('/media/'.$prod->image_one)}}" alt="Image" width="100" height="100"/></td>
               <td class="">{{$prod->product_name}}</td>
               <td class="">{{$prod->description}}</td>
               <td class="">{{$prod->createdAt}}</td>
               <td class=""><button class="btn btn-default" >Comment</button></td>

            </tr>
            @endforeach
         </tbody>
      </table>
      <div class="pagination">
         <button class="btn btn-default round prev" disabled="disabled" onclick="HISTORY.LoadList(-1)" aria-label="Previous"></button>
         <span class="description">No transaction history loaded</span>
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
