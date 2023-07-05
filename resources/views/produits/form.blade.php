
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('produits.name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($produit)->name) }}" minlength="1" maxlength="255" placeholder="{{ trans('produits.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name_ar') ? 'has-error' : '' }}">
    <label for="name_ar" class="col-md-2 control-label">{{ trans('produits.name_ar') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name_ar" type="text" id="name_ar" value="{{ old('name_ar', optional($produit)->name_ar) }}" minlength="1" placeholder="{{ trans('produits.name_ar__placeholder') }}">
        {!! $errors->first('name_ar', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">{{ trans('produits.description') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1" maxlength="1000">{{ old('description', optional($produit)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description_ar') ? 'has-error' : '' }}">
    <label for="description_ar" class="col-md-2 control-label">{{ trans('produits.description_ar') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="description_ar" cols="50" rows="10" id="description_ar" minlength="1" maxlength="1000">{{ old('description_ar', optional($produit)->description_ar) }}</textarea>
        {!! $errors->first('description_ar', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
    <label for="price" class="col-md-2 control-label">{{ trans('produits.price') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="price" type="number" min="0" id="price" value="{{ old('price', optional($produit)->price) }}" minlength="1" placeholder="{{ trans('produits.price__placeholder') }}">
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
    <label for="photo" class="col-md-2 control-label">{{ trans('produits.photo') }}</label>
    <div class="col-md-10">
        <div class="input-group uploaded-file-group">
            <label class="input-group-btn">
                <span class="btn btn-default">
                    Browse <input type="file" name="photo" id="photo" class="hidden">
                </span>
            </label>
            <input type="text" class="form-control uploaded-file-name" readonly>
        </div>

        @if (isset($produit->photo) && !empty($produit->photo))
            <div class="input-group input-width-input">
                <span class="input-group-addon">
                    <input type="checkbox" name="custom_delete_photo" class="custom-delete-file" value="1" {{ old('custom_delete_photo', '0') == '1' ? 'checked' : '' }}> Delete
                </span>

                <span class="input-group-addon custom-delete-file-name">
                    {{ $produit->photo }}
                </span>
            </div>
        @endif
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
    <label for="category_id" class="col-md-2 control-label">{{ trans('produits.category_id') }}</label>
    <div class="col-md-10">
        <select class="form-control js-example-basic-single" id="category_id" name="category_id">
        	    <option value="" style="display: none;" {{ old('category_id', optional($produit)->category_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('produits.category_id__placeholder') }}</option>
        	@foreach ($categories as $key => $category)
			    <option value="{{ $key }}" {{ old('category_id', optional($produit)->category_id) == $key ? 'selected' : '' }}>
			    	{{ $category }}
			    </option>
			@endforeach
        </select>

        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>





<div class="form-group {{ $errors->has('size') ? 'has-error' : '' }}">
    <label for="size" class="col-md-2 control-label">{{ trans('sizes.model_plural') }}</label>
    <div class="col-md-10">
        <select class="form-control js-example-basic-multiple" id="size" name="size[]" multiple="multiple">

        	@foreach (\App\Models\size::all() as $key => $size)
			    <option value="{{ $size->id }}" >
			    	{{ $size->valeur }}
			    </option>
			@endforeach
        </select>

    </div>
</div>

<div class="form-group {{ $errors->has('color') ? 'has-error' : '' }}">
    <label for="color" class="col-md-2 control-label">{{ trans('colors.model_plural') }}</label>
    <div class="col-md-10">
        <select class="form-control js-example-basic-multiple" id="color" name="color[]" multiple="multiple">

        	@foreach (\App\Models\color::all() as $key => $color)
			    <option value="{{ $color->id }}" style="background: {{ $color->valeur }};">
			    	{{ $color->name }}
			    </option>
			@endforeach
        </select>

    </div>
</div>
