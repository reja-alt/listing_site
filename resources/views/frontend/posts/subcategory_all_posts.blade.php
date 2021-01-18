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
                            <h1>All Ads</h1>
                            <ul>
                                <li>
                                    <a href="{{ route('frontend.index') }}">Home</a>
                                </li>
                                <li>All Ads</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================-->
        <!--=          Search Box Start         =-->
        <!--=====================================-->
        <section class="bg-accent">
            <div class="container">
                <div class="search-box-wrap-layout3">
                    <div class="search-box-layout1">
                        <form action="#">
                            <div class="row no-gutters">
                                <div class="col-lg-3 form-group">
                                    <div class="input-search-btn search-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <label>Select Location</label>
                                    </div>
                                </div>
                                <div class="col-lg-3 form-group">
                                    <div class="input-search-btn search-category">
                                        <i class="fas fa-tags"></i>
                                        <label>Select Category</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 form-group">
                                    <div class="input-search-btn search-keyword">
                                        <i class="fas fa-text-width"></i>
                                        <input type="text" class="form-control" placeholder="Enter Keyword here ..." name="keyword">
                                    </div>
                                </div>
                                <div class="col-lg-2 form-group">
                                    <button type="submit" class="submit-btn"><i class="fas fa-search"></i>Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================-->
        <!--=          Product Start         =-->
        <!--=====================================-->
        <section class="product-inner-wrap-layout1 bg-accent">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 sidebar-break-md sidebar-widget-area" id="accordion">
                        <div class="widget-bottom-margin-md widget-accordian widget-filter">
                            <h3 class="widget-bg-title">Filter</h3>
                            <form action="#">
                                <div class="accordion-box">
                                    <div class="card filter-type filter-item-list">
                                        <div class="card-header">
                                            <a class="parent-list" role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                                                Type
                                            </a>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="filter-type-content">
                                                    <ul>
                                                        <li class="form-check">
                                                            <input class="form-check-input" type="radio" name="radioexample" id="radio1" value="Sell">
                                                            <label class="form-check-label" for="radio1">Sell</label>
                                                        </li>
                                                        <li class="form-check">
                                                            <input class="form-check-input" type="radio" name="radioexample" id="radio2" value="Buy">
                                                            <label class="form-check-label" for="radio2">Buy</label>
                                                        </li>
                                                        <li class="form-check">
                                                            <input class="form-check-input" type="radio" name="radioexample" id="radio3" value="Exchange">
                                                            <label class="form-check-label" for="radio3">Exchange</label>
                                                        </li>
                                                        <li class="form-check">
                                                            <input class="form-check-input" type="radio" name="radioexample" id="radio4" value="Job">
                                                            <label class="form-check-label" for="radio4">Job</label>
                                                        </li>
                                                        <li class="form-check">
                                                            <input class="form-check-input" type="radio" name="radioexample" id="radio5" value="To-Let">
                                                            <label class="form-check-label" for="radio5">To-Let</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card filter-category multi-accordion filter-item-list">
                                        <div class="card-header">
                                            <a class="parent-list" role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="true">
                                                Category
                                            </a>
                                        </div>
                                        <div id="collapseTwo" class="collapse show" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="multi-accordion-content" id="accordion2">
                                                    <div class="card">
                                                        @foreach($categories as $key => $category)
                                                       
                                                        <div class="card-header">
                                                            
                                                            <a class="parent-list collapsed" role="button" data-toggle="collapse" href="#category{{ $key+1 }}" aria-expanded="false">
                                                                <a href="{{ route('category.post',$category->slug) }}">  <img src="{{url('uploads/blog/'.$category->icon)}}" style="width: 20px; height: 20px;" alt="category">{{ $category->name }}</a>
                                                            </a>
                                                        </div>
                                                        <div id="category{{ $key+1 }}" class="collapse" data-parent="#accordion2">
                                                            <div class="card-body">

                                                                <ul class="sub-list">
                                                                    @foreach($category->subcategories as $subcategory)
                                                                    
                                                                    <li><a href="{{ route('subcategory.post',$subcategory->slug) }}">{{ $subcategory->name }} &amp; Tools (0)</a></li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                       
                                                        @endforeach
                                                    </div>
                                                 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card filter-location multi-accordion filter-item-list">
                                        <div class="card-header">
                                            <a class="parent-list" role="button" data-toggle="collapse" href="#collapseThree" aria-expanded="true">
                                                Location
                                            </a>
                                        </div>
                                       
                                        <div id="collapseThree" class="collapse show" data-parent="#accordion">  
                                            <div class="card-body">
                                                <div class="multi-accordion-content" id="accordion3">
                                                    <div class="card">
                                                        @foreach ($divisions as $key => $division)
                                                        <div class="card-header">
                                                            <a class="parent-list collapsed" role="button" data-toggle="collapse" href="#location{{ $key+1 }}" aria-expanded="false">
                                                                <a href="{{ route('division.post',$division->slug) }}">{{ $division->name }}</a>
                                                            </a>
                                                        </div>
                                                        <div id="location{{ $key+1 }}" class="collapse" data-parent="#accordion3">
                                                            <div class="card-body">
                                                                <ul class="sub-list">
                                                                    @foreach ($division->districts as $district)
                                                                    <li><a href="{{ route('district.post',$district->slug) }}">{{ $district->name }}</a></li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     
                                    </div>
                                    <div class="card filter-price-range filter-item-list">
                                        <div class="card-header">
                                            <a class="parent-list" role="button" data-toggle="collapse" href="#collapseFour" aria-expanded="true">
                                                Price Range
                                            </a>
                                        </div>
                                        <div id="collapseFour" class="collapse show" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="price-range-content">
                                                    <div class="row">
                                                        <div class="col-lg-6 form-group">
                                                            <input type="number" name="filter-price-min" class="form-control" placeholder="min">
                                                        </div>
                                                        <div class="col-lg-6 form-group">
                                                            <input type="number" name="filter-price-min" class="form-control" placeholder="max">
                                                        </div>
                                                        <div class="col-12 form-group">
                                                            <button type="submit" class="filter-btn">Apply Filters</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="product-filter-heading">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2 class="item-title">Showing 1–9 of 16 results</h2>
                                </div>
                                <div class="col-md-6 d-flex justify-content-md-end justify-content-center">
                                    <div class="product-sorting">
                                        <div class="ordering-controller">
                                            <button class="ordering-btn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                Sort By
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">A to Z (title)</a>
                                                <a class="dropdown-item" href="#">Z to A (title)</a>
                                                <a class="dropdown-item" href="#">Data Added (oldest)</a>
                                                <a class="dropdown-item" href="#">Most Viewed</a>
                                                <a class="dropdown-item" href="#">Less Viewed</a>
                                                <a class="dropdown-item" href="#">Price (low to high)</a>
                                                <a class="dropdown-item" href="#">Price (high to low)</a>
                                            </div>
                                        </div>
                                        <div class="layout-switcher">
                                            <ul>
                                                <li>
                                                    <a href="#" data-type="product-box-list" class="product-view-trigger">
                                                        <i class="fas fa-th-list"></i>
                                                    </a>
                                                </li>
                                                <li class="active">
                                                    <a class="product-view-trigger" href="#" data-type="product-box-grid">
                                                        <i class="fas fa-th-large"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="product-view" class="product-box-grid">
                            <div class="row">
                                @foreach($subcategory_posts as $subcategory_post)
                                <div class="col-xl-4 col-md-6">
                                    <div class="product-grid-view">
                                        <div class="grid-view-layout1">
                                            
                                            <div class="product-box-layout1 top-rated-grid">
                                                <div class="item-img">
                                                   

                                                    @foreach(json_decode($subcategory_post->thumbnail) as $key => $image)
                                                    @if($key == 0)
                                                    <a href="single-product1.html"><img src="{{url($image)}}" alt="Product"></a>
                                                    @endif
                                                    @endforeach
                                                </div>
                                                
                                                <div class="item-content">
                                                    <h3 class="item-title"><a href="{{ route('user_post.show',$subcategory_post->slug) }}">{{ $subcategory_post->title }}</a><span>{{ $subcategory_post->condition_type }}</span></h3>
                                                    <ul class="entry-meta">
                                                        <li><i class="far fa-clock"></i>{{ \Carbon\Carbon::parse($subcategory_post->created_at)->diffForHumans()}}</li>
                                                        <li><i class="fas fa-map-marker-alt"></i>{{ $subcategory_post->address }}</li>
                                                    </ul>
                                                    <div class="item-price">
                                                        <span class="currency-symbol">TK</span>
                                                       {{ $subcategory_post->price }}
                                                    </div>
                                                </div>
                                               
                                            </div>
                                           
                                        </div>
                                    </div>
                                    
                                </div>
                                @endforeach
                               
                            </div>
                        </div>
                        <div class="pagination-layout1">
                            <div class="btn-prev disabled">
                                <a href="#"><i class="fas fa-angle-double-left"></i>Previous</a>
                            </div>
                            <div class="page-number">
                                <a href="#" class="active">1</a>
                                <a href="#">2</a>
                            </div>
                            <div class="btn-next">
                                <a href="#">Next<i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================-->
        <!--=       Footer Start           	=-->
        <!--=====================================-->
@endsection