@extends('layouts.frontend_layout')
@section('front_content')
<section class="inner-page-banner" data-bg-image="frontend/media/banner/banner1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-area">
                    <h1>Edit The Ad</h1>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Edit The Ad</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
    <div class="container">
        <div class="post-ad-box-layout1 light-shadow-bg">
            <div class="post-ad-form light-box-content">
                <div class="post-alert alert alert-success">You have more 958 free ads.</div>
                <form action="{{ route('user_post.update',$post->id) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') 
                    <div class="post-section post-type">
                        <div class="post-ad-title">
                            <i class="fas fa-tags"></i>
                            <h3 class="item-title">Select Type</h3>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="control-label">
                                    Ad Type
                                    <span>*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select class="form-control select-box" name="ads_type">
                                        <option value="1" @if($post->ads_type == 1 ) selected @endif>Sell</option>
                                        <option value="1" @if($post->ads_type == 2 ) selected @endif>Buy</option>
                                        <option value="1" @if($post->ads_type == 3 ) selected @endif>Exchange</option>
                                        <option value="1" @if($post->ads_type == 4 ) selected @endif>Job</option>
                                        <option value="1" @if($post->ads_type == 5 ) selected @endif>To-Let</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="post-section post-category">
                        <div class="post-ad-title">
                            <i class="fas fa-tags"></i>
                            <h3 class="item-title">Select Category</h3>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="control-label">
                                    Category
                                    <span>*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select class="form-control select-box" name="category_name" id="category_name">
                                        @php
                                            $categories=DB::table('categories')->get();
                                        @endphp 
                                        @foreach ($categories as $category)
                                        @if( $category->id == $post->category_id)
                                            <option value="{{  $category->id }}" selected>{{ $category->name }}</option>
                                        @else
                                        <option value="{{  $category->id }}">{{ $category->name }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="control-label">
                                    Sub Category
                                    <span>*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select name="subcategory_name" class="form-control" id="subcategory_name">
                                        @php
                                            $subcategories=DB::table('subcategories')->get();
                                        @endphp
                                        <option disabled selected>-----Select-----</option>
                                        @foreach($subcategories as $subcategory)
                                        @if( $subcategory->id == $post->subcategory_id)
                                            <option value="{{$subcategory->id}}" selected>
                                                {{$subcategory->name}}
                                            </option>
                                        @else
                                            <option value="{{$subcategory->id}}">
                                                {{$subcategory->name}}
                                            </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="post-section post-information">
                        <div class="post-ad-title">
                            <i class="fas fa-folder-open"></i>
                            <h3 class="item-title">Product Information</h3>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="control-label">
                                    Title
                                    <span>*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="control-label">
                                    Price Type
                                    <span>*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select class="form-control select-box" name="price_type">
                                        <option value="1" @if($post->price_type == 1 ) selected @endif>Fixed</option>
                                        <option value="2" @if($post->price_type == 2 ) selected @endif>Negotiable</option>
                                        <option value="3" @if($post->price_type == 3 ) selected @endif>On Call</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="control-label">
                                    Price 
                                    <span>*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="price" id="price" value="{{ $post->price }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="control-label">
                                    Condition
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <div class="form-check form-radio-btn">
                                        <input class="form-check-input" type="radio" id="exampleRadios1" name="condition_type" value="New" @if($post->condition_type == 'New' ) checked @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            New
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-btn">
                                        <input class="form-check-input" type="radio" id="exampleRadios2" name="condition_type" value="Used" @if($post->condition_type == 'Used' ) checked @endif>
                                        <label class="form-check-label" for="exampleRadios2">
                                            Used
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="control-label">
                                    Brand
                                    <span>*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select class="form-control select-box" name="brand">
                                        <option value="0">- Select an Option -</option>
                                        <option value="1">Apple</option>
                                        <option value="2">Samsung</option>
                                        <option value="3">Sony</option>
                                        <option value="4">LG</option>
                                        <option value="5">Acer</option>
                                        <option value="6">BenQ</option>
                                        <option value="7">Asus</option>
                                        <option value="8">Blackberry</option>
                                        <option value="9">Google Nexus</option>
                                        <option value="10">HTC</option>
                                        <option value="11">Huawei</option>
                                        <option value="12">Lenovo</option>
                                        <option value="13">Motorola</option>
                                        <option value="14">Nokia</option>
                                        <option value="15">Sony Ericsson</option>
                                        <option value="15">HP</option>
                                        <option value="15">Other Brand</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="control-label">
                                    Features
                                    <span>*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <div class="form-check form-check-box">
                                        <input class="form-check-input" type="checkbox" id="features-list1" value="camera" name="feature" >
                                        <label class="form-check-label" for="features-list1">Camera</label>
                                    </div>
                                    <div class="form-check form-check-box">
                                        <input class="form-check-input" type="checkbox" id="features-list2" value="touch_screen"  name="feature">
                                        <label class="form-check-label" for="features-list2">Touch Screen</label>
                                    </div>
                                    <div class="form-check form-check-box">
                                        <input class="form-check-input" type="checkbox" id="features-list3" value="3g"  name="feature">
                                        <label class="form-check-label" for="features-list3">3G</label>
                                    </div>
                                    <div class="form-check form-check-box">
                                        <input class="form-check-input" type="checkbox" id="features-list4" value="4g"  name="feature">
                                        <label class="form-check-label" for="features-list4">4G</label>
                                    </div>
                                    <div class="form-check form-check-box">
                                        <input class="form-check-input" type="checkbox" id="features-list5" value="bluetooth"  name="feature">
                                        <label class="form-check-label" for="features-list5">Bluetooth</label>
                                    </div>
                                    <div class="form-check form-check-box">
                                        <input class="form-check-input" type="checkbox" id="features-list6" value="dual_sim"  name="feature">
                                        <label class="form-check-label" for="features-list6">Dual Sim</label>
                                    </div>
                                    <div class="form-check form-check-box">
                                        <input class="form-check-input" type="checkbox" id="features-list7" value="dual_lens_camera"  name="feature">
                                        <label class="form-check-label" for="features-list7">Dual Lens Camera</label>
                                    </div>
                                    <div class="form-check form-check-box">
                                        <input class="form-check-input" type="checkbox" id="features-list8" value="expandable_memory"  name="feature">
                                        <label class="form-check-label" for="features-list8">Expandable Memory</label>
                                    </div>
                                    <div class="form-check form-check-box">
                                        <input class="form-check-input" type="checkbox" id="features-list9" value="fingerprint_sensor"  name="feature">
                                        <label class="form-check-label" for="features-list9">Fingerprint Sensor</label>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="control-label">
                                    Authenticity
                                    <span>*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <div class="form-check form-radio-btn">
                                        <input class="form-check-input" type="radio" id="exampleRadios3" name="authenticaty" value="original" @if($post->authenticaty == 'original' ) checked @endif>
                                        <label class="form-check-label" for="exampleRadios3">
                                            Original
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-btn">
                                        <input class="form-check-input" type="radio" id="exampleRadios4" name="authenticaty" value="copy" @if($post->authenticaty ==  'copy') checked @endif>
                                        <label class="form-check-label" for="exampleRadios4">
                                            Copy
                                        </label>
                                    </div>
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
                                    <textarea name="description" class="form-control textarea" id="description" cols="30" rows="8">{{ $post->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="post-section post-features">
                        <div class="post-ad-title">
                            <i class="fas fa-list-ul"></i>
                            <h3 class="item-title">Features</h3>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="control-label">
                                    Features List
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <textarea name="feature_description" class="form-control textarea"  id="description2" cols="30" rows="5">{{ $post->feature_description }}</textarea>
                                    <div class="help-text">
                                        <span>Write a feature in each line eg.</span>
                                        <span>Feature 1</span>
                                        <span>Feature 2</span>
                                        <span>....</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-group control-group increment" >
                        <input type="file" name="images[]" class="form-control">
                            <div class="input-group-btn"> 
                                <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                            </div>
                    </div>
                    <div class="clone hide">
                        <div class="control-group input-group" style="margin-top:10px">
                          <input type="file" name="images[]" class="form-control">
                            <div class="input-group-btn"> 
                                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                            </div>
                        </div>
                    </div>

                    <div class="post-section post-contact">
                        <div class="post-ad-title">
                            <i class="fas fa-user"></i>
                            <h3 class="item-title">Contact Details</h3>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="control-label">
                                    Division
                                    <span>*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select class="form-control select-box" name="division_name" id="division_name"> 
                                        @php
                                            $divisions=DB::table('divisions')->get();
                                        @endphp
                                            <option>---Select Division---</option>
                                        @foreach ($divisions as $division)
                                        @if( $division->id == $post->division_id)
                                            <option value="{{ $division->id }}" selected>{{ $division->name }}</option> 
                                        @else
                                            <option value="{{ $division->id }}">{{ $division->name }}</option> 
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="control-label">
                                    District
                                    <span>*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select class="form-control select-box" name="district_name" id="district_name">
                                        @php
                                            $districts=DB::table('districts')->get();
                                        @endphp
                                            <option>---Select District---</option>
                                        @foreach ($districts as $district)
                                        @if( $district->id == $post->district_id)
                                            <option value="{{ $district->id }}" selected>{{ $district->name }}</option> 
                                        @else
                                            <option value="{{ $district->id }}">{{ $district->name }}</option> 
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="control-label">
                                    Sub District
                                    <span>*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select class="form-control select-box" name="subdistrict_name">
                                        @php
                                            $subdistricts=DB::table('sub_districts')->get();
                                        @endphp
                                            <option>---Select Sub District---</option>
                                        @foreach ($subdistricts as $subdistrict)
                                            @if( $subdistrict->id == $post->subdistrict_id)
                                                <option value="{{ $subdistrict->id }}" selected>{{ $subdistrict->subdis_name }}</option> 
                                            @else
                                                <option value="{{ $subdistrict->id }}">{{ $subdistrict->subdis_name }}</option> 
                                            @endif
                                        @endforeach
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
                                    <input type="text" class="form-control" name="zipcode" id="post-zip" value="{{ $post->zipcode }}">
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
                                    <textarea name="address" class="form-control textarea" name=" address" id="address" cols="30" rows="2">{{ $post->address }}"</textarea>
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
                                    <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ $post->phone_number }}">
                                </div>
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="control-label">
                                    Whatsapp Number
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="{{ $post->whatsapp }}">
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
                                    <input type="email"  class="form-control" name="email" id="email" value="{{ $post->email }}">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-sm-3">
                                <label class="control-label">
                                    Map
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <div id="googleMap" class="google-map" style="width: 100%; height: 400px;"></div>
                                    <div class="form-check form-check-box">
                                        <input class="form-check-input" type="checkbox" id="map">
                                        <label class="form-check-label" for="map">Don't show the Map</label>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-sm-3">

                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input type="submit" class="submit-btn" value="Submit Listing">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <style>
    .thumb{
        margin: 10px 5px 0 0;
        width: 300px;
    } 
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
          $(".btn-success").click(function(){ 
              var html = $(".clone").html();
              $(".increment").after(html);
          });
          $("body").on("click",".btn-danger",function(){ 
              $(this).parents(".control-group").remove();
          });
        });
    </script>

@endsection