@extends('layouts.frontend_layout')
@section('front_content')
<section class="inner-page-banner" data-bg-image="frontend/media/banner/banner1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
               
                <div class="breadcrumbs-area">
                    <h1>{{ $post->title }}</h1>
                    <ul>
                        <li>
                            <a href="{{ route('frontend.index') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('user_post.index') }}">Classified Listings</a>
                        </li>
                        <li>
                            <a href="{{ route('user_post.index',$post->category->slug) }}">{{ $post->category->name }}</a>
                        </li>
                        <li>
                            <a href="index.html">{{ $post->subcategory->name }}</a>
                        </li>
                        <li>{{ $post->title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================-->
<!--=          Product Start         =-->
<!--=====================================-->
<section class="single-product-wrap-layout1 section-padding-equal-70 bg-accent">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="single-product-box-layout1">
                    <div class="product-info light-shadow-bg">
                        <div class="product-content light-box-content">
                            <div class="item-img-gallery">
                                <div class="tab-content">
                                    <div class="title">{{ $post->title }}</div>
                                    <div class="single-entry-meta">
                                        <ul>
                                            <li><i class="far fa-clock"></i>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</li>
                                            <li>{{ $post->address}}</li>
                                           
                                            
                                            <li><i class="far fa-eye"></i>{{ $count_view }}</li>
                                        </ul>
                                        <div class="item-condition">New</div>
                                    </div>
                                    @foreach(json_decode($post->thumbnail) as $key => $image)
                                    <div class="tab-pane fade show @if($key == 0) active @endif" id="gallery{{ $key++ }}" role="tabpanel">
                                        <a href="#">
                                            <img class="zoom_01" src="{{ url($image) }}" alt="product" data-zoom-image="{{ url($image) }}">
                                        </a>
                                    </div>
                                    @endforeach
                                   
                                </div>
                                <ul class="nav nav-tabs" role="tablist">
                                    @foreach(json_decode($post->thumbnail) as $key => $image)
                                    <li class="nav-item">
                                        <a class="nav-link @if($key == 0) active @endif" data-toggle="tab" href="#gallery{{ $key++  }}" role="tab" aria-selected="true">
                                            <img src="{{ url($image) }}" alt="thumbnail">
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                     
                            
                            <div class="item-details">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#details" role="tab" aria-selected="true">Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#features" role="tab" aria-selected="false">Features</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="details" role="tabpanel" style="font-size: 14px; color: rgb(112, 118, 118); font-weight: 400;">
                                       {{ $post->description }}
                                    </div>
                                    <div class="tab-pane fade" id="features" role="tabpanel">
                                        {{ $post->feature_description }}
                                    </div>
                                </div>
                            </div>
                            
                            <div class="item-action-area">
                                <ul>
                                    <li class="inline-item"><a href="#"><i class="far fa-heart"></i>Add to Favourites</a></li>
                                    <li class="inline-item"><a href="#"><i class="fas fa-exclamation-triangle"></i>Report Abuse</a></li>
                                    <li class="item-social">
                                        <span class="share-title">
                                            <i class="fas fa-share-alt"></i>
                                            Share:
                                        </span>
                                      @php
                                          $social_links=DB::table('social_links')->get();
                                      @endphp
                                      @foreach ($social_links as $social_link)
                                      <a href="{{ $social_link->facebook }}" class="bg-facebook"><i class="fab fa-facebook-f"></i></a>
                                      <a href="{{ $social_link->twitter }}" class="bg-twitter"><i class="fab fa-twitter"></i></a>
                                      <a href="{{ $social_link->linkedin }}" class="bg-google-plus"><i class="fab fa-google-plus-g"></i></a>
                                      @endforeach
                                        
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item-google-map light-shadow-bg">
                        <h3 class="widget-border-title">Location</h3>
                        <div class="google-map light-box-content">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.5162238528055!2d90.41769071515684!3d23.728964084599905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b85af0946243%3A0x20bf5d1a2809f9dd!2sGawsia%20Kashem%20Center!5e0!3m2!1sen!2sbd!4v1610618484386!5m2!1sen!2sbd"  width="100%" height="450px;" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                    @if(empty($related_posts))
                    <p style="color:red;"> Sorry ! No Related Post Found.</p>
                    @else
                    <div class="item-related-product light-shadow-bg">
                        <div class="flex-heading-layout2">
                            <h3 class="widget-border-title">Related Ads</h3>
                            <div id="owl-nav1" class="smart-nav-layout1">
                                <span class="rt-prev">
                                    <i class="fas fa-angle-left"></i>
                                </span>
                                <span class="rt-next">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </div>
                        </div>
                        <div class="light-box-content">
                            
                            <div class="rc-carousel" data-loop="true" data-items="1" data-margin="30" data-custom-nav="#owl-nav1" data-autoplay="false" data-autoplay-timeout="3000" data-smart-speed="1000" data-dots="false" data-nav="false" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="false" data-r-small="2" data-r-small-nav="false" data-r-small-dots="false" data-r-medium="2" data-r-medium-nav="false" data-r-medium-dots="false" data-r-large="3" data-r-large-nav="false" data-r-large-dots="false" data-r-extra-large="3" data-r-extra-large-nav="false" data-r-extra-large-dots="false">
                                @foreach($related_posts as $related_post)
                                <div class="product-box-layout1 box-shadwo-light mg-1">
                                   
                                        <div class="item-img">
                                            @foreach(json_decode($related_post->thumbnail) as $key => $image)
                                            @if($key == 0)
                                            <a href="single-product1.html"><img src="{{url($image)}}" alt="Product"></a>
                                            @endif
                                            @endforeach
                                        </div>
                                        
                                        <div class="item-content">
                                            <h3 class="item-title"><a href="{{ route('user_post.show',$related_post->slug) }}">{{ $related_post->title }}</a><span>New</span></h3>
                                            <ul class="entry-meta">
                                                <li><i class="far fa-clock"></i>{{ \Carbon\Carbon::parse($related_post->created_at)->format('j F, Y') }}</li>
                                                <li><i class="fas fa-map-marker-alt"></i>{{ $related_post->address }}</li>
                                            </ul>
                                            <div class="item-price">
                                                <span class="currency-symbol">TK</span>
                                                {{ $related_post->price }}
                                            </div>
                                        </div>
                                    
                                </div>
                                @endforeach
                            </div>
                            
                        </div>
                    </div>
                    @endif
                    <div class="item-review light-shadow-bg">
                        <h3 class="widget-border-title">Leave a Review</h3>
                        <div class="light-box-content">
                            <form action="{{ route('review.store') }}" method="POST" role="form" enctype="multipart/form-data">
                                @csrf 
                                <div class="item-text">Your email address will not be published. Required fields are marked *</div>
                                <div class="form-group">
                                    <label>Your Name *</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Your Email *</label>
                                    <input type="email" class="form-control" name="email">
                                    <input type="hidden" class="form-control" value="{{ $post->id }}" name="post_id">
                                    <input type="hidden" class="form-control" value="{{ $post->user_id }}" name="user_id">
                                </div>
                                <div class="form-group">
                                    <div class="rate">
                                       <input type="radio" id="star5" name="rating" value="5" required/>
                                       <label class="star" for="star5" title="Awesome" aria-hidden="true"></label>
                                       <input type="radio" id="star4" name="rating" value="4" required/>
                                       <label class="star" for="star4" title="Great" aria-hidden="true"></label>
                                       <input type="radio" id="star3" name="rating" value="3" required/>
                                       <label class="star" for="star3" title="Very good" aria-hidden="true"></label>
                                       <input type="radio" id="star2" name="rating" value="2" required/>
                                       <label class="star" for="star2" title="Good" aria-hidden="true"></label>
                                       <input type="radio" id="star1" name="rating" value="1" required/>
                                       <label class="star" for="star1" title="Bad" aria-hidden="true"></label>
                                    </div>
                                 </div>
                                
                               
                                {{-- <div class="form-group item-rating">
                                    <label>Your Rating *</label>
                                    <ul>
                                        <li><a href="#"><i class="far fa-star" value="1"></i></a></li>
                                        <li><a href="#"><i class="far fa-star" value="2"></i></a></li>
                                        <li><a href="#"><i class="far fa-star" value="3"></i></a></li>
                                        <li><a href="#"><i class="far fa-star" value="4"></i></a></li>
                                        <li><a href="#"><i class="far fa-star" value="5"></i></a></li>
                                    </ul>
                                </div> --}}
                                <div class="form-group">
                                    <label>Your Review *</label>
                                    <textarea class="form-control textarea" name="comment" id="comment" cols="30" rows="8"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="item-btn">
                                        SUBMIT
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                  <div class="ratings">
                      <h3>Reviews</h3>
                      <div class="rating-star">
                          <span>4.45</span>
                          <span>/5</span>
                      </div>
                      <div class="">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div><br>
                   
                    <div class="rating-list">
                        @php
                            $ratings=DB::table('reviews')->where('post_id',$post->id)->get();
                        @endphp 
                        @foreach ($ratings as $rating)
                        <div class="form-group">
                            <div class="rate">
                                @php
                                    $ratings=$rating->rating
                                @endphp
                           
                                @for($i=0; $i<$ratings; $i++)
                                 <i class="fa fa-star"></i> 
                                @endfor
                            </div>
                         </div>
                        <div class="seller-reply">
                            <span>by {{ $rating->name }}</span>
                        </div>
                        
                        <span>{{ $rating->comment }}</span><br><br>
                        @endforeach
                        
                    </div>
                  </div>
                  <style>
                      
                       .rate{
                           margin-top: 20px;
                           margin-bottom: -20px;
                       }
                      .rating-star {
                          color: black;
                          font-size: 20px;
                      }
                      .frate label{
                          color: #FACE5E
                      }
                      .fa-star{
                          color: #FACE5E
                      }
                      .rating-list span{
                        color: #212121;
                        font-size: 14px;
                        line-height: 30px;
                        white-space: pre-wrap;
                        word-break: break-word;
                      }
                      .seller-reply span{
                        color:rgb(128, 128, 128);
                        font-size: 13px;
                        line-height: 13.8 px;
                        display: inline-block;
                        vertical-align: bottom;
                      }

                      .title{
                        font-family: "Open Sans", Arial, Helvetica, sans-serif;
                        font-size: 22px;
                        font-weight: 800;
                        line-height: 37.7143px;
                        color: rgb(0, 0, 0);
                    }
                  </style>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 sidebar-break-md sidebar-widget-area">
                <div class="widget-lg widget-price">
                    <div class="item-price">
                        <span class="currncy-symbol">TK</span>
                      {{ $post->price }}
                    </div>
                </div>
                <div class="widget-lg widget-author-info widget-light-bg">
                    <h3 class="widget-border-title">Seller Information</h3>
                    <div class="author-content">
                        <div class="author-name">
                            <div class="item-img">
                                <img src="" alt="author" style="width: 50px; height: 50px;">
                            </div>
                            <h4 class="author-title"><a href="store-detail.html"></a></h4>
                        </div>
                        <div class="author-meta">
                            <ul>
                                <li><i class="fas fa-map-marker-alt"></i>{{ $post->address }}</li>
                                <li><i class="fas fa-shopping-basket"></i><a href="store-detail.html">View Store</a></li>
                            </ul>
                        </div>
                    
                        
                            <div class="phone-number classima-phone-reveal not-revealed" id="phone_number" data-phone="{{ $post->phone_number }}">
                              
                            <div class="number_rape"><i class="fas fa-phone"></i><span>XXXXXXXX</span></div>
                            <div class="item-text">Click to reveal phone number</div>
                            </div>
                        <div class="author-mail">
                            <a href="#" class="mail-btn" data-toggle="modal" data-target="#author-mail">
                                <i class="fas fa-envelope"></i>Email to Seller
                            </a>
                        </div>
                    </div>
                </div>
                <div class="widget-lg widget-safty-tip widget-light-bg">
                    <h3 class="widget-border-title">Safety Tips for Buyers</h3>
                    <div class="safty-tip-content">
                        <ul>
                            <li>Meet seller at a public place</li>
                            <li>Check The item before you buy</li>
                            <li>Pay only after collecting The item</li>
                        </ul>
                    </div>
                </div>
                <div class="widget widget-banner">
                    <a href="#">
                        <img src="frontend/media/figure/widget-banner1.jpg" alt="banner">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <style>
        #phone_number{
        border-radius: 3px;
        font-weight: 800;
        text-align: center;
        color: #2f3432;
        font-size: 14px;
        padding: 8px;
        margin-top: 8px;
        background-color: #33dcfa;
        }
      
    </style>
</section>

<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5faa35088499cb00120cc73f&product=inline-share-buttons" async="async"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v9.0" nonce="bPWhxoii"></script>

<script>
    $(function(){
    $(".limit_text").each(function(i){
    len=$(this).text().length;
    if(len>10)
    {
    $(this).text($(this).text().substr(0,20)+'...');
    }
    });
    });
    
</script>

    
@endsection