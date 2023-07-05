@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
  
        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($produit->name) ? $produit->name : 'Produit' }}</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('produits.produit.index') }}" class="btn btn-primary" title="{{ trans('produits.show_all') }}">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('produits.produit.create') }}" class="btn btn-success" title="{{ trans('produits.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>
        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('produits.produit.update', $produit->id) }}" id="edit_produit_form" name="edit_produit_form" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('produits.form', [
                                        'produit' => $produit,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('produits.update') }}">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection