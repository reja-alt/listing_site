@extends('layouts.frontend_layout')
@section('front_content')

<!--=====================================-->
<!--=        Inner Banner Start         =-->
<!--=====================================-->
<section class="inner-page-banner" data-bg-image="frontend/media/banner/banner1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-area">
                    <h1>FAQ</h1>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>FAQ</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================-->
<!--=        Faq Page Start      		=-->
<!--=====================================-->
<section class="section-padding-equal-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <div class="faq-box-layout1">
                    <h2 class="item-title">Frequently Asked Questions</h2>
                    <p>Your FAQ page isn’t just there to address common questions about your business. That’s only part of it.

                        An FAQ section done right can be an effective addition to your website that serves several functions, from: </p>
                    <div id="accordion" class="accordion-box">
                        <div class="card">
                            @foreach ($faqs  as $key => $faq)
                            <div class="card-header">
                                <a class="heading-title collapsed" data-toggle="collapse" href="#collapseOne{{ $key+1 }}" role="button" aria-expanded="false">
                                    {{  $faq->question }}
                                </a>
                            </div>
                            <div id="collapseOne{{ $key+1 }}" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <p>{{  $faq->answer }}</p>
                                </div>
                            </div> 
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 sidebar-break-sm sidebar-widget-area">
                <div class="widget-lg widget-light-bg widget-search-box">
                    <h3 class="widget-border-title">Search</h3>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search here...">
                        <div class="input-group-append">
                            <button type="button"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="widget-lg widget-light-bg widget-category">
                    <h3 class="widget-border-title">Categories</h3>
                    <div class="category-list">
                        <ul>
                            @foreach($categories as $category)
                                <div><img src="{{url('uploads/blog/'.$category->icon)}}" style="width: 20px; height: 20px;" alt="category">  <a href="{{ route('category.post',$category->slug) }}">{{  $category->name }}</a></div>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="widget-lg widget-light-bg widget-category">
                    <h3 class="widget-border-title">Archives</h3>
                    <div class="category-list">
                        <ul>
                            <li><a href="#">July 2019</a></li>
                            <li><a href="#">June 2019</a></li>
                        </ul>
                    </div>
                </div>
                <div class="widget-lg widget-light-bg widget-tag">
                    <h3 class="widget-border-title">Tags</h3>
                    <div class="tag-list">
                        <ul>
                            <li><a href="#">Advertising</a></li>
                            <li><a href="#">Analysis</a></li>
                            <li><a href="#">Computer</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Mobile</a></li>
                            <li><a href="#">Social</a></li>
                            <li><a href="#">Tips</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection