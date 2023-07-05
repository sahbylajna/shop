@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
            <div class="inner">
            <h3>@php
                echo count(App\Models\produit::all());
            @endphp</h3>
            <p>Produit</p>
            </div>
            <div class="icon">
            <i class="fa fa-shopping-bag"></i>
            </div>
            <a href="{{ route('produits.produit.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>





            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                <div class="inner">
                <h3>@php
                    echo count(App\Models\category::all());
                @endphp</h3>
                <p>category</p>
                </div>
                <div class="icon">
                <i class="fa fa-bars"></i>
                </div>
                <a href="{{ route('categories.category.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>


                <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                    <div class="inner">
                    <h3>@php
                        echo count(App\Models\ordre::all());
                    @endphp</h3>
                    <p>order</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                    </div>
                    <a href="{{ route('ordres.ordre.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
    </div>
@endsection
