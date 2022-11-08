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
                     <h2 class="title">Winners </h2>
                     <div class="description">
                        Top (5) Winners of this season
                     </div>
                  </div>
               </a>
            </li>
         </ol>
      </div>
   </div>
   <div class="row account-page-controls clearfix">
      
      
   </div>
   @if (session('retweet'))
    <div class="alert alert-info">
        {{ session('retweet') }}
    </div>
    @endif
    @if (session('tweet'))
    <div class="alert alert-success">
        {{ session('tweet') }}
    </div>
    @endif
    @if (session('comment'))
    <div class="alert alert-success">
        {{ session('comment') }}
    </div>
    @endif
   <div class="row table-container">
      <table id="list" style="width: 100%" class="light comfortable stripe">
         <thead>
            <tr>
               <th>#</th>
               <th>Company Name</th>
               <th>Vote(s)</th>
               <th></th>
            </tr>
         </thead>

         <tbody>
            @php
                $count = 0;

            @endphp
         @if($winners)
            @foreach($winners as $winner)
            <tr>
               <td class="">
                @php
                    $count++;
                    echo $count;
                @endphp
               </td>
               <td class="">{{company($winner->comp_id)}}</td>
               <td class="">{{$winner->totals}}</td>
              
            </tr>
            @endforeach
            @else
            <tr>
                <td class="">Fetching data ...</td>
            </tr>
            @endif
        
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
