@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.sale.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sales.update", [$sale->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="client_name_id">{{ trans('cruds.sale.fields.client_name') }}</label>
                <select class="form-control select2 {{ $errors->has('client_name') ? 'is-invalid' : '' }}" name="client_name_id" id="client_name_id">
                    @foreach($client_names as $id => $entry)
                        <option value="{{ $id }}" {{ (old('client_name_id') ? old('client_name_id') : $sale->client_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('client_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.client_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="catergory_name_id">{{ trans('cruds.sale.fields.catergory_name') }}</label>
                <select class="form-control select2 {{ $errors->has('catergory_name') ? 'is-invalid' : '' }}" name="catergory_name_id" id="catergory_name_id">
                    @foreach($catergory_names as $id => $entry)
                        <option value="{{ $id }}" {{ (old('catergory_name_id') ? old('catergory_name_id') : $sale->catergory_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('catergory_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('catergory_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.catergory_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_name">{{ trans('cruds.sale.fields.product_name') }}</label>
                <input class="form-control {{ $errors->has('product_name') ? 'is-invalid' : '' }}" type="text" name="product_name" id="product_name" value="{{ old('product_name', $sale->product_name) }}">
                @if($errors->has('product_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.product_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price">{{ trans('cruds.sale.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="text" name="price" id="price" value="{{ old('price', $sale->price) }}">
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quantity">{{ trans('cruds.sale.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="text" name="quantity" id="quantity" value="{{ old('quantity', $sale->quantity) }}">
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_amount">{{ trans('cruds.sale.fields.total_amount') }}</label>
                <input class="form-control {{ $errors->has('total_amount') ? 'is-invalid' : '' }}" type="text" name="total_amount" id="total_amount" value="{{ old('total_amount', $sale->total_amount) }}">
                @if($errors->has('total_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.total_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sub_total">{{ trans('cruds.sale.fields.sub_total') }}</label>
                <input class="form-control {{ $errors->has('sub_total') ? 'is-invalid' : '' }}" type="text" name="sub_total" id="sub_total" value="{{ old('sub_total', $sale->sub_total) }}">
                @if($errors->has('sub_total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.sub_total_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="discount">{{ trans('cruds.sale.fields.discount') }}</label>
                <input class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" type="text" name="discount" id="discount" value="{{ old('discount', $sale->discount) }}">
                @if($errors->has('discount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.discount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tax_rate">{{ trans('cruds.sale.fields.tax_rate') }}</label>
                <input class="form-control {{ $errors->has('tax_rate') ? 'is-invalid' : '' }}" type="text" name="tax_rate" id="tax_rate" value="{{ old('tax_rate', $sale->tax_rate) }}">
                @if($errors->has('tax_rate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax_rate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.tax_rate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_payable">{{ trans('cruds.sale.fields.total_payable') }}</label>
                <input class="form-control {{ $errors->has('total_payable') ? 'is-invalid' : '' }}" type="text" name="total_payable" id="total_payable" value="{{ old('total_payable', $sale->total_payable) }}">
                @if($errors->has('total_payable'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_payable') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.total_payable_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amount_payable">{{ trans('cruds.sale.fields.amount_payable') }}</label>
                <input class="form-control {{ $errors->has('amount_payable') ? 'is-invalid' : '' }}" type="text" name="amount_payable" id="amount_payable" value="{{ old('amount_payable', $sale->amount_payable) }}">
                @if($errors->has('amount_payable'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount_payable') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.amount_payable_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.sale.fields.payment_method') }}</label>
                <select class="form-control {{ $errors->has('payment_method') ? 'is-invalid' : '' }}" name="payment_method" id="payment_method">
                    <option value disabled {{ old('payment_method', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Sale::PAYMENT_METHOD_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_method', $sale->payment_method) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_method'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_method') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.payment_method_helper') }}</span>
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