
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('sizes.name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($size)->name) }}" minlength="1" maxlength="255" placeholder="{{ trans('sizes.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name_ar') ? 'has-error' : '' }}">
    <label for="name_ar" class="col-md-2 control-label">{{ trans('sizes.name_ar') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name_ar" type="text" id="name_ar" value="{{ old('name_ar', optional($size)->name_ar) }}" minlength="1" placeholder="{{ trans('sizes.name_ar__placeholder') }}">
        {!! $errors->first('name_ar', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('valeur') ? 'has-error' : '' }}">
    <label for="valeur" class="col-md-2 control-label">{{ trans('sizes.valeur') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="valeur" type="text" id="valeur" value="{{ old('valeur', optional($size)->valeur) }}" minlength="1" placeholder="{{ trans('sizes.valeur__placeholder') }}">
        {!! $errors->first('valeur', '<p class="help-block">:message</p>') !!}
    </div>
</div>

