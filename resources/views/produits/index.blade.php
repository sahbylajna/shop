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
                <h4 class="mt-5 mb-5">{{ trans('produits.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('produits.produit.create') }}" class="btn btn-success" title="{{ trans('produits.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($produits) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('produits.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('produits.name') }}</th>
                            <th>{{ trans('produits.name_ar') }}</th>
                            <th>{{ trans('produits.price') }}</th>
                            <th>{{ trans('produits.category_id') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($produits as $produit)
                        <tr>
                            <td>{{ $produit->name }}</td>
                            <td>{{ $produit->name_ar }}</td>
                            <td>{{ $produit->price }}</td>
                            <td>{{ optional($produit->category)->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('produits.produit.destroy', $produit->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('produits.produit.show', $produit->id ) }}" class="btn btn-info" title="{{ trans('produits.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('produits.produit.edit', $produit->id ) }}" class="btn btn-primary" title="{{ trans('produits.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('produits.delete') }}" onclick="return confirm(&quot;{{ trans('produits.confirm_delete') }}&quot;)">
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
            {!! $produits->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection