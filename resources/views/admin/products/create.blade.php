@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.product.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.products.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="product_name">{{ trans('cruds.product.fields.product_name') }}</label>
                <input class="form-control {{ $errors->has('product_name') ? 'is-invalid' : '' }}" type="text" name="product_name" id="product_name" value="{{ old('product_name', '') }}">
                @if($errors->has('product_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.product_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_image">{{ trans('cruds.product.fields.product_image') }}</label>
                <input class="form-control {{ $errors->has('product_image') ? 'is-invalid' : '' }}" type="file" name="product_image" id="product_image" value="{{ old('product_image', '') }}">
                @if($errors->has('product_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.product_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_code">{{ trans('cruds.product.fields.product_code') }}</label>
                <input class="form-control {{ $errors->has('product_code') ? 'is-invalid' : '' }}" type="text" name="product_code" id="product_code" value="{{ old('product_code', '') }}">
                @if($errors->has('product_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.product_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_price">{{ trans('cruds.product.fields.product_price') }}</label>
                <input class="form-control {{ $errors->has('product_price') ? 'is-invalid' : '' }}" type="text" name="product_price" id="product_price" value="{{ old('product_price', '') }}">
                @if($errors->has('product_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.product_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_description">{{ trans('cruds.product.fields.product_description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('product_description') ? 'is-invalid' : '' }}" name="product_description" id="product_description">{!! old('product_description') !!}</textarea>
                @if($errors->has('product_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.product_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_breif_info">{{ trans('cruds.product.fields.product_breif_info') }}</label>
                <input class="form-control {{ $errors->has('product_breif_info') ? 'is-invalid' : '' }}" type="text" name="product_breif_info" id="product_breif_info" value="{{ old('product_breif_info', '') }}">
                @if($errors->has('product_breif_info'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_breif_info') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.product_breif_info_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.products.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $product->id ?? 0 }}');
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