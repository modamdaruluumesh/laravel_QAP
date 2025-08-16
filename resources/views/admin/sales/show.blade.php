@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sale.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sales.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.id') }}
                        </th>
                        <td>
                            {{ $sale->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.client_name') }}
                        </th>
                        <td>
                            {{ $sale->client_name->client_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.catergory_name') }}
                        </th>
                        <td>
                            {{ $sale->catergory_name->category_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.product_name') }}
                        </th>
                        <td>
                            {{ $sale->product_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.price') }}
                        </th>
                        <td>
                            {{ $sale->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.quantity') }}
                        </th>
                        <td>
                            {{ $sale->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.total_amount') }}
                        </th>
                        <td>
                            {{ $sale->total_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.sub_total') }}
                        </th>
                        <td>
                            {{ $sale->sub_total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.discount') }}
                        </th>
                        <td>
                            {{ $sale->discount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.tax_rate') }}
                        </th>
                        <td>
                            {{ $sale->tax_rate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.total_payable') }}
                        </th>
                        <td>
                            {{ $sale->total_payable }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.amount_payable') }}
                        </th>
                        <td>
                            {{ $sale->amount_payable }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.payment_method') }}
                        </th>
                        <td>
                            {{ App\Models\Sale::PAYMENT_METHOD_SELECT[$sale->payment_method] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sales.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection