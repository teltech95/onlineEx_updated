@extends('layouts.main')

@section('content')
<div class="home">
    <div class="row">
        <div class="col-sm-6 col-sm-push-6 col-md-5 col-md-push-7">
            <div class="customer-engagement-container clearfix">
            
            </div>
        </div>
        <div class="search-container col-sm-6 col-sm-pull-6 col-md-4 col-md-pull-5">
            <div class="search-box-container">
                <div class="form-group has-feedback has-feedback-left">
                <input id="search-box" class="form-control" type="text" autocomplete="off" placeholder="What are you looking for?" aria-label="What are you looking for?" />
                <i class="form-control-feedback icon icon-search"></i>
                <img src="/content/loader_grey.gif" alt="" id="spinner" style="position: absolute; right: 10px; top: 12px; display: none;" />
                </div>
                <ul class="search-results" style="display: none"></ul>
            </div>
            <script type="text/javascript">
                $(function () {
                    var searchTimeout = null;
                
                    $(document).on("click", ".search-results li a.result", function () {
                        $("#search-box").val(this.text);
                    });
                
                    $("#search-box").keyup(function () {
                        var val = $("#search-box").val(),
                            list = "<ul class='search-results'>";
                
                        if (val) {
                
                            if (searchTimeout)
                                clearTimeout(searchTimeout);
                
                            searchTimeout = setTimeout(function () {
                
                                $(".search-box-container #spinner").show();
                
                                $.post("/home/search?q=" + val,
                                    function (response) {
                                        $(".search-box-container #spinner").hide();
                                        if (response.length > 0) {
                                            $.each(response,
                                                function () {
                                                    list += "<li><a class='result' href='" + this.Url + "'>";
                                                    var img = "";
                
                                                    if (this.Img)
                                                        img = "<img src='" + this.Img + "' />";
                
                                                    if (this.BackgroundImage)
                                                        img = "<div class='img-container' style='border-radius: 50%; background-image:" + this.BackgroundImage + "'>" + img + "</div>";
                
                                                    list += img + this.Title + "</a></li>";
                
                                                });
                                            list += "</ul>";
                                        } else {
                                            list += "<li><a class='noresults' href='javascript:void(0);'>No results</a></li></ul>";
                                        }
                                        $("ul.search-results").replaceWith($(list)).show();
                                    });
                            },
                            500);
                
                        } else {
                            list += "<li><a title='What are you looking for?' class='what' href='javascript:void(0);'>What are you looking for?</a></li></ul>";
                            $("ul.search-results").replaceWith($(list)).show();
                        }
                
                    }).focus(function () {
                        if (window.innerWidth < 768) {
                            $("#search-box")[0].scrollIntoView();
                            window.scrollBy(0, -10);
                        }
                        $("#search-box").trigger("keyup");
                
                    }).blur(function () {
                        setTimeout(function () { $("ul.search-results").hide() }, 200);
                
                    });
                });
                
            </script>
        </div>
    </div>
    <div class="row">
        <div class="categories-container">
            <div class="widget">
                <button onclick="ScrollCats(false)" class="btn btn-default round prev hidden-xs" aria-label="Previous"></button>
                <button onclick="ScrollCats(true)" class="btn btn-default round next hidden-xs" aria-label="Next"></button>
                <div class="service-cards-container scrollable" id="categories-scroll-container">
                    <div class="categories service-cards">
                        @php
                            $categories = DB::select('select * from category');
                        @endphp
                        @foreach($categories as $cat )
                        <a href="{{route('category_detail', ['id'=>$cat->id])}}" title="" class="category" style="background-image: linear-gradient(to bottom, {{$cat->theme_one}}, {{$cat->theme_two}});">
                            <div class="icon-container">
                                
                                <span class="text">{{$cat->name}}</span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function ScrollCats(next) {
                var c = $('#categories-scroll-container');
                c.animate({ scrollLeft: "+=" + (c.width() * (next ? 1 : -1)) + "px" }, "fast");
            }
        </script>
    </div>
    <div class="row placeholder placeholder-1">
        <div id="carousel-main" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-main" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-main" data-slide-to="1"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div role="option" class="item active">
                <a rel="noopener" aria-label="TelOne Multi Payments" href="https://www.topup.co.zw/buy-telone-adsl-vouchers-online"><img alt="" data-desktop="https://ads.paynow.co.zw/www/images/3bcbf05dcafc462b351d9928ccd9ef4d.png" data-mobile="https://ads.paynow.co.zw/www/images/3bcbf05dcafc462b351d9928ccd9ef4d.png"></a>
                </div>
                <div role="option" class="item">
                <a rel="noopener" aria-label="Contact Our Customer Care Team" href="https://www.paynow.co.zw/blog/contact-our-customer-care-team/" target="_blank"><img alt="" data-desktop="https://ads.paynow.co.zw/www/images/c75812ae73ffa8e356784c74f192c710.png" data-mobile="https://ads.paynow.co.zw/www/images/c7934753ba53e85ff8d0faca589f5023.png"></a>
                </div>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-main" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-main" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
        <script>
            var screenWidth = window.innerWidth;
            [].forEach.call(document.querySelectorAll(".carousel img"), function(img) {
                if (screenWidth > 768) {
                img.setAttribute("src", img.getAttribute("data-desktop"));
                } else {
                img.setAttribute("src", img.getAttribute("data-mobile"));
                }  
            });
        </script>
    </div>
    

</div>
@endsection