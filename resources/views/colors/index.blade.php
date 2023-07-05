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
                <h4 class="mt-5 mb-5">{{ trans('colors.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('colors.color.create') }}" class="btn btn-success" title="{{ trans('colors.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($colors) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('colors.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('colors.name') }}</th>
                            <th>{{ trans('colors.name_ar') }}</th>
                            <th>{{ trans('colors.valeur') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($colors as $color)
                        <tr>
                            <td>{{ $color->name }}</td>
                            <td>{{ $color->name_ar }}</td>
                            <td>{{ $color->valeur }}</td>

                            <td>

                                <form method="POST" action="{!! route('colors.color.destroy', $color->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('colors.color.show', $color->id ) }}" class="btn btn-info" title="{{ trans('colors.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('colors.color.edit', $color->id ) }}" class="btn btn-primary" title="{{ trans('colors.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('colors.delete') }}" onclick="return confirm(&quot;{{ trans('colors.confirm_delete') }}&quot;)">
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
            {!! $colors->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection