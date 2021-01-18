@extends('layouts.frontend_layout')

@section('front_content')
<section class="inner-page-banner" data-bg-image="frontend/media/banner/banner1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-area">
                    <h1>Blog</h1>
                    <ul>
                        <li>
                            <a href="{{ route('frontend.index') }}">Home</a>
                        </li>
                        <li>Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================-->
<!--=        Blog Start      			=-->
<!--=====================================-->
<section class="section-padding-equal-70 bg-accent">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <div class="row">
                    @php
                        $blogs=DB::table('blogs')->orderBy('id','DESC')->get();
                    @endphp
                    @foreach ($blogs as $blog)
                    <div class="col-lg-6">
                        <div class="blog-box-layout2 mg-b-30">
                            <div class="item-img">
                                <a href="single-blog.html">
                                    <img src="{{asset('uploads/blog')}}/{{$blog->image}}" alt="Blog">
                                </a>
                            </div>
                            <div class="item-content">
                                <h3><a href="{{  route('single.blog',$blog->slug) }}">{{ $blog->title }}</a></h3>
                                <ul class="blog-entry-meta">
                                    <li><i class="far fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($blog->created_at)->format('j F, Y')}}</li>
                                    <li><i class="fas fa-user"></i><a href="#">RadiusTheme</a></li>
                                    <li><i class="fas fa-comments"></i>(0)</li>
                                </ul>
                                <p>{{ str_limit($blog->details,'150','....') }}</p>
                            </div>    
                        </div>
                    </div>
                    @endforeach
                </div>
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
                            @php
                                $categories=DB::table('categories')->orderBy('id','DESC')->get();
                            @endphp
                            @foreach($categories as $category)
                                <div><img src="{{url('uploads/blog/'.$category->icon)}}" style="width: 20px; height: 20px;" alt="category">  <a href="{{ route('category.blog.show',$category->id) }}">{{  $category->name }}</a></div>
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