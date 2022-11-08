@extends('layouts.main')

@section('content')
<script type="application/ld+json">
   {
     "itemListElement": [
       {
         "@type": "ListItem",
         "position": 1,
         "item": {
           "name": "My Account"
         }
       }
     ],
     "@context": "http://schema.org",
     "@type": "BreadcrumbList"
   }
</script>
<ol class="breadcrumb-container clearfix">
   <li class="list-item pull-left  ">
      <a title="My Account" class="crumb">
         <div class="image pull-left gradBg" style="border: none; background-image: linear-gradient(to bottom, #185ff9, #99a2ff);">
            <i class="icon icon-profile"></i>
         </div>
         <div class="header">
            <h2 class="title">My Account</h2>
            <div class="description">
               My Account
            </div>
         </div>
      </a>
   </li>
</ol>
<div>
    @if(Auth::user()->role === 1)
   <!-- <a class="btn btn-tertiary" href="/my/accountdetails">
        <img src="{{asset('assets/images/manage-my-profile.svg')}}" alt="Manage My Profile" />
        Manage My Profile
   </a> -->
   <a class="btn btn-tertiary" href="/stripe-payment">
        <img src="{{asset('assets/images/wallet.svg')}}" alt="Manage My Wallets" />
        Make Payments
   </a>
   <a class="btn btn-tertiary" href="{{route('register_company')}}">
        <img src="{{asset('assets/images/wallet.svg')}}" alt="Payments" />
        Register Company
   </a>
   <a class="btn btn-tertiary" href="/product/gallery">
        <img src="{{asset('assets/images/wallet.svg')}}" alt="Product Gallery" />
        Product Gallery
   </a>
   @elseif(Auth::user()->role === 2)
   <a class="btn btn-tertiary" href="{{route('user_management')}}">
        <img src="{{asset('assets/images/manage-my-profile.svg')}}" alt="User Management" />
        User Management
   </a>
   <a class="btn btn-tertiary" href="{{route('category')}}">
        <img src="{{asset('assets/images/manage-my-profile.svg')}}" alt="Manage My Profile" />
         Company Category
   </a>
   <a class="btn btn-tertiary" href="{{route('winner')}}">
        <img src="{{asset('assets/images/wallet.svg')}}" alt="Manage My Wallets" />
        Winners
   </a>
   <a class="btn btn-tertiary" href="{{route('vote')}}">
        <img src="{{asset('assets/images/manage-my-profile.svg')}}" alt="Manage My Wallets" />
        Online Voting
   </a>
   @else

   <p>Nothing in this page..</p>

   @endif
   
</div>

@endsection
