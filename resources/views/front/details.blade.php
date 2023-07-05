@extends('layouts.appfrent')

@section('content')

<section>
    <div class="container">
        <div class="row">


            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{ asset('public/'. $produit->photo) }}" alt="" />

                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">
{{--
                              <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                      <a href=""><img src="{{ asset('Front/images/product-details/similar1.jpg')}}" alt=""></a>
                                      <a href=""><img src="{{ asset('Front/images/product-details/similar2.jpg')}}" alt=""></a>
                                      <a href=""><img src="{{ asset('Front/images/product-details/similar3.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="item">
                                      <a href=""><img src="{{ asset('Front/images/product-details/similar1.jpg')}}" alt=""></a>
                                      <a href=""><img src="{{ asset('Front/images/product-details/similar2.jpg')}}" alt=""></a>
                                      <a href=""><img src="{{ asset('Front/images/product-details/similar3.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="item">
                                      <a href=""><img src="{{ asset('Front/images/product-details/similar1.jpg')}}" alt=""></a>
                                      <a href=""><img src="{{ asset('Front/images/product-details/similar2.jpg')}}" alt=""></a>
                                      <a href=""><img src="{{ asset('Front/images/product-details/similar3.jpg')}}" alt=""></a>
                                    </div>

                                </div> --}}

                              <!-- Controls -->

                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <h2>{{ $produit->name }} <br> {{ $produit->name_ar }}</h2>

<form action="{{ url('addcart') }}" method="POST" name="addc" >
    {{ csrf_field() }}
<input type="hidden" name="porduit" value="{{ $produit->id }}">
                            <span>
                                <span>{{ $produit->price }} QAR</span>
                                <label>Quantity:</label>
                                <input type="number" value="1"  min="1" max="1000" name="quantity"/>
                            </span>
                            <span>
                            </span>
                            <span>
                                <label>Color:</label>
                                @foreach ( $produit->colors as $color )

                                <input id="cb3{{ $color->id }}" type="radio" name="color" value="{{ $color->id }}" style="background:{{ $color->valeur }};accent-color:{{ $color->valeur }};-webkit-appearance: none;"  />

                                  @endforeach


                            </span>
                            <span class="select-size">
                                <label>Size:</label>

                                    @foreach ( $produit->sizes as $size )
                                    <input type="radio" name="ssize" id="{{   $size->name}}" style="    visibility: hidden;" value="{{   $size->id}}"/>
                                    <label for="{{   $size->name}}">{{   $size->name}}</label>
                                    @endforeach





                            </span>
                            <span>

                                <button type="submit" class="btn btn-fefault cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </button>
                            </span>


                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->
            </form>
                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#details" data-toggle="tab">Details</a></li>

                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="details" >

                            <div class="col-sm-12">

                                <p>{{  $produit->description  }} </p>
                                <p>{{  $produit->description_ar  }} </p>



                            </div>
                        </div>

                    </div>
                </div><!--/category-tab-->



            </div>
        </div>
    </div>
</section>



@endsection

@section('css')
    <style>
.select-size  input{
  display: none;
}

label {
  display: inline-block;
  width: 71px;
  height: 50px;
  text-align: center;
  border: 1px solid #ddd;
  line-height: 50px;
  cursor: pointer
}

#small:checked ~ label[for="small"],
#medium:checked ~ label[for="medium"],
#large:checked ~ label[for="large"],
#x-large:checked ~ label[for="x-large"],
#xx-large:checked ~ label[for="xx-large"] {
  background: #999;
  color: #ffffff;
}
input[type="radio"]:checked + label {
  border: 1px solid white;
  color: white;
  background-color: black;
}
    </style>
@endsection
