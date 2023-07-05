@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Ordre' }}</h4>
        </span>

        <div class="pull-right">


                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('ordres.ordre.index') }}" class="btn btn-primary" title="{{ trans('ordres.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                </div>


        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('ordres.produit_id') }}</dt>
            <dd>{{ optional($ordre->produit)->name }}</dd>
            <dt>{{ trans('ordres.color_id') }}</dt>
            <dd>{{ optional($ordre->color)->name }}</dd>
            <dt>{{ trans('ordres.size_id') }}</dt>
            <dd>{{ optional($ordre->size)->name }}</dd>
            <dt>{{ trans('ordres.quantity') }}</dt>
            <dd>{{ $ordre->quantity }}</dd>

        </dl>

    </div>
</div>

@endsection
