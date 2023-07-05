@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ trans('sizes.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('sizes.size.create') }}" class="btn btn-success" title="{{ trans('sizes.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($sizes) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('sizes.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('sizes.name') }}</th>
                            <th>{{ trans('sizes.name_ar') }}</th>
                            <th>{{ trans('sizes.valeur') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($sizes as $size)
                        <tr>
                            <td>{{ $size->name }}</td>
                            <td>{{ $size->name_ar }}</td>
                            <td>{{ $size->valeur }}</td>

                            <td>

                                <form method="POST" action="{!! route('sizes.size.destroy', $size->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('sizes.size.show', $size->id ) }}" class="btn btn-info" title="{{ trans('sizes.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('sizes.size.edit', $size->id ) }}" class="btn btn-primary" title="{{ trans('sizes.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('sizes.delete') }}" onclick="return confirm(&quot;{{ trans('sizes.confirm_delete') }}&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $sizes->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection