@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($produit->name) ? $produit->name : 'Produit' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('produits.produit.destroy', $produit->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('produits.produit.index') }}" class="btn btn-primary" title="{{ trans('produits.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('produits.produit.create') }}" class="btn btn-success" title="{{ trans('produits.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('produits.produit.edit', $produit->id ) }}" class="btn btn-primary" title="{{ trans('produits.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('produits.delete') }}" onclick="return confirm(&quot;{{ trans('produits.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('produits.name') }}</dt>
            <dd>{{ $produit->name }}</dd>
            <dt>{{ trans('produits.name_ar') }}</dt>
            <dd>{{ $produit->name_ar }}</dd>
            <dt>{{ trans('produits.description') }}</dt>
            <dd>{{ $produit->description }}</dd>
            <dt>{{ trans('produits.description_ar') }}</dt>
            <dd>{{ $produit->description_ar }}</dd>
            <dt>{{ trans('produits.price') }}</dt>
            <dd>{{ $produit->price }}</dd>
            <dt>{{ trans('produits.photo') }}</dt>
            <dd>{{ asset('storage/' . $produit->photo) }}</dd>
            <dt>{{ trans('produits.category_id') }}</dt>
            <dd>{{ optional($produit->category)->name }}</dd>

        </dl>

    </div>
</div>

@endsection