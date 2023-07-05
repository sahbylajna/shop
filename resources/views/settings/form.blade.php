
<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">{{ trans('settings.phone') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="phone" type="text" id="phone" value="{{ old('phone', optional($setting)->phone) }}" minlength="1" placeholder="{{ trans('settings.phone__placeholder') }}">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">{{ trans('settings.email') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="email" id="email" value="{{ old('email', optional($setting)->email) }}" placeholder="{{ trans('settings.email__placeholder') }}">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('whatsapp') ? 'has-error' : '' }}">
    <label for="whatsapp" class="col-md-2 control-label">{{ trans('settings.whatsapp') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="whatsapp" type="text" id="whatsapp" value="{{ old('whatsapp', optional($setting)->whatsapp) }}" minlength="1" placeholder="{{ trans('settings.whatsapp__placeholder') }}">
        {!! $errors->first('whatsapp', '<p class="help-block">:message</p>') !!}
    </div>
</div>

