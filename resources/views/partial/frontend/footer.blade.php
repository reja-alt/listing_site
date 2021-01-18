<!--=====================================-->
        <!--=       Footer Start           	 	=-->
        <!--=====================================-->
        <footer>
            <div class="footer-top-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="footer-box-layout1">
                               
                                
                                <div class="footer-logo">
                                    <img src="{{url('uploads/post/'.$settings->backend_logo)}}" >
                                </div>
                         
                                
                                @php
                                    $social_links=DB::table('social_links')->get();
                                @endphp
                                @foreach ($social_links as $social_link)
                                <ul class="footer-social">
                                    <li><a href="{{ $social_link->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{ $social_link->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{ $social_link->youtube }}" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href="{{ $social_link->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="{{ $social_link->pinterest }}" target="_blank"><i class="fab fa-pinterest"></i></a></li>
                                </ul>   
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="footer-box-layout1">
                                <div class="footer-title">
                                    <h3>How to Sell Fast</h3>
                                </div>
                                <div class="footer-menu-box">
                                    <ul>
                                        <li><a href="#">Selling Tips</a></li>
                                        <li><a href="#">Buy and Sell Quickly</a></li>
                                        <li><a href="#">Membership</a></li>
                                        <li><a href="#">Banner Advertising</a></li>
                                        <li><a href="#">Promote Your Ad</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="footer-box-layout1">
                                <div class="footer-title">
                                    <h3>Information</h3>
                                </div>
                                <div class="footer-menu-box">
                                    <ul>
                                        <li><a href="#">Company & Contact Info</a></li>
                                        <li><a href="{{ route('blog.index') }}">Blog & Articles</a></li>
                                        <li><a href="#">Sitemap</a></li>
                                        <li><a href="#">Terms of Service</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="footer-box-layout1">
                                <div class="footer-title">
                                    <h3>Help & Support</h3>
                                </div>
                                <div class="footer-menu-box">
                                    <ul>
                                        <li><a href="#">Live Chat</a></li>
                                        <li><a href="{{ route('faq') }}">FAQ</a></li>
                                        <li><a href="#">How to Stay Safe</a></li>
                                        <li><a href="#">Terms & Conditions</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="copyright-text">
                                © Copyright Classima 2019. Designed and Developed by <a target="_blank" href="https://www.radiustheme.com/" rel="nofollow" rel="nofollow">RadiusTheme</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="payment-option">
                                <a href="#">
                                    <img src="media/figure/payment.png" alt="payment">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>