@extends('layouts.frontend_layout')
@section('front_content')
<section class="main-banner-wrap-layout2 bg-dark-overlay-2 bg-common" data-bg-image="frontend/media/banner/banner2.jpg">
    <div class="container">
        <div class="main-banner-box-layout1 animated-headline">
            <h1 class="ah-headline item-title">
                <span class="ah-words-wrapper">
                    <b class="is-visible">Buy, Sell, Rent &amp; Exchange in one click</b>
                    <b>Buy, Sell, Rent &amp; Exchange in one click</b>
                </span>
            </h1>
            <div class="item-subtitle">Search from over 2000+ Active Ads in 29+ Categories for Free</div>
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
        <!--=            Category Start  Home 1         =-->
        <!--=====================================-->
        <section class="section-padding-top-heading">
            <div class="container">
                <div class="heading-layout1">
                    <h2 class="heading-title">Popular Categories</h2>
                </div>
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="category-box-layout1">
                                <a href="{{ route('category.post',$category->slug) }}">
                                    <div class="item-icon">
                                        <img src="{{asset('uploads/blog')}}/{{$category->icon}}" alt="image" style="width: 40px; height: 40px;">
                                    </div>
                                    <div class="item-content">
                                        <h3 class="item-title">{{ $category->name }}</h3>
                                        <div class="item-count">{{ $category->post->count() }}</div>
                                    </div>
                                </a>
                            </div>
                        </div> 
                    @endforeach
                </div>
            </div>
        </section>
        <!--=====================================-->
        <!--=            Product Start          =-->
        <!--=====================================-->
        <section class="section-padding-top-heading bg-accent">
            <div class="container">
                <div class="row gutters-20">
                    <div class="col-xl-9 col-lg-8">
                        <div class="heading-layout2">
                            <h2 class="heading-title">Featured Ads</h2>
                        </div>
                        @php
                            $posts=DB::table('posts')->orderBy('id','DESC')->limit(5)->get();
                        @endphp
                        @foreach ($posts as $post)
                        <div class="product-box-layout2">
                            <div class="item-img">
                                @foreach(json_decode($post->thumbnail) as $key => $image)
                                @if($key == 0)
                                <div class="item-img">
                                    <a href="single-product1.html"><img src="{{url($image)}}" alt="Product"></a>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a href="{{ route('user_post.show',$post->slug) }}">{{ $post->title }}</a></h3>
                                <div class="item-price pull-right" style="margin-top: -35px;">{{$post->price}} TK</div>
                                <ul class="entry-meta">
                                    {{-- <li><i class="fas fa-map-marker-alt"></i>{{$post->city}},</li> --}}
                                    <li><i class="fas fa-tag"></i><a href="#"></a></li>
                                   
                                    <li><i class="far fa-eye"></i>{{$post->view}}</li>
                                </ul>
                                <p>{!!str_limit($post->description,180,'....')  !!}</p>
                                
                            </div>
                        </div>  
                        @endforeach         
                    </div>
                    <div class="col-xl-3 col-lg-4 sidebar-widget-area sidebar-space-sm">
                        <div class="heading-layout2">
                            <h2 class="heading-title">Popular Stores</h2>
                        </div>
                        <div class="widget-bottom-margin widget-store">
                            @php
                                $vendors=DB::table('users')->where('is_admin',3)->get(); 
                            @endphp
                            @foreach($vendors as $vendor)
                            <div class="store-list">
                                <div class="store-logo">
                                    <a href="store-detail.html"><img src="{{asset('uploads/blog')}}/{{$vendor->image}}" alt="store" class="rounded-circle" style="height: 70px; width: 70px;"></a>
                                </div>
                                
                                <div class="store-content">
                                    <h3 class="item-title"><a href="{{ route('vendor.post',$vendor->is_admin) }}"> {{  $vendor->name }}</a></h3>
                                    <div class="store-establish"> {{  $vendor->email }}</div>
                                    <div class="item-count">1 Ad</div>
                                </div>
                                
                            </div>
                            @endforeach
                            
                        </div>
                        <div class="widget-bottom-margin widget-banner">
                            <a href="#">
                                <img src="media/figure/widget-banner.png" alt="banner">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
        <!--=====================================-->
        <!--=       Process Start           	=-->
        <!--=====================================-->
        <section class="process-wrap-layout1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="process-box-layout1">
                            <h3 class="item-title">Placing Ads Has Never Been Easier!</h3>
                            <div class="item-content">
                                <ul>
                                    <li>Submit your Ads</li>
                                    <li>Promote your Ads</li>
                                    <li>Save favorite Ads</li>
                                    <li>Share on Social Media</li>
                                    <li>And more...</li>
                                </ul>
                            </div>
                            <div class="item-btn">
                                <a href="{{ route('user.login') }}" class="btn-fill-lg bgLight color-dark">Register Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================-->
        <!--=       Blog Start           	=-->
        <!--=====================================-->
        <section class="section-padding-top-heading bg-accent">
            <div class="container">
                <div class="heading-layout1">
                    <h2 class="heading-title">Latest Blog Posts</h2>
                </div>
                <div class="row">
                    @php
                        $blogs=DB::table('blogs')->orderBy('id','DESC')->limit(3)->get();
                    @endphp
                    @foreach ($blogs as $blog)
                        <div class="col-lg-4">
                            <div class="blog-box-layout1">
                                <div class="item-img">
                                    <a href="single-blog.html"><img src="{{asset('uploads/blog')}}/{{$blog->image}}" alt="blog"></a>
                                </div>
                                <div class="item-content">
                                    <ul class="post-meta">
                                        <li>{{ \Carbon\Carbon::parse($blog->created_at)->format('j F, Y')}}</li>
                                        <li> <a href="#"></a></li>
                                    </ul>
                                    <h3><a href="{{ route('single.blog',$blog->slug) }}">{{ $blog->title }}</a></h3>
                                </div>
                                
                                
                            </div>
                        
                        </div>
                    @endforeach
                </div>
                
            </div>
        </section>
        <style>
            .item-content h3{
                font-family:Arial, Helvetica, sans-serif;
                font-size: 20px;
                font-weight: 600;
                line-height: 28px;
            }

            .item-content h3 a {
                color: rgb(70, 68, 68)
            }

            .item-content h3  :hover{
                color: rgb(45, 245, 245);    
            }

            .item-content p{
                font-family:Arial, Helvetica, sans-serif;
                font-size: 13px;
                font-weight: 400;
                line-height: 21px;
                color: rgb(102, 102, 102);
            }

        </style>

@endsection