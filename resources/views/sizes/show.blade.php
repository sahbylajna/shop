@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($size->name) ? $size->name : 'Size' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('sizes.size.destroy', $size->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('sizes.size.index') }}" class="btn btn-primary" title="{{ trans('sizes.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('sizes.size.create') }}" class="btn btn-success" title="{{ trans('sizes.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('sizes.size.edit', $size->id ) }}" class="btn btn-primary" title="{{ trans('sizes.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('sizes.delete') }}" onclick="return confirm(&quot;{{ trans('sizes.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('sizes.name') }}</dt>
            <dd>{{ $size->name }}</dd>
            <dt>{{ trans('sizes.name_ar') }}</dt>
            <dd>{{ $size->name_ar }}</dd>
            <dt>{{ trans('sizes.valeur') }}</dt>
            <dd>{{ $size->valeur }}</dd>

        </dl>

    </div>
</div>

@endsection