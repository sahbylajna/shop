
<div class="form-group {{ $errors->has('produit_id') ? 'has-error' : '' }}">
    <label for="produit_id" class="col-md-2 control-label">{{ trans('ordres.produit_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="produit_id" name="produit_id">
        	    <option value="" style="display: none;" {{ old('produit_id', optional($ordre)->produit_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('ordres.produit_id__placeholder') }}</option>
        	@foreach ($produits as $key => $produit)
			    <option value="{{ $key }}" {{ old('produit_id', optional($ordre)->produit_id) == $key ? 'selected' : '' }}>
			    	{{ $produit }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('produit_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('color_id') ? 'has-error' : '' }}">
    <label for="color_id" class="col-md-2 control-label">{{ trans('ordres.color_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="color_id" name="color_id">
        	    <option value="" style="display: none;" {{ old('color_id', optional($ordre)->color_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('ordres.color_id__placeholder') }}</option>
        	@foreach ($colors as $key => $color)
			    <option value="{{ $key }}" {{ old('color_id', optional($ordre)->color_id) == $key ? 'selected' : '' }}>
			    	{{ $color }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('color_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('size_id') ? 'has-error' : '' }}">
    <label for="size_id" class="col-md-2 control-label">{{ trans('ordres.size_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="size_id" name="size_id">
        	    <option value="" style="display: none;" {{ old('size_id', optional($ordre)->size_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('ordres.size_id__placeholder') }}</option>
        	@foreach ($sizes as $key => $size)
			    <option value="{{ $key }}" {{ old('size_id', optional($ordre)->size_id) == $key ? 'selected' : '' }}>
			    	{{ $size }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('size_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
    <label for="quantity" class="col-md-2 control-label">{{ trans('ordres.quantity') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="quantity" type="text" id="quantity" value="{{ old('quantity', optional($ordre)->quantity) }}" minlength="1" placeholder="{{ trans('ordres.quantity__placeholder') }}">
        {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
    </div>
</div>

