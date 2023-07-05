@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Setting' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('settings.setting.destroy', $setting->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('settings.setting.index') }}" class="btn btn-primary" title="{{ trans('settings.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('settings.setting.create') }}" class="btn btn-success" title="{{ trans('settings.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('settings.setting.edit', $setting->id ) }}" class="btn btn-primary" title="{{ trans('settings.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('settings.delete') }}" onclick="return confirm(&quot;{{ trans('settings.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('settings.phone') }}</dt>
            <dd>{{ $setting->phone }}</dd>
            <dt>{{ trans('settings.email') }}</dt>
            <dd>{{ $setting->email }}</dd>
            <dt>{{ trans('settings.whatsapp') }}</dt>
            <dd>{{ $setting->whatsapp }}</dd>

        </dl>

    </div>
</div>

@endsection