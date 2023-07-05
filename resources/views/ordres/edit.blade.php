@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
  
        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($title) ? $title : 'Ordre' }}</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('ordres.ordre.index') }}" class="btn btn-primary" title="{{ trans('ordres.show_all') }}">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('ordres.ordre.create') }}" class="btn btn-success" title="{{ trans('ordres.create') }}">
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

            <form method="POST" action="{{ route('ordres.ordre.update', $ordre->id) }}" id="edit_ordre_form" name="edit_ordre_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('ordres.form', [
                                        'ordre' => $ordre,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('ordres.update') }}">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection