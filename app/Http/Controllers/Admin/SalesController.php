<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySaleRequest;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Category;
use App\Models\Client;
use App\Models\Product;

use App\Models\Sale;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SalesController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('sale_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Sale::with(['client_name', 'catergory_name'])->select(sprintf('%s.*', (new Sale)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'sale_show';
                $editGate      = 'sale_edit';
                $deleteGate    = 'sale_delete';
                $crudRoutePart = 'sales';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('client_name_client_name', function ($row) {
                return $row->client_name ? $row->client_name->client_name : '';
            });

            $table->addColumn('catergory_name_category_name', function ($row) {
                return $row->catergory_name ? $row->catergory_name->category_name : '';
            });

            $table->editColumn('product_name', function ($row) {
                return $row->product_name ? $row->product_name : '';
            });
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : '';
            });
            $table->editColumn('quantity', function ($row) {
                return $row->quantity ? $row->quantity : '';
            });
            $table->editColumn('total_amount', function ($row) {
                return $row->total_amount ? $row->total_amount : '';
            });
            $table->editColumn('sub_total', function ($row) {
                return $row->sub_total ? $row->sub_total : '';
            });
            $table->editColumn('discount', function ($row) {
                return $row->discount ? $row->discount : '';
            });
            $table->editColumn('tax_rate', function ($row) {
                return $row->tax_rate ? $row->tax_rate : '';
            });
            $table->editColumn('total_payable', function ($row) {
                return $row->total_payable ? $row->total_payable : '';
            });
            $table->editColumn('amount_payable', function ($row) {
                return $row->amount_payable ? $row->amount_payable : '';
            });
            $table->editColumn('payment_method', function ($row) {
                return $row->payment_method ? Sale::PAYMENT_METHOD_SELECT[$row->payment_method] : '';
            });
            $table->addColumn('product_product_name', function ($row) {
                return $row->product ? $row->product->product_name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'client_name', 'catergory_name', 'product']);

            return $table->make(true);
        }

        return view('admin.sales.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sale_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client_names = Client::pluck('client_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $productsByCategory = Category::with(['products:id,category_id,product_name,product_price'])->get();
        $catergory_names = Category::pluck('category_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $products = \App\Models\Product::with('category')->get(); // Must have category_id
        return view('admin.sales.create', compact('catergory_names', 'client_names', 'products', 'productsByCategory'));
    }

    public function store(StoreSaleRequest $request)
    {
        $products     = $request->input('product_id', []);
        $categories   = $request->input('catergory_name_id', []);
        $prices       = $request->input('price', []);
        $quantities   = $request->input('quantity', []);
        $totals       = $request->input('total_amount', []);

        foreach ($products as $i => $productId) {
            Sale::create([
                'client_name_id'    => $request->client_name_id,
                'catergory_name_id' => $categories[$i],
                'product_id'        => $productId,
                'price'             => $prices[$i],
                'quantity'          => $quantities[$i],
                'total_amount'      => $totals[$i],
                'sub_total'         => $request->sub_total,
                'discount'          => $request->discount,
                'tax_rate'          => $request->tax_rate,
                'total_payable'     => $request->total_payable,
                'amount_payable'    => $request->amount_payable,
                'payment_method'    => $request->payment_method,
            ]);
        }

        return redirect()->route('admin.sales.index')->with('success', 'Sale(s) created successfully!');
    }



    public function edit(Sale $sale)
    {
        abort_if(Gate::denies('sale_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client_names = Client::pluck('client_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $catergory_names = Category::pluck('category_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sale->load('client_name', 'catergory_name');

        return view('admin.sales.edit', compact('catergory_names', 'client_names', 'sale'));
    }

    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        $sale->update($request->all());

        return redirect()->route('admin.sales.index');
    }

    public function show(Sale $sale)
    {
        abort_if(Gate::denies('sale_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sale->load('client_name', 'catergory_name');

        return view('admin.sales.show', compact('sale'));
    }

    public function destroy(Sale $sale)
    {
        abort_if(Gate::denies('sale_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sale->delete();

        return back();
    }

    public function massDestroy(MassDestroySaleRequest $request)
    {
        $sales = Sale::find(request('ids'));

        foreach ($sales as $sale) {
            $sale->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
