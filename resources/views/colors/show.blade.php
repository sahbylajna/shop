@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($color->name) ? $color->name : 'Color' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('colors.color.destroy', $color->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('colors.color.index') }}" class="btn btn-primary" title="{{ trans('colors.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('colors.color.create') }}" class="btn btn-success" title="{{ trans('colors.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('colors.color.edit', $color->id ) }}" class="btn btn-primary" title="{{ trans('colors.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('colors.delete') }}" onclick="return confirm(&quot;{{ trans('colors.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('colors.name') }}</dt>
            <dd>{{ $color->name }}</dd>
            <dt>{{ trans('colors.name_ar') }}</dt>
            <dd>{{ $color->name_ar }}</dd>
            <dt>{{ trans('colors.valeur') }}</dt>
            <dd>{{ $color->valeur }}</dd>

        </dl>

    </div>
</div>

@endsection