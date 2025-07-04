@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.nav.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.navs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.nav.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.nav.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="link">{{ trans('cruds.nav.fields.link') }}</label>
                <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{ old('link', '') }}" required>
                @if($errors->has('link'))
                    <span class="text-danger">{{ $errors->first('link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.nav.fields.link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="position">{{ trans('cruds.nav.fields.position') }}</label>
                <input class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" type="number" name="position" id="position" value="{{ old('position', '') }}" step="1">
                @if($errors->has('position'))
                    <span class="text-danger">{{ $errors->first('position') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.nav.fields.position_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection