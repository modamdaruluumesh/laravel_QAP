@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.client.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.clients.update", [$client->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="client_name">{{ trans('cruds.client.fields.client_name') }}</label>
                <input class="form-control {{ $errors->has('client_name') ? 'is-invalid' : '' }}" type="text" name="client_name" id="client_name" value="{{ old('client_name', $client->client_name) }}">
                @if($errors->has('client_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.client_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_email">{{ trans('cruds.client.fields.client_email') }}</label>
                <input class="form-control {{ $errors->has('client_email') ? 'is-invalid' : '' }}" type="email" name="client_email" id="client_email" value="{{ old('client_email', $client->client_email) }}">
                @if($errors->has('client_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.client_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_phone_number">{{ trans('cruds.client.fields.client_phone_number') }}</label>
                <input class="form-control {{ $errors->has('client_phone_number') ? 'is-invalid' : '' }}" type="text" name="client_phone_number" id="client_phone_number" value="{{ old('client_phone_number', $client->client_phone_number) }}">
                @if($errors->has('client_phone_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client_phone_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.client_phone_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_address">{{ trans('cruds.client.fields.client_address') }}</label>
                <input class="form-control {{ $errors->has('client_address') ? 'is-invalid' : '' }}" type="text" name="client_address" id="client_address" value="{{ old('client_address', $client->client_address) }}">
                @if($errors->has('client_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.client_address_helper') }}</span>
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