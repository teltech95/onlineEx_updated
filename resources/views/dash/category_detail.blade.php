@extends('layouts.main')

@section('content')
<div class="category">
   <div class="row">
      <div class="col-sm-6 col-sm-push-6 col-md-4 col-md-push-8">
         <div class="customer-engagement-container clearfix">
            
         </div>
      </div>
      <div class="search-container col-sm-6 col-sm-pull-6 col-md-8 col-md-pull-4">
         <div class="category-title" style="background-image: linear-gradient(to bottom, {{$theme->theme_one}}, {{$theme->theme_two}});">
            <img class="pull-left" alt="" src=""/>
            <div class="text">
               <h1 class="title">{{$theme->name}}</h1>
               <div class="description">All Registered companies</div>
            </div>
         </div>
      </div>
   </div>
   <div class="row" style="font-size: initial;">
   </div>
   <div class="row category-widgets">
      <div class="widget-container widget-width col-md-12">
         <div>
            <div class="widget widget-1">
               <div>
                  <div class="nav hidden-xs hidden-sm">
                     <button class="btn btn-default round prev" aria-label="Previous"></button>
                     <button class="btn btn-default round next" aria-label="Next"></button>
                  </div>
               </div>
               <div class="service-cards-container scrollable">
                  <div class="white-shadow left"></div>
                  <div class="white-shadow right"></div>
                  <div class="service-cards">
                     @foreach($companies as $company)
                        
                        <a title="Econet Buddie" href="{{route('company_detail', ['id'=>$company->id])}}">
                           <div class="icon-container">
                              <img src="#" alt="Icon" /><br />
                              <span class="text">{{$company->name}}</span>
                           </div>
                        </a>
                       
                       

                     @endforeach
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="widget-container widget-width col-md-6">
         <div>
            <div class="widget widget-2">
               <div>
                  <div class="nav hidden-xs hidden-sm">
                     <button class="btn btn-default round prev" aria-label="Previous"></button>
                     <button class="btn btn-default round next" aria-label="Next"></button>
                  </div>
                  <a title="" class="header-container">
                     <div class="logo" style="background-image: linear-gradient(to bottom, #185ff9, #99a2ff);">
                        <img src="" alt=""/>
                     </div>
                     <div class="header">
                        <h2 class="title">Active for exhibition</h2>
                        <div class="description">all active companies or individuals</div>
                     </div>
                  </a>
               </div>
               <div class="service-cards-container scrollable">
                  <div class="white-shadow left"></div>
                  <div class="white-shadow right"></div>
                  <div class="service-cards">
                     @foreach($companies as $company)
                        @if($company->status === 1)
                        <a title="Econet Buddie" href="{{route('company_detail', ['id'=>$company->id])}}">
                           <div class="icon-container">
                              <img src="#" alt="Icon" /><br />
                              <span class="text">{{$company->name}}</span>
                           </div>
                        </a>
                       
                        @endif

                     @endforeach
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row" style="font-size: initial;">
   </div>
   <script type="text/javascript">
      $(function() {
          $(".nav button").click(function() {
              var $nav = $(this),
                  container = $nav.parent().parent().parent(),
                  cards = container.find(".service-cards"),
                  serviceCardsContainer = container.find(".service-cards-container"),
                  next = $nav.hasClass("next"),
                  cardWidth = cards.find("a:first").outerWidth(true),
                  width = cardWidth,
                  viewportWidth = cards.innerWidth();
      
              // scroll multiple at a time if viewport is big enough
              while (width + cardWidth <= viewportWidth)
                  width += cardWidth;
      
              serviceCardsContainer.animate({ scrollLeft: (next ? "+=" : "-=") + width + "px" }, "fast");
          });
      });
   </script>
</div>
<div class="placeholder">
   <br>
   <script>
      $(document).ready(function(){
      	var screenWidth = window.innerWidth;
      	[].forEach.call(document.querySelectorAll("#promo-image img"), function(img) {
      	    if (screenWidth > 768) {
      	      img.setAttribute("src", img.getAttribute("data-desktop"));
      	    } else {
      	      img.setAttribute("src", img.getAttribute("data-mobile"));
      	    }  
      	});
      });
   </script>
   <br>
   <div id="promo-image">
      <a href="" title="Cyclone Idai" target="_blank"><img src="" data-desktop="" data-mobile="" /></a>
   </div>
   <br>
</div>

@endsection
