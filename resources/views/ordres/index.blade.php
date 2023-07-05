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
                <h4 class="mt-5 mb-5">{{ trans('ordres.model_plural') }}</h4>
            </div>

            {{-- <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('ordres.ordre.create') }}" class="btn btn-success" title="{{ trans('ordres.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div> --}}

        </div>

        @if(count($ordres) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('ordres.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('ordres.produit_id') }}</th>
                            <th>{{ trans('ordres.color_id') }}</th>
                            <th>{{ trans('ordres.size_id') }}</th>
                            <th>{{ trans('ordres.quantity') }}</th>
                            <th>Etat</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($ordres as $ordre)

                        <tr>
                            <td>{{ optional($ordre->produit)->name }}</td>
                            <td>{{ optional($ordre->color)->name }}</td>
                            <td>{{ optional($ordre->size)->name }}</td>
                            <td>{{ $ordre->quantity }}</td>
                            <td>{{ $ordre->etat }}</td>

                            <td>

                                <form method="POST" action="{!! route('ordres.ordre.destroy', $ordre->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('ordres.ordre.show', $ordre->id ) }}" class="btn btn-info" title="{{ trans('ordres.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a data-toggle="modal" data-target="#exampleModal{{ $ordre->id }}" class="btn btn-primary" title="{{ trans('ordres.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                        <!-- Button trigger modal -->


                                        <button type="submit" class="btn btn-danger" title="{{ trans('ordres.delete') }}" onclick="return confirm(&quot;{{ trans('ordres.confirm_delete') }}&quot;)">
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
            {!! $ordres->render() !!}
        </div>

        @endif

    </div>




    @foreach($ordres as $ordre)

    <div class="modal fade" id="exampleModal{{ $ordre->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

                <dl class="dl-horizontal">
                    <dt>{{ trans('ordres.produit_id') }}</dt>
                    <dd>{{ optional($ordre->produit)->name ."  ". optional($ordre->produit)->name_ar }}</dd>
                    <dt>{{ trans('ordres.color_id') }}</dt>
                    <dd>{{ optional($ordre->color)->name }}</dd>
                    <dt>{{ trans('ordres.size_id') }}</dt>
                    <dd>{{ optional($ordre->size)->name }}</dd>
                    <dt>{{ trans('ordres.quantity') }}</dt>
                    <dd>{{ $ordre->quantity }}</dd>

                </dl>
                <form method="POST" action="{{ route('ordres.ordre.update', $ordre->id) }}" id="ordre{{ $ordre->id }}" name="ordre{{ $ordre->id }}" accept-charset="UTF-8" class="form-horizontal">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PUT">
                <div class="form-group">
                    <label for="quantity" class="col-md-2 control-label">etat</label>
                    <div class="col-md-10">
                        <select name="etat" class="form-control">
                            <option value="running">running</option>
                            <option value="ended">ended</option>
                        </select>
                    </div>
                </div>
            </form>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" type="submit" onclick="form_submit('ordre{{ $ordre->id }}')" class="btn btn-primary">Save changes</button>

            </div>

          </div>
        </div>
      </div>
    @endforeach

@endsection

@section('js')


<script type="text/javascript">
 $(function () {
        $("table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });

    });
    function form_submit(id) {
        console.log(id)
      document.getElementById(id).submit();
     }
    </script>
@endsection
