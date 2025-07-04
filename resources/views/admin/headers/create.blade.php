@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.header.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.headers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.header.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subtitle">{{ trans('cruds.header.fields.subtitle') }}</label>
                <input class="form-control {{ $errors->has('subtitle') ? 'is-invalid' : '' }}" type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', '') }}">
                @if($errors->has('subtitle'))
                    <span class="text-danger">{{ $errors->first('subtitle') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.subtitle_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button">{{ trans('cruds.header.fields.button') }}</label>
                <input class="form-control {{ $errors->has('button') ? 'is-invalid' : '' }}" type="text" name="button" id="button" value="{{ old('button', '') }}">
                @if($errors->has('button'))
                    <span class="text-danger">{{ $errors->first('button') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.button_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link">{{ trans('cruds.header.fields.link') }}</label>
                <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{ old('link', '') }}">
                @if($errors->has('link'))
                    <span class="text-danger">{{ $errors->first('link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.header.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.photo_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.headers.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($header) && $header->photo)
      var file = {!! json_encode($header->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection