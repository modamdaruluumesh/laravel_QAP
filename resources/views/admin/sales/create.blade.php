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
                </div>

                <!-- Products Wrapper -->
                <div id="products-wrapper">
                    <div class="product-row border p-3 mb-3">

                        <!-- Category -->
                        <div class="form-group">
                            <label>{{ trans('cruds.sale.fields.catergory_name') }}</label>
                            <select class="form-control select2 category-select" name="catergory_name_id[]">
                                <option value="" disabled selected>{{ trans('global.pleaseSelect') }}</option>
                                @foreach ($catergory_names as $id => $entry)
                                    <option value="{{ $id }}">{{ $entry }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Product -->
                        <div class="form-group">
                            <label>{{ trans('cruds.sale.fields.product_name') }}</label>
                            <select class="form-control select2 product-select" name="product_id[]">
                                <option value="" disabled selected>{{ trans('global.pleaseSelect') }}</option>
                            </select>
                        </div>

                        <!-- Price -->
                        <div class="form-group">
                            <label>{{ trans('cruds.sale.fields.price') }}</label>
                            <input type="text" class="form-control price-input" name="price[]" value="">
                        </div>

                        <!-- Quantity -->
                        <div class="form-group">
                            <label>{{ trans('cruds.sale.fields.quantity') }}</label>
                            <input type="text" class="form-control quantity-input" name="quantity[]" value="">
                        </div>

                        <!-- Total Amount -->
                        <div class="form-group">
                            <label>{{ trans('cruds.sale.fields.total_amount') }}</label>
                            <input type="text" class="form-control total-amount-input" name="total_amount[]"
                                value="" readonly>
                        </div>
                    </div>
                </div>

                <!-- Add More Products -->
                <button type="button" id="add-more-product" class="btn btn-info mb-3">+ Add More Product</button>

                <!-- Sub Total -->
                <div class="form-group">
                    <label>{{ trans('cruds.sale.fields.sub_total') }}</label>
                    <input class="form-control" type="text" name="sub_total" id="sub_total" value="" readonly>
                </div>

                <!-- Discount -->
                <div class="form-group">
                    <label>{{ trans('cruds.sale.fields.discount') }}</label>
                    <input class="form-control" type="text" name="discount" id="discount" value="0">
                </div>

                <!-- Tax Rate -->
                <div class="form-group">
                    <label>{{ trans('cruds.sale.fields.tax_rate') }}</label>
                    <input class="form-control" type="text" name="tax_rate" id="tax_rate" value="0">
                </div>

                <!-- Total Payable -->
                <div class="form-group">
                    <label>{{ trans('cruds.sale.fields.total_payable') }}</label>
                    <input class="form-control" type="text" name="total_payable" id="total_payable" value=""
                        readonly>
                </div>

                <!-- Amount Payable -->
                <div class="form-group">
                    <label>{{ trans('cruds.sale.fields.amount_payable') }}</label>
                    <input class="form-control" type="text" name="amount_payable" id="amount_payable" value=""
                        readonly>
                </div>

                <!-- Payment Method -->
                <div class="form-group">
                    <label>{{ trans('cruds.sale.fields.payment_method') }}</label>
                    <select class="form-control" name="payment_method" id="payment_method">
                        <option value="" disabled selected>{{ trans('global.pleaseSelect') }}</option>
                        @foreach (App\Models\Sale::PAYMENT_METHOD_SELECT as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Submit -->
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">{{ trans('global.save') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();

            const productsByCategory = @json($productsByCategory);

            function bindRowEvents(row) {
                const categorySelect = row.find('.category-select');
                const productSelect = row.find('.product-select');
                const priceInput = row.find('.price-input');
                const quantityInput = row.find('.quantity-input');
                const totalAmountInput = row.find('.total-amount-input');

                // Update product list when category changes
                categorySelect.on('change', function() {
                    const categoryId = $(this).val();
                    productSelect.empty().append(
                        '<option value="" disabled selected>{{ trans('global.pleaseSelect') }}</option>'
                    );
                    const category = productsByCategory.find(cat => cat.id == categoryId);
                    if (category && category.products.length > 0) {
                        category.products.forEach(product => {
                            const option = new Option(product.product_name, product.id, false,
                                false);
                            $(option).attr('data-price', product.product_price);
                            productSelect.append(option);
                        });
                    }
                    productSelect.trigger('change.select2');
                });

                // Auto-fill price when product is chosen
                productSelect.on('select2:select', function() {
                    const selectedOption = $(this).find('option:selected');
                    const productPrice = selectedOption.attr('data-price');
                    priceInput.val(productPrice ? productPrice : '');
                    calculateRow();
                });

                // Per-row calculation
                function calculateRow() {
                    const price = parseFloat(priceInput.val()) || 0;
                    const qty = parseFloat(quantityInput.val()) || 0;
                    const total = price * qty;
                    totalAmountInput.val(total.toFixed(2));
                    calculateTotals();
                }

                quantityInput.on('input keyup change', calculateRow);
                priceInput.on('input keyup change', calculateRow);
            }

            // Calculate grand totals
            function calculateTotals() {
                let subTotal = 0;
                $('.total-amount-input').each(function() {
                    subTotal += parseFloat($(this).val()) || 0;
                });

                const discount = parseFloat($('#discount').val()) || 0;
                const taxRate = parseFloat($('#tax_rate').val()) || 0;

                let discounted = subTotal - (subTotal * (discount / 100));
                let totalPayable = discounted + (discounted * (taxRate / 100));

                $('#sub_total').val(subTotal.toFixed(2));
                $('#total_payable').val(totalPayable.toFixed(2));
                $('#amount_payable').val(totalPayable.toFixed(2));
            }

            $('#discount, #tax_rate').on('input keyup change', calculateTotals);

            // Init first row
            bindRowEvents($('.product-row').first());

            // Add new product rows
            // Add new product rows
            $('#add-more-product').on('click', function() {
                let newRow = $('.product-row:first').clone(false, false); // clone without events

                // Reset inputs
                newRow.find('input').val('');
                newRow.find('select').val('').empty(); // clear cloned selects

                // Reset product dropdown with placeholder
                newRow.find('.product-select').append(
                    '<option value="" disabled selected>{{ trans('global.pleaseSelect') }}</option>');

                // Reset category dropdown with original options
                let categorySelect = newRow.find('.category-select');
                categorySelect.empty().append(
                    '<option value="" disabled selected>{{ trans('global.pleaseSelect') }}</option>');
                @foreach ($catergory_names as $id => $entry)
                    categorySelect.append(
                        '<option value="{{ $id }}">{{ $entry }}</option>');
                @endforeach

                // Remove select2 wrappers that got cloned
                newRow.find('.select2').removeClass('select2-hidden-accessible').next('.select2').remove();

                // Append fresh row
                $('#products-wrapper').append(newRow);

                // Re-init select2 on new selects
                newRow.find('.select2').select2();

                // Bind events again
                bindRowEvents(newRow);
            });


        });
    </script>
@endsection
  