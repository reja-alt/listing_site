@extends('layouts.frontend_layout')

@section('front_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <section class="inner-page-banner" data-bg-image="frontend/media/banner/banner1.jpg">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="breadcrumbs-area">
                                        <h1>My Account</h1>
                                        <ul>
                                            <li>
                                                <a href="index.html">Home</a>
                                            </li>
                                            <li>My Account</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--=====================================-->
                    <!--=        Account Page Start      	=-->
                    <!--=====================================-->
                    <section class="section-padding-equal-70">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 sidebar-break-sm sidebar-widget-area mt-0">
                                    <div class="widget-bottom-margin widget-account-menu widget-light-bg">
                                        <h3 class="widget-border-title">Menu</h3>
                                        <ul class="nav nav-tabs flex-column" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#dashboard" role="tab" aria-selected="true">Dashboard</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#my-listing" role="tab" aria-selected="false">My Listings</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#store" role="tab" aria-selected="false">Store</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#favourite" role="tab" aria-selected="false">Favourites</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#payment" role="tab" aria-selected="false">Payments</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#accout-detail" role="tab" aria-selected="false">Account details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#logout" role="tab" aria-selected="false">Logout</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="dashboard" role="tabpanel">
                                            <div class="myaccount-dashboard light-shadow-bg">
                                                <div class="light-box-content">
                                                    <div class="media-box">
                                                        <div class="item-img">
                                                            <img src="{{url('uploads/blog/'.auth()->user()->image)}}" alt="avatar" class="rounded-circle" style="height: 50px; width: 50px;">
                                                        </div>
                                                        <div class="item-content">
                                                            <h3 class="item-title">Name :  {{ auth()->user()->name }}</h3>
                                                            <div class="item-email"><span>Email : {{ auth()->user()->email }} </span></div>
                                                        </div>
                                                    </div>
                                                    <div class="static-report">
                                                        <h3 class="report-title">Membership Report</h3>
                                                        <div class="report-list">
                                                            <div class="report-item">
                                                                <label>Status</label>
                                                                <div class="item-value">{{ auth()->user()->status }}</div>
                                                            </div>
                                                        </div>
                                                        <div class="report-list">
                                                            <div class="report-item">
                                                                <label>Validity</label>
                                                                <div class="item-value">Until 2020-09-17 05:16:15</div>
                                                            </div>
                                                        </div>
                                                        <div class="report-list">
                                                            <div class="report-item">
                                                                <label>Remaining Ads</label>
                                                                <div class="item-value">947</div>
                                                            </div>
                                                        </div>
                                                        <div class="report-list">
                                                            <div class="report-item">
                                                                <label>Posted Ads</label>
                                                                <div class="item-value">53</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="my-listing" role="tabpanel">
                                            <div class="myaccount-listing">
                                                <div class="list-view-layout1">
                                                @php
                                                    $posts=DB::table('posts')->orderBy('id','DESC')->where('user_id',Auth::user()->id)->get();
                                                @endphp
                                                @foreach ($posts as $post)
                                                    <div class="product-box-layout3">
                                                        @foreach(json_decode($post->thumbnail) as $key => $image)
                                                        @if($key == 0)
                                                        <div class="item-img">
                                                            <a href="single-product1.html"><img src="{{url($image)}}" alt="Product"></a>
                                                        </div>
                                                        @endif
                                                        @endforeach
                                                        <div class="item-content">
                                                            <h3 class="item-title"><a href="{{ route('user_post.show',$post->slug) }}">{{ $post->title }}</a><span>{{ $post->condition_type }}</span></h3>
                                                            <ul class="entry-meta">
                                                                <li><i class="far fa-clock"></i>3 months ago</li>
                                                                <li><i class="fas fa-map-marker-alt"></i>{{ $post->address }}</li>
                                                                <li><i class="far fa-eye"></i>{{ $count_view }}</li>
                                                            </ul>
                                                            <ul class="item-condition">
                                                                <li><span>Condition:</span> {{ $post->condition_type }}</li>
                                                                <li><span>Brand:</span> {{ $post->brand }}</li>
                                                            </ul>
                                                            <div class="btn-group">
                                                                <a href="#">Promote</a>
                                                                <a href="{{ route('user_post.show', $post->slug) }}" class="btn btn-sm btn-danger"><i class="fa fa-sm ">show</i></a>
                                                                <a href="{{ route('user_post.edit', $post->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-sm fa-edit"></i></a>
                                                                <a href="user_post/delete/{{$post->id}}" class="btn btn-sm btn-danger delete-confirm"><i class="fa fa-sm fa-trash"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="item-right">
                                                            <div class="item-price">
                                                                <span class="currency-symbol">TK</span>
                                                                {{ $post->price }}
                                                            </div>
                                                            <div class="item-btn">
                                                                <a href="#"></a>
                                                            </div>
                                                        </div> 
                                                        
                                                        
                                                    </div>
                                                    @endforeach
                                                </div>
                                                {{-- <div class="list-view-layout1">
                                                    <div class="product-box-layout3">
                                                        <div class="item-img">
                                                            <a href="single-product1.html"><img src="media/product/product20.jpg" alt="Product"></a>
                                                        </div>
                                                        <div class="item-content">
                                                            <h3 class="item-title"><a href="single-product1.html">China Branded Bags</a><span>New</span></h3>
                                                            <ul class="entry-meta">
                                                                <li><i class="far fa-clock"></i>3 months ago</li>
                                                                <li><i class="fas fa-map-marker-alt"></i>New Jersey, Cape May</li>
                                                                <li><i class="far fa-eye"></i>86 Views</li>
                                                            </ul>
                                                            <ul class="item-condition">
                                                                <li><span>Condition:</span> New</li>
                                                                <li><span>Brand:</span> Other Brand</li>
                                                            </ul>
                                                            <div class="btn-group">
                                                                <a href="#">Promote</a>
                                                                <a href="#">Edit</a>
                                                                <a href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                        <div class="item-right">
                                                            <div class="item-price">
                                                                <span class="currency-symbol">$</span>
                                                                1,240
                                                            </div>
                                                            <div class="item-btn">
                                                                <a href="#">Details</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-view-layout1">
                                                    <div class="product-box-layout3">
                                                        <div class="item-img">
                                                            <a href="single-product1.html"><img src="media/product/product21.jpg" alt="Product"></a>
                                                        </div>
                                                        <div class="item-content">
                                                            <h3 class="item-title"><a href="single-product1.html">Ultra HD Laptops</a><span>New</span></h3>
                                                            <ul class="entry-meta">
                                                                <li><i class="far fa-clock"></i>3 months ago</li>
                                                                <li><i class="fas fa-map-marker-alt"></i>New Jersey, Cape May</li>
                                                                <li><i class="far fa-eye"></i>86 Views</li>
                                                            </ul>
                                                            <ul class="item-condition">
                                                                <li><span>Condition:</span> New</li>
                                                                <li><span>Brand:</span> Other Brand</li>
                                                            </ul>
                                                            <div class="btn-group">
                                                                <a href="#">Promote</a>
                                                                <a href="#">Edit</a>
                                                                <a href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                        <div class="item-right">
                                                            <div class="item-price">
                                                                <span class="currency-symbol">$</span>
                                                                1,240
                                                            </div>
                                                            <div class="item-btn">
                                                                <a href="#">Details</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-view-layout1">
                                                    <div class="product-box-layout3">
                                                        <div class="item-img">
                                                            <a href="single-product1.html"><img src="media/product/product22.jpg" alt="Product"></a>
                                                        </div>
                                                        <div class="item-content">
                                                            <h3 class="item-title"><a href="single-product1.html">Kids Toy Bundle</a><span>New</span></h3>
                                                            <ul class="entry-meta">
                                                                <li><i class="far fa-clock"></i>3 months ago</li>
                                                                <li><i class="fas fa-map-marker-alt"></i>New Jersey, Cape May</li>
                                                                <li><i class="far fa-eye"></i>86 Views</li>
                                                            </ul>
                                                            <ul class="item-condition">
                                                                <li><span>Condition:</span> New</li>
                                                                <li><span>Brand:</span> Other Brand</li>
                                                            </ul>
                                                            <div class="btn-group">
                                                                <a href="#">Promote</a>
                                                                <a href="#">Edit</a>
                                                                <a href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                        <div class="item-right">
                                                            <div class="item-price">
                                                                <span class="currency-symbol">$</span>
                                                                1,240
                                                            </div>
                                                            <div class="item-btn">
                                                                <a href="#">Details</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
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
                                        <div class="tab-pane fade" id="store" role="tabpanel">
                                            <div class="light-shadow-bg post-ad-box-layout1 myaccount-store-settings">
                                                <div class="light-box-content">
                                                    <form action="#">
                                                        <div class="post-section store-banner">
                                                            <div class="post-ad-title">
                                                                <i class="far fa-image"></i>
                                                                <h3 class="item-title">Store Images</h3>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        Store Banner
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <div class="store-banner-wrapper">
                                                                            <div class="banenr-img">
                                                                                <img src="media/figure/store-banner.jpg" alt="Store Banner">
                                                                                <div class="media-action">
                                                                                    <a href="#" class="media-add"><i class="fas fa-plus"></i></a>
                                                                                    <a href="#" class="media-delete"><i class="far fa-trash-alt"></i></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="alert alert-danger">
                                                                                Recommended image size to (1180x300)px, Maximum file size 3 MB, Allowed image type (png, jpg, jpeg)
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        Store Logo
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <div class="store-banner-wrapper">
                                                                            <div class="banenr-img">
                                                                                <img src="media/figure/store10.png" alt="Store Banner">
                                                                                <div class="media-action">
                                                                                    <a href="#" class="media-add"><i class="fas fa-plus"></i></a>
                                                                                    <a href="#" class="media-delete"><i class="far fa-trash-alt"></i></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="alert alert-danger">
                                                                                Recommended image size to (180x140)px, Maximum file size 3 MB, Allowed image type (png, jpg, jpeg)
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="post-section store-schedule">
                                                            <div class="post-ad-title">
                                                                <i class="far fa-calendar"></i>
                                                                <h3 class="item-title">Store Schedule</h3>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        Opening Hours
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <div class="form-check form-radio-btn">
                                                                            <input class="form-check-input" type="radio" id="exampleRadios1" name="exampleRadios1" value="new">
                                                                            <label class="form-check-label" for="exampleRadios1">
                                                                                Always open
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check form-radio-btn">
                                                                            <input class="form-check-input" type="radio" id="exampleRadios2" name="exampleRadios1" value="used">
                                                                            <label class="form-check-label" for="exampleRadios2">
                                                                                Select Opening Hours
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="post-section store-information">
                                                            <div class="post-ad-title">
                                                                <i class="fas fa-folder-open"></i>
                                                                <h3 class="item-title">Store Information</h3>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        Id
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <input type="text" value="123" class="form-control" name="id" id="store-id" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        Name
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <input type="text" value="Saymon" class="form-control" name="name" id="store-name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        Slogan
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <input type="text" value="ok very good" class="form-control" name="slogan" id="store-slogan">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        Email
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <input type="email" value="ok@gmail.com" class="form-control" name="email" id="store-email">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        Email
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <input type="text" value="123456" class="form-control" name="phone" id="store-phone">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        Website
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <input type="text" value="https://www.radiustheme.com" class="form-control" name="website" id="store-website">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        Address
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <textarea name="address" class="form-control textarea" id="address" cols="30" rows="2">https://www.radiustheme.com</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        Description
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <textarea name="discription" class="form-control textarea" id="discription" cols="30" rows="6">https://www.radiustheme.com</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        Socials
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group store-social">
                                                                        <input type="text" value="https://www.radiustheme.com" class="form-control" name="facebook" id="store-facebook" placeholder="Facebook">
                                                                        <input type="text" class="form-control" name="twitter" id="store-twitter" placeholder="Twitter">
                                                                        <input type="text" class="form-control" name="youtube" id="store-youtube" placeholder="Youtube">
                                                                        <input type="text" class="form-control" name="linkedin" id="store-linkedin" placeholder="Linkedin">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                    
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <input type="submit" class="submit-btn" value="Update Store">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="favourite" role="tabpanel">
                                            <div class="myaccount-listing">
                                                <div class="list-view-layout1">
                                                    <div class="product-box-layout3">
                                                        <div class="item-img">
                                                            <a href="single-product1.html"><img src="media/product/product19.jpg" alt="Product"></a>
                                                        </div>
                                                        <div class="item-content">
                                                            <h3 class="item-title"><a href="single-product1.html">Galaxy Note</a><span>New</span></h3>
                                                            <ul class="entry-meta">
                                                                <li><i class="far fa-clock"></i>3 months ago</li>
                                                                <li><i class="fas fa-map-marker-alt"></i>New Jersey, Cape May</li>
                                                                <li><i class="far fa-eye"></i>86 Views</li>
                                                            </ul>
                                                            <ul class="item-condition">
                                                                <li><span>Condition:</span> New</li>
                                                                <li><span>Brand:</span> Other Brand</li>
                                                            </ul>
                                                            <div class="btn-group">
                                                                <a href="#">Remove from Favourites</a>
                                                            </div>
                                                        </div>
                                                        <div class="item-right">
                                                            <div class="item-price">
                                                                <span class="currency-symbol">$</span>
                                                                1,240
                                                            </div>
                                                            <div class="item-btn">
                                                                <a href="#">Details</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-view-layout1">
                                                    <div class="product-box-layout3">
                                                        <div class="item-img">
                                                            <a href="single-product1.html"><img src="media/product/product20.jpg" alt="Product"></a>
                                                        </div>
                                                        <div class="item-content">
                                                            <h3 class="item-title"><a href="single-product1.html">China Branded Bags</a><span>New</span></h3>
                                                            <ul class="entry-meta">
                                                                <li><i class="far fa-clock"></i>3 months ago</li>
                                                                <li><i class="fas fa-map-marker-alt"></i>New Jersey, Cape May</li>
                                                                <li><i class="far fa-eye"></i>86 Views</li>
                                                            </ul>
                                                            <ul class="item-condition">
                                                                <li><span>Condition:</span> New</li>
                                                                <li><span>Brand:</span> Other Brand</li>
                                                            </ul>
                                                            <div class="btn-group">
                                                                <a href="#">Remove from Favourites</a>
                                                            </div>
                                                        </div>
                                                        <div class="item-right">
                                                            <div class="item-price">
                                                                <span class="currency-symbol">$</span>
                                                                1,240
                                                            </div>
                                                            <div class="item-btn">
                                                                <a href="#">Details</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-view-layout1">
                                                    <div class="product-box-layout3">
                                                        <div class="item-img">
                                                            <a href="single-product1.html"><img src="media/product/product21.jpg" alt="Product"></a>
                                                        </div>
                                                        <div class="item-content">
                                                            <h3 class="item-title"><a href="single-product1.html">Ultra HD Laptops</a><span>New</span></h3>
                                                            <ul class="entry-meta">
                                                                <li><i class="far fa-clock"></i>3 months ago</li>
                                                                <li><i class="fas fa-map-marker-alt"></i>New Jersey, Cape May</li>
                                                                <li><i class="far fa-eye"></i>86 Views</li>
                                                            </ul>
                                                            <ul class="item-condition">
                                                                <li><span>Condition:</span> New</li>
                                                                <li><span>Brand:</span> Other Brand</li>
                                                            </ul>
                                                            <div class="btn-group">
                                                                <a href="#">Remove from Favourites</a>
                                                            </div>
                                                        </div>
                                                        <div class="item-right">
                                                            <div class="item-price">
                                                                <span class="currency-symbol">$</span>
                                                                1,240
                                                            </div>
                                                            <div class="item-btn">
                                                                <a href="#">Details</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-view-layout1">
                                                    <div class="product-box-layout3">
                                                        <div class="item-img">
                                                            <a href="single-product1.html"><img src="media/product/product22.jpg" alt="Product"></a>
                                                        </div>
                                                        <div class="item-content">
                                                            <h3 class="item-title"><a href="single-product1.html">Kids Toy Bundle</a><span>New</span></h3>
                                                            <ul class="entry-meta">
                                                                <li><i class="far fa-clock"></i>3 months ago</li>
                                                                <li><i class="fas fa-map-marker-alt"></i>New Jersey, Cape May</li>
                                                                <li><i class="far fa-eye"></i>86 Views</li>
                                                            </ul>
                                                            <ul class="item-condition">
                                                                <li><span>Condition:</span> New</li>
                                                                <li><span>Brand:</span> Other Brand</li>
                                                            </ul>
                                                            <div class="btn-group">
                                                                <a href="#">Remove from Favourites</a>
                                                            </div>
                                                        </div>
                                                        <div class="item-right">
                                                            <div class="item-price">
                                                                <span class="currency-symbol">$</span>
                                                                1,240
                                                            </div>
                                                            <div class="item-btn">
                                                                <a href="#">Details</a>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                        <div class="tab-pane fade" id="payment" role="tabpanel">
                                            <div class="myaccount-payment light-shadow-bg">
                                                <div class="light-box-content">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Payment ID</th>
                                                                    <th>Amount</th>
                                                                    <th>Type</th>
                                                                    <th>Status</th>
                                                                    <th>Date</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#">2125</a></td>
                                                                    <td>
                                                                        <div class="price-amount">
                                                                            10
                                                                            <span class="currency-symbol">$</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>Direct Bank Transfer</td>
                                                                    <td>Pending</td>
                                                                    <td>December 14, 2019 @ 6:49 am</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">2126</a></td>
                                                                    <td>
                                                                        <div class="price-amount">
                                                                            10
                                                                            <span class="currency-symbol">$</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>Direct Bank Transfer</td>
                                                                    <td>Pending</td>
                                                                    <td>December 14, 2019 @ 6:49 am</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">2127</a></td>
                                                                    <td>
                                                                        <div class="price-amount">
                                                                            10
                                                                            <span class="currency-symbol">$</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>Direct Bank Transfer</td>
                                                                    <td>Pending</td>
                                                                    <td>December 14, 2019 @ 6:49 am</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">2128</a></td>
                                                                    <td>
                                                                        <div class="price-amount">
                                                                            10
                                                                            <span class="currency-symbol">$</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>Direct Bank Transfer</td>
                                                                    <td>Pending</td>
                                                                    <td>December 14, 2019 @ 6:49 am</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">2129</a></td>
                                                                    <td>
                                                                        <div class="price-amount">
                                                                            10
                                                                            <span class="currency-symbol">$</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>Direct Bank Transfer</td>
                                                                    <td>Pending</td>
                                                                    <td>December 14, 2019 @ 6:49 am</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">2130</a></td>
                                                                    <td>
                                                                        <div class="price-amount">
                                                                            10
                                                                            <span class="currency-symbol">$</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>Direct Bank Transfer</td>
                                                                    <td>Pending</td>
                                                                    <td>December 14, 2019 @ 6:49 am</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">2131</a></td>
                                                                    <td>
                                                                        <div class="price-amount">
                                                                            10
                                                                            <span class="currency-symbol">$</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>Direct Bank Transfer</td>
                                                                    <td>Pending</td>
                                                                    <td>December 14, 2019 @ 6:49 am</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">2132</a></td>
                                                                    <td>
                                                                        <div class="price-amount">
                                                                            10
                                                                            <span class="currency-symbol">$</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>Direct Bank Transfer</td>
                                                                    <td>Pending</td>
                                                                    <td>December 14, 2019 @ 6:49 am</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">2133</a></td>
                                                                    <td>
                                                                        <div class="price-amount">
                                                                            10
                                                                            <span class="currency-symbol">$</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>Direct Bank Transfer</td>
                                                                    <td>Pending</td>
                                                                    <td>December 14, 2019 @ 6:49 am</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">2134</a></td>
                                                                    <td>
                                                                        <div class="price-amount">
                                                                            10
                                                                            <span class="currency-symbol">$</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>Direct Bank Transfer</td>
                                                                    <td>Pending</td>
                                                                    <td>December 14, 2019 @ 6:49 am</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
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
                                        <div class="tab-pane fade" id="accout-detail" role="tabpanel">
                                            <div class="light-shadow-bg post-ad-box-layout1 myaccount-store-settings myaccount-detail">
                                                <div class="light-box-content">
                                                    <form action="#">
                                                        <div class="post-section basic-information">
                                                            <div class="post-ad-title">
                                                                <i class="fas fa-user"></i>
                                                                <h3 class="item-title">Basic Information</h3>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        Username
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <div class="text-value">demo</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        First Name
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <input type="text" value="Saymon" class="form-control" name="first-name" id="first-name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        Last Name
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <input type="text" value="Mondol" class="form-control" name="last-name" id="last-name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        Email
                                                                        <span>*</span>
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <input type="email" value="techlabpro.8@gmail.com" class="form-control" name="email" id="email">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        Change Password
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group mb-5">
                                                                        <div class="form-check form-check-box">
                                                                            <input class="form-check-input" type="checkbox" id="password" value="password">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        Phone
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <input type="text" value="09988434436" class="form-control" name="phone1" id="phone1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        WhatsApp Phone
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <input type="text" value="0812345678900" class="form-control" name="phone2" id="phone2">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        Website
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <input type="text" value="https://www.radiustheme.com" class="form-control" name="website" id="website">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="post-section location-detail">
                                                            <div class="post-ad-title">
                                                                <i class="fas fa-map-marker-alt"></i>
                                                                <h3 class="item-title">Location</h3>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        State
                                                                        <span>*</span>
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <select class="form-control select-box">
                                                                            <option value="0">Select State</option>
                                                                            <option value="1">California</option>
                                                                            <option value="2">Florida</option>
                                                                            <option value="3">Hawaii</option>
                                                                            <option value="4">Indiana</option>
                                                                            <option value="5">Kansas</option>
                                                                            <option value="6">Michigan</option>
                                                                            <option value="7">New Jersey</option>
                                                                            <option value="8">New Mexico</option>
                                                                            <option value="9">New York</option>
                                                                            <option value="10">Pennsylvania</option>
                                                                            <option value="11">Texas</option>
                                                                            <option value="12">Washington</option>
                                                                            <option value="13">Wyoming</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        City
                                                                        <span>*</span>
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <select class="form-control select-box">
                                                                            <option value="0">Select City</option>
                                                                            <option value="1">Los Angeles</option>
                                                                            <option value="2">LAX/LA Beaches</option>
                                                                            <option value="3">San Diego</option>
                                                                            <option value="4">San Jose</option>
                                                                            <option value="5">San Francisco</option>
                                                                            <option value="6">Fresno</option>
                                                                            <option value="7">Sacramento</option>
                                                                            <option value="8">Oakland</option>
                                                                            <option value="9">Bakersfield</option>
                                                                            <option value="10">Riverside</option>
                                                                            <option value="11">Eureka</option>
                                                                            <option value="12">Death Valley</option>
                                                                            <option value="12">Mammoth Lakes</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        Zip Code
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <input type="text" value="201301" class="form-control" name="zipcode" id="post-zip">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        Address
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <textarea name="address1" class="form-control textarea" id="address1" cols="30" rows="2">Melbourne</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label class="control-label">
                                                                        Map
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <div id="googleMap" class="google-map" style="width: 100%; height: 400px;"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                    
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <input type="submit" class="submit-btn" value="Update Account">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="logout" role="tabpanel">
                                            <div class="myaccount-login-form light-shadow-bg">
                                                <div class="light-box-content">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-box login-form">
                                                                <h3 class="item-title">Login</h3>
                                                                <form action="#">
                                                                    <div class="form-group">
                                                                        <label>Username or E-mail</label>
                                                                        <input type="text" class="form-control" name="login-username" id="login-username">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Password</label>
                                                                        <input type="text" class="form-control" name="login-password" id="login-password">
                                                                    </div>
                                                                    <div class="form-group d-flex">
                                                                        <input type="submit" class="submit-btn" value="Login">
                                                                        <div class="form-check form-check-box">
                                                                            <input class="form-check-input" type="checkbox" id="check-password">
                                                                            <label for="check-password">Remember Me</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <a href="#" class="forgot-password">Forgot your password?</a>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-box registration-form">
                                                                <h3 class="item-title">Register</h3>
                                                                <form action="#">
                                                                    <div class="form-group">
                                                                        <label>Username *</label>
                                                                        <input type="text" class="form-control" name="registration-username" id="registration-username">
                                                                        <div class="help-block">Username cannot be changed.</div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Email address *</label>
                                                                        <input type="email" class="form-control" name="registration-email" id="registration-email">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Password *</label>
                                                                        <input type="text" class="form-control" name="registration-password" id="registration-password">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="submit" class="submit-btn" value="Register">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
    $('.delete-confirm').on('click', function (event) {
     event.preventDefault();
     const url = $(this).attr('href');
     swal({
         title: 'Are you sure?',
         text: 'This record and it`s details will be permanantly deleted!',
         icon: 'warning',
         buttons: ["Cancel", "Yes!"],
     }).then(function(value) {
         if (value) {
             window.location.href = url;
         }
     });
 });
 </script>
@endsection
