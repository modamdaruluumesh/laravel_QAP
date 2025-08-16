@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.service.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.services.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="services_image">{{ trans('cruds.service.fields.services_image') }}</label>
                <input class="form-control {{ $errors->has('services_image') ? 'is-invalid' : '' }}" type="text" name="services_image" id="services_image" value="{{ old('services_image', '') }}">
                @if($errors->has('services_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('services_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.services_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="services_title">{{ trans('cruds.service.fields.services_title') }}</label>
                <input class="form-control {{ $errors->has('services_title') ? 'is-invalid' : '' }}" type="text" name="services_title" id="services_title" value="{{ old('services_title', '') }}">
                @if($errors->has('services_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('services_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.services_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="services_text">{{ trans('cruds.service.fields.services_text') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('services_text') ? 'is-invalid' : '' }}" name="services_text" id="services_text">{!! old('services_text') !!}</textarea>
                @if($errors->has('services_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('services_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.services_text_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.services.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $service->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection