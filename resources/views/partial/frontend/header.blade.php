        <!--=====================================-->
        <!--=            Header Start           =-->
        <!--=====================================-->
        <header class="header">
            <div id="rt-sticky-placeholder"></div>
            <div id="header-menu" class="header-menu menu-layout2">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-2">
                            @php
                                
                            @endphp
                            <div class="logo-area">
                             
                                <a href="{{ route('frontend.index') }}" class="temp-logo">
                                    <img src="{{url('uploads/post/'.$settings->frontend_logo)}}"  class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 d-flex justify-content-end">
                            <nav id="dropdown" class="template-main-menu">
                                <ul>
                                    <li>
                                        <a href="{{ route('frontend.index') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('all.post') }}">All Ads</a>
                                    </li>
                                    <li>
                                        <a href="#" class="has-dropdown">Pages</a>
                                        <ul class="mega-menu mega-menu-col-2">
                                            <li>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="about.html">About Us</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('faq') }}">FAQ</a>
                                                    </li>
                                                    <li>
                                                        <a href="search-result.html">Search Result</a>
                                                    </li>
                                                    <li>
                                                        <a href="404.html">Error 404</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="{{ route('all.post') }}">All Ads</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Single Ad </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('home') }}">My Account</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="has-dropdown">Stores</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="store.html">All Stores</a>
                                            </li>
                                            <li>
                                                <a href="store-detail.html">Store Details</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="has-dropdown">Blog</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="{{ route('blog.index') }}">All Blog</a>
                                            </li>
                                            <li>
                                                <a href="single-blog.html">Single Post</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="contact.html">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-lg-3 d-flex justify-content-end">
                            <div class="header-action-layout1">
                                <ul>
                                    <li class="header-login-icon">
                                        <a href="{{ route('user.login') }}" class="color-primary" data-toggle="tooltip" data-placement="top" title="Login/Register">
                                            <i class="far fa-user"></i>
                                        </a>
                                    </li>
                                    <li class="header-btn">
                                        <a href="{{ route('user_post.create') }}" class="item-btn"><i class="fas fa-plus"></i>Post Your Ad</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--=====================================-->
        <!--=            Banner Start           =-->
        <!--=====================================-->
    

