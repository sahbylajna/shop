
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('categories.name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($category)->name) }}" minlength="1" maxlength="255" placeholder="{{ trans('categories.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name_ar') ? 'has-error' : '' }}">
    <label for="name_ar" class="col-md-2 control-label">{{ trans('categories.name_ar') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name_ar" type="text" id="name_ar" value="{{ old('name_ar', optional($category)->name_ar) }}" minlength="1" placeholder="{{ trans('categories.name_ar__placeholder') }}">
        {!! $errors->first('name_ar', '<p class="help-block">:message</p>') !!}
    </div>
</div>

