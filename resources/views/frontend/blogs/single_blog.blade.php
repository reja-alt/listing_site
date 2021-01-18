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
                            <h1>{{ $blog->title }}</h1>
                            <ul>
                                <li>
                                    <a href="{{ route('frontend.index') }}">Home</a>
                                </li>
                                <li>
                                    <a href="index.html">{{  $blog->category->name }}</a>
                                </li>
                                <li>{{ $blog->title }}</li>
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
                    <div class="col-lg-9">
                        <div class="single-blog-box-layout1">
                            <div class="light-shadow-bg">
                                <div class="single-blog-content light-box-content">
                                    <div class="item-img">
                                        <img src="{{asset('uploads/blog')}}/{{$blog->image}}" alt="Blog">
                                    </div>
                                    <div class="item-content">
                                        <ul class="blog-entry-meta">
                                            <li><i class="far fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($blog->created_at)->format('j F, Y')}}</li>
                                            <li><i class="fas fa-user"></i><a href="#">RadiusTheme</a></li>
                                            <li><i class="fas fa-comments"></i>(0)</li>
                                            <li><i class="fas fa-tags"></i><a href="#">{{ $blog->tags }}</a> <a href="#">{{ $blog->tags }}</a></li>
                                        </ul>
                                        <p>{{ $blog->details}}</p>
                                      
                                        
                                        <div class="item-gallery">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="item-img">
                                                        <img src="{{asset('uploads/blog')}}/{{$blog->image}}" alt="Blog">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="item-img">
                                                        <img src="{{asset('uploads/blog')}}/{{$blog->image}}" alt="Blog">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p>{{ $blog->details }}</p>
                                        <div class="blog-footer">
                                            <div class="row align-items-center">
                                                <div class="col-md-6">
                                                    <div class="item-tag">
                                                        <a href="#">Analysis</a>
                                                        <a href="#">Food</a>
                                                        <a href="#">Social</a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="item-share">
                                                        <span class="share-title">Share <i class="fas fa-share-alt"></i></span>
                                                        <ul class="item-social">
                                                            <li><a href="#" class="bg-facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                            <li><a href="#" class="bg-twitter"><i class="fab fa-twitter"></i></a></li>
                                                            <li><a href="#" class="bg-google"><i class="fab fa-google-plus-g"></i></a></li>
                                                            <li><a href="#" class="bg-linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                                                            <li><a href="#" class="bg-pinterest"><i class="fab fa-pinterest-p"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="blog-author light-shadow-bg">
                                <h3 class="widget-border-title">About Author</h3>
                                <div class="blog-author-content light-box-content">
                                    <div class="media">
                                        <div class="item-logo">
                                            <img src="media/blog/author-logo.png" alt="logo">
                                        </div>
                                        <div class="media-body">
                                            <h4 class="item-title"><a href="#">RadiusTheme</a></h4>
                                            <p>RadiusTheme is a web development company for WordPress plugins, themes and subsystems. We reached to thousands of people who are using those products to enhance their WordPress web building experience. And this success comes from dedication, team work and experience over the years.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-comment light-shadow-bg">
                                <h3 class="widget-border-title">3 Comments</h3>
                                <div class="light-box-content comment-box">
                                    <div class="media">
                                        <div class="item-logo">
                                            <img src="media/blog/comment-logo.png" alt="logo">
                                        </div>
                                        <div class="media-body">
                                            <h4 class="item-title">RadiusTheme</h4>
                                            <div class="comment-date">1 year ago / July 11, 2018 @ 6:09 am</div>
                                            <p>RadiusTheme is a web development company for WordPress plugins, themes and subsystems. We reached to thousands of people who are using those products to enhance their WordPress.</p>
                                            <a href="#" class="reply-btn">Reply</a>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="item-logo">
                                            <img src="media/blog/comment-logo.png" alt="logo">
                                        </div>
                                        <div class="media-body">
                                            <h4 class="item-title">RadiusTheme</h4>
                                            <div class="comment-date">1 year ago / July 11, 2018 @ 6:09 am</div>
                                            <p>RadiusTheme is a web development company for WordPress plugins, themes and subsystems. We reached to thousands of people who are using those products to enhance their WordPress.</p>
                                            <a href="#" class="reply-btn">Reply</a>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="item-logo">
                                            <img src="media/blog/comment-logo.png" alt="logo">
                                        </div>
                                        <div class="media-body">
                                            <h4 class="item-title">RadiusTheme</h4>
                                            <div class="comment-date">1 year ago / July 11, 2018 @ 6:09 am</div>
                                            <p>RadiusTheme is a web development company for WordPress plugins, themes and subsystems. We reached to thousands of people who are using those products to enhance their WordPress.</p>
                                            <a href="#" class="reply-btn">Reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comments-form light-shadow-bg">
                                <h3 class="widget-border-title">Leave a Reply</h3>
                                <div class="light-box-content form-box">
                                    <form action="{{ route('comment.store') }}" method="POST" role="form" enctype="multipart/form-data">
                                        <div class="item-text">Your email address will not be published. Required fields are marked *</div>
                                        <div class="row gutters-20">
                                            <div class="col-lg-4 form-group">
                                                <input type="text" class="form-control" placeholder="Name *" name="name">
                                            </div>
                                            <div class="col-lg-4 form-group">
                                                <input type="email" class="form-control" placeholder="Email *" name="email">
                                            </div>
                                            <div class="col-lg-4 form-group">
                                                <input type="text" class="form-control" placeholder="Website *" name="website">
                                                <input type="hidden" class="form-control" value="{{ $blog->id }}" name="blog_id">
                                                <input type="hidden" class="form-control" value="{{ $blog->id }}" name="user_id">
                                            </div>
                                            <div class="col-lg-12 form-group">
                                                <textarea class="form-control textarea" placeholder="Comment *" name="comment" id="comment" cols="30" rows="9"></textarea>
                                            </div>
                                            <div class="col-lg-12 form-group">
                                                <button type="submit" class="submit-btn">
                                                    POST COMMENT
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 sidebar-break-md sidebar-widget-area">
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
        <style>
            .item-content p{
                font-family:Arial, Helvetica, sans-serif;
                font-size: 15px;
                font-weight: 400;
                line-height: 26px;
                color: rgb(44, 47, 52);
            }
        </style>
    
@endsection