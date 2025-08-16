@extends('layouts.admin')
@section('content')
@can('sale_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sales.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.sale.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Sale', 'route' => 'admin.sales.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.sale.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Sale">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.sale.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.sale.fields.client_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.sale.fields.catergory_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.sale.fields.product_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.sale.fields.price') }}
                    </th>
                    <th>
                        {{ trans('cruds.sale.fields.quantity') }}
                    </th>
                    <th>
                        {{ trans('cruds.sale.fields.total_amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.sale.fields.sub_total') }}
                    </th>
                    <th>
                        {{ trans('cruds.sale.fields.discount') }}
                    </th>
                    <th>
                        {{ trans('cruds.sale.fields.tax_rate') }}
                    </th>
                    <th>
                        {{ trans('cruds.sale.fields.total_payable') }}
                    </th>
                    <th>
                        {{ trans('cruds.sale.fields.amount_payable') }}
                    </th>
                    <th>
                        {{ trans('cruds.sale.fields.payment_method') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('sale_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sales.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.sales.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'client_name_client_name', name: 'client_name.client_name' },
{ data: 'catergory_name_category_name', name: 'catergory_name.category_name' },
{ data: 'product_name', name: 'product_name' },
{ data: 'price', name: 'price' },
{ data: 'quantity', name: 'quantity' },
{ data: 'total_amount', name: 'total_amount' },
{ data: 'sub_total', name: 'sub_total' },
{ data: 'discount', name: 'discount' },
{ data: 'tax_rate', name: 'tax_rate' },
{ data: 'total_payable', name: 'total_payable' },
{ data: 'amount_payable', name: 'amount_payable' },
{ data: 'payment_method', name: 'payment_method' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Sale').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection