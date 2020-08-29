<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('message.title')}}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <style>
    @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

    fieldset, label { margin: 0; padding: 0; }
    body{ margin: 20px; }
    h1 { font-size: 1.5em; margin: 10px; }

    /****** Style Star Rating Widget *****/

    .rating {
    border: none;
    float: left;
    }

    .rating > input { display: none; }
    .rating > label:before {
    margin: 5px;
    font-size: 1.25em;
    font-family: FontAwesome;
    display: inline-block;
    content: "\f005";
    }

    .rating > .half:before {
    content: "\f089";
    position: absolute;
    }

    .rating > label {
    color: #ddd;
    float: right;
    }

    /***** CSS Magic to Highlight Stars on Hover *****/

    .rating > input:checked ~ label, /* show gold star when clicked */
    .rating:not(:checked) > label:hover, /* hover current star */
    .rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

    .rating > input:checked + label:hover, /* hover current star when changing rating */
    .rating > input:checked ~ label:hover,
    .rating > label:hover ~ input:checked ~ label, /* lighten current selection */
    .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }
    </style>
</head>

@include('pages.components.header')
@if(isset($products))
    @foreach($products as $product)
    @endforeach
@endif
<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    <img src="{{'/image/'.$product->product_img}}" alt="error image">
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">{{$product->product_name}}</h3>
                    <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <span class="review-no">{{ trans('message.totalreview')}}</span>
                    </div>
                    <p class="product-description">{{$product->description}}</p>
                    <h4 class="price">{{ trans('message.currentprice')}}Current price: <span>{{$product->price}}{{ trans('message.vnd')}}</span></h4>
                    <form action="{{route('cart')}}" method="post">
                        {{csrf_field()}}
                        <div class="product-btns">
                            <div class="qty-input">
                                <span class="text-uppercase">{{ trans('message.qty')}}</span>
                                <input name="quantity" class="input" type="number" min="1" value="1">
                                <input name="product_id_hidden" class="input" type="hidden"  value="{{$product->id}}">
                            </div>
                            <button type="submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> {{ trans('message.addtocart')}}</button>
                            <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                        </div>
                    </form>
                </div>
            </div><br><hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">{{ trans('message.rating')}}</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-3">
                    <div class="rating-block">
                        <h4>Average user rating</h4>
                        <h2 class="bold padding-bottom-7">4.3 <small>/ 5</small></h2>
                        <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                        <span class="fa fa-star" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                        <span class="fa fa-star-half-o" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                        <span class="fa fa-star-o" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
                <div class="col-sm-3">
                    <h4>Rating breakdown</h4>
                    <div class="pull-left">
                        <div class="pull-left" style="width:35px; line-height:1;">
                            <div style="height:9px; margin:5px 0;">5 <span class="fa fa-star" aria-hidden="true"></span></div>
                        </div>
                        <div class="pull-left" style="width:180px;">
                            <div class="progress" style="height:9px; margin:8px 0;">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 1000%">
                                <span class="sr-only">80% Complete (danger)</span>
                            </div>
                            </div>
                        </div>
                        <div class="pull-right" style="margin-left:10px;">1</div>
                    </div>
                    <div class="pull-left">
                        <div class="pull-left" style="width:35px; line-height:1;">
                            <div style="height:9px; margin:5px 0;">4 <span class="fa fa-star" aria-hidden="true"></span></div>
                        </div>
                        <div class="pull-left" style="width:180px;">
                            <div class="progress" style="height:9px; margin:8px 0;">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
                                <span class="sr-only">80% Complete (danger)</span>
                            </div>
                            </div>
                        </div>
                        <div class="pull-right" style="margin-left:10px;">1</div>
                    </div>
                    <div class="pull-left">
                        <div class="pull-left" style="width:35px; line-height:1;">
                            <div style="height:9px; margin:5px 0;">3 <span class="fa fa-star" aria-hidden="true"></span></div>
                        </div>
                        <div class="pull-left" style="width:180px;">
                            <div class="progress" style="height:9px; margin:8px 0;">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
                                <span class="sr-only">80% Complete (danger)</span>
                            </div>
                            </div>
                        </div>
                        <div class="pull-right" style="margin-left:10px;">0</div>
                    </div>
                    <div class="pull-left">
                        <div class="pull-left" style="width:35px; line-height:1;">
                            <div style="height:9px; margin:5px 0;">2 <span class="fa fa-star" aria-hidden="true"></span></div>
                        </div>
                        <div class="pull-left" style="width:180px;">
                            <div class="progress" style="height:9px; margin:8px 0;">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
                                <span class="sr-only">80% Complete (danger)</span>
                            </div>
                            </div>
                        </div>
                        <div class="pull-right" style="margin-left:10px;">0</div>
                    </div>
                    <div class="pull-left">
                        <div class="pull-left" style="width:35px; line-height:1;">
                            <div style="height:9px; margin:5px 0;">1 <span class="fa fa-star" aria-hidden="true"></span></div>
                        </div>
                        <div class="pull-left" style="width:180px;">
                            <div class="progress" style="height:9px; margin:8px 0;">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
                                <span class="sr-only">80% Complete (danger)</span>
                            </div>
                            </div>
                        </div>
                        <div class="pull-right" style="margin-left:10px;">0</div>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-6 border">
                    <table>
                        <div class="product-reviews">
                            <div class="single-review">
                                <div class="review-heading">
                                    <div><a href="#"><i class="fa fa-user-o"></i>
                                                <strong>name user review</strong>
                                        </a></div>
                                    <div><a href="#"><i class="fa fa-clock-o"></i> </a> time review</div>
                                    <div class="review-rating pull-right">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star 0"></i>
                                            <i class="fa fa-star 0"></i>
                                            <i class="fa fa-star 0"></i>
                                            <i class="fa fa-star 0"></i>
                                    </div>
                                </div>
                                <div class="review-body">
                                    <a style="color:#F8694A" onMouseOver="this.style.color='green'" onMouseOut="this.style.color= '#F8694A' " href="">edit</a> |
                                    <a style="color:#F8694A" onMouseOver="this.style.color='green'" onMouseOut="this.style.color= '#F8694A' " href="">delete</a>
                                </div>
                            </div>

                        </div>
                    </table>
                </div>
                <div class="col-md-6 border">
                    <h4 class="text-uppercase">Write Your Review</h4>
                    <form class="review-form" method="post" action="{{ route('rating.store', $product->id) }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="input pull-left border" name="review_comment" rows="4" cols="50" placeholder="Your review">
                            </textarea>
                        </div>
                        <br><br>
                        <br><br><br>
                        <div class="form-group">
                            <div class="input-rating">
                                <strong class="text-uppercase">Your Rating: </strong><br>
                                <div class="rating" >
                                <fieldset class="rating">
                                    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                </fieldset>
                                </div>
                            </div>
                        </div><br><br><br>
                        <!-- <button class="btn btn-info" type="submit">Update review</button> -->
                        <button class="btn btn-info" type="submit">Add review</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('pages.components.footer')
