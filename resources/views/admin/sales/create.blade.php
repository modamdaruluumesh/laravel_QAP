@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.sale.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.sales.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Client Name -->
                <div class="form-group">
                    <label for="client_name_id">{{ trans('cruds.sale.fields.client_name') }}</label>
                    <select class="form-control select2 {{ $errors->has('client_name') ? 'is-invalid' : '' }}"
                        name="client_name_id" id="client_name_id">
                        @foreach ($client_names as $id => $entry)
                            <option value="{{ $id }}" {{ old('client_name_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('client_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('client_name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.sale.fields.client_name_helper') }}</span>
                </div>

                <!-- Category Name -->
                <div class="form-group">
                    <label for="catergory_name_id">{{ trans('cruds.sale.fields.catergory_name') }}</label>
                    <select class="form-control select2 {{ $errors->has('catergory_name') ? 'is-invalid' : '' }}"
                        name="catergory_name_id" id="catergory_name_id">
                        <option value="" disabled selected>{{ trans('global.pleaseSelect') }}</option>
                        @foreach ($catergory_names as $id => $entry)
                            <option value="{{ $id }}" {{ old('catergory_name_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('catergory_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('catergory_name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.sale.fields.catergory_name_helper') }}</span>
                </div>

                <!-- Product Name (dynamically updated) -->
                <div class="form-group">
                    <label for="product_id">{{ trans('cruds.sale.fields.product_name') }}</label>
                    <select class="form-control select2 {{ $errors->has('product_id') ? 'is-invalid' : '' }}"
                        name="product_id" id="product_id">
                        <option value="" disabled selected>{{ trans('global.pleaseSelect') }}</option>
                        <!-- Options will be populated by JS -->
                    </select>
                    @if ($errors->has('product_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('product_id') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.sale.fields.product_name_helper') }}</span>
                </div>

                <!-- Price -->
                <div class="form-group">
                    <label for="price">{{ trans('cruds.sale.fields.price') }}</label>
                    <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="text"
                        name="price" id="price" value="{{ old('price', '') }}">
                    @if ($errors->has('price'))
                        <div class="invalid-feedback">
                            {{ $errors->first('price') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.sale.fields.price_helper') }}</span>
                </div>

                <!-- Quantity -->
                <div class="form-group">
                    <label for="quantity">{{ trans('cruds.sale.fields.quantity') }}</label>
                    <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="text"
                        name="quantity" id="quantity" value="{{ old('quantity', '') }}">
                    @if ($errors->has('quantity'))
                        <div class="invalid-feedback">
                            {{ $errors->first('quantity') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.sale.fields.quantity_helper') }}</span>
                </div>

                <!-- Total Amount -->
                <div class="form-group">
                    <label for="total_amount">{{ trans('cruds.sale.fields.total_amount') }}</label>
                    <input class="form-control {{ $errors->has('total_amount') ? 'is-invalid' : '' }}" type="text"
                        name="total_amount" id="total_amount" value="{{ old('total_amount', '') }}">
                    @if ($errors->has('total_amount'))
                        <div class="invalid-feedback">
                            {{ $errors->first('total_amount') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.sale.fields.total_amount_helper') }}</span>
                </div>

                <!-- Sub Total -->
                <div class="form-group">
                    <label for="sub_total">{{ trans('cruds.sale.fields.sub_total') }}</label>
                    <input class="form-control {{ $errors->has('sub_total') ? 'is-invalid' : '' }}" type="text"
                        name="sub_total" id="sub_total" value="{{ old('sub_total', '') }}">
                    @if ($errors->has('sub_total'))
                        <div class="invalid-feedback">
                            {{ $errors->first('sub_total') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.sale.fields.sub_total_helper') }}</span>
                </div>

                <!-- Discount -->
                <div class="form-group">
                    <label for="discount">{{ trans('cruds.sale.fields.discount') }}</label>
                    <input class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" type="text"
                        name="discount" id="discount" value="{{ old('discount', '') }}">
                    @if ($errors->has('discount'))
                        <div class="invalid-feedback">
                            {{ $errors->first('discount') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.sale.fields.discount_helper') }}</span>
                </div>

                <!-- Tax Rate -->
                <div class="form-group">
                    <label for="tax_rate">{{ trans('cruds.sale.fields.tax_rate') }}</label>
                    <input class="form-control {{ $errors->has('tax_rate') ? 'is-invalid' : '' }}" type="text"
                        name="tax_rate" id="tax_rate" value="{{ old('tax_rate', '') }}">
                    @if ($errors->has('tax_rate'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tax_rate') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.sale.fields.tax_rate_helper') }}</span>
                </div>

                <!-- Total Payable -->
                <div class="form-group">
                    <label for="total_payable">{{ trans('cruds.sale.fields.total_payable') }}</label>
                    <input class="form-control {{ $errors->has('total_payable') ? 'is-invalid' : '' }}" type="text"
                        name="total_payable" id="total_payable" value="{{ old('total_payable', '') }}">
                    @if ($errors->has('total_payable'))
                        <div class="invalid-feedback">
                            {{ $errors->first('total_payable') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.sale.fields.total_payable_helper') }}</span>
                </div>

                <!-- Amount Payable -->
                <div class="form-group">
                    <label for="amount_payable">{{ trans('cruds.sale.fields.amount_payable') }}</label>
                    <input class="form-control {{ $errors->has('amount_payable') ? 'is-invalid' : '' }}" type="text"
                        name="amount_payable" id="amount_payable" value="{{ old('amount_payable', '') }}">
                    @if ($errors->has('amount_payable'))
                        <div class="invalid-feedback">
                            {{ $errors->first('amount_payable') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.sale.fields.amount_payable_helper') }}</span>
                </div>

                <!-- Payment Method -->
                <div class="form-group">
                    <label>{{ trans('cruds.sale.fields.payment_method') }}</label>
                    <select class="form-control {{ $errors->has('payment_method') ? 'is-invalid' : '' }}"
                        name="payment_method" id="payment_method">
                        <option value="" disabled {{ old('payment_method', null) === null ? 'selected' : '' }}>
                            {{ trans('global.pleaseSelect') }}
                        </option>
                        @foreach (App\Models\Sale::PAYMENT_METHOD_SELECT as $key => $label)
                            <option value="{{ $key }}"
                                {{ old('payment_method', '') === (string) $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('payment_method'))
                        <div class="invalid-feedback">
                            {{ $errors->first('payment_method') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.sale.fields.payment_method_helper') }}</span>
                </div>

                <!-- Submit Button -->
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        // Initialize Select2
        $('.select2').select2();

        // Grouped products from Laravel (category_id => [{id, name}, ...])
        const productsByCategory = @json($products->groupBy('category_id')->map->map(function ($product) {
            return ['id' => $product->id, 'name' => $product->name];
        }));

        const categorySelect = $('#catergory_name_id');
        const productSelect = $('#product_id');

        // Update product dropdown based on selected category
        function updateProductDropdown() {
            const categoryId = categorySelect.val();

            // Destroy Select2 to modify options
            productSelect.empty().select2('destroy');

            // Add default option
            productSelect.append('<option value="" disabled selected>{{ trans("global.pleaseSelect") }}</option>');

            // If category is selected and has products
            if (categoryId && productsByCategory[categoryId]) {
                productsByCategory[categoryId].forEach(product => {
                    const option = new Option(product.name, product.id, false, false);
                    productSelect.append(option);
                });
            }

            // Reinitialize Select2
            productSelect.select2();
        }

        // Listen for category change
        categorySelect.on('change', updateProductDropdown);

        // Initialize on page load if category is pre-selected (e.g., from old input)
        if (categorySelect.val()) {
            updateProductDropdown();
        }
    });
</script>
@endsection