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
                     <h2 class="title">Online Voting Platform</h2>
                     <div class="description">
                        Available candidates
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
               <th>Company Name</th>
               <th>Category </th>
               <th>Vote(s)</th>
               <th></th>
            </tr>
         </thead>
         <tbody>
            
         @if($companies)
            @foreach($companies as $company)
            <tr>
               
               <td class="">{{$company->name}}</td>
               <td class="">{{category($company->categoryid)}}</td>
               <td class="">
                    <form method="POST" action="{{ route('vote')}}" >
                        @csrf
                        <input type="hidden" name="comp_id" value="{{$company->categoryid}}">
                        <input type="hidden" name="user_id" value="{{Auth::id()}}">
                        <input type="hidden" name="vote" value="1">
                        <button href="#" class="btn btn-info" >Vote ({{tt_votes($company->id)}})</button>
                    </form>
                </td>
               <td class="">
                    <div class="row">
                        <form method="POST" action="{{ route('save_comment')}}" >
                        <div class="col-md-12">
                        
                            @csrf
                            <input type="hidden" name="comp_id" value="{{$company->categoryid}}">
                            <textarea name="comment" class="form-control" placeholder="Leave a comment here" id="" required></textarea>

                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                
                </td>

            </tr>
            @endforeach
            @else
            <tr>
                <td class="">Nothing in your gallery</td>
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
