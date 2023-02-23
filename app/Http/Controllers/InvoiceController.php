<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Dealer;
use App\Models\Invoice;
use App\Models\Outlet;
use App\Models\Scheme;
use App\Services\CommonService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $outlet=Outlet::get(['id','outlet_name','outlet_code']);
       // dd($outlet);
        $dealer=Dealer::where('status',1)->get(['id','name']);

        if ($request->ajax()){
            $query=Invoice::with('outlet.dealer:id,name')
                ->when(!empty($request->invoice), function ($q) {
                    return $q->where('invoice_number', 'like', "%" . request('invoice') . "%");
                })
                ->when(!empty($request->outlet), function ($q) {
                    return $q->where('outlet_id', request('outlet'));
                })
                ->when(!empty($request->dealer), function ($q) {
                    return $q->whereHas('outlet.dealer', function ($sub) {
                        return $sub->where('id', request('dealer'));
                    });
                })
                ->when($request->has('settlement_status') && !is_null($request->settlement_status), function ($q) {
                    return $q->where('payment_status', request('settlement_status'));
                })
                ->where('status',1)
                ->get();
            $table= Datatables::of($query);

            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('invoice_number', function ($row) {
                return $row->invoice_number ?? '';
            });
            $table->editColumn('period', function ($row) {
                return $row->start_date && $row->end_date ? "$row->start_date / $row->end_date" : '';
            });
            $table->editColumn('outlet', function ($row) {
                return $row->outlet ? optional($row->outlet)->outlet_name : '';
            });
            $table->editColumn('dealer', function ($row) {
                return optional(optional($row->outlet)->dealer)->name;
            });
            $table->editColumn('settlement_status', function ($row) {
                    return Invoice::SETTLEMENT_STATUS[$row->payment_status] ?? '';
            });

            $table->editColumn('actions', function ($row) {
                $editRoute = route('invoice.edit', $row->id);
                $viewRoute = route('invoice.show', [$row->id]);
                return view('invoice.action',
                    compact( 'viewRoute', 'editRoute'));
            });

            $table->rawColumns(['actions']);

            return $table->make(true);
        }
       // dd($invoice);
        return view('invoice.index',compact('outlet','dealer'));
    }
    public function create()
    {
        $outlet=Outlet::get(['id','outlet_name','outlet_code']);
        $period=CommonService::generateInvoiceWeeks();
       // dd($period);

        return view('invoice.create',compact('outlet','period'));
    }
    public function store(StoreInvoiceRequest $request)
    {
        list($startDate, $endDate) = explode(' / ', $request->period);

        $checkExists = Invoice::where([
            'outlet_id' => $request->outlet,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => 1
        ])->count();
      //  dd($checkExists);
        if ($checkExists > 0) {
            return redirect()->back()->withInput($request->all())->with('error', 'Invoice already generated!');
        }

        $outlet=Outlet::select(['id','commission_rate'])->find($request->outlet);
       // dd($outlet);

        $invoice=Invoice::create([
            'outlet_id'=>$outlet->id,
            'start_date'=>$startDate,
            'end_date'=>$endDate,
            'invoice_number'=>CommonService::generateInvoicNumber(),
            'outlet_commission_percent'=>$outlet->commission_rate,
            'sell_amount'=>rand(1111,9999),
            'vat_amount'=>rand(1111,9999),
            'total_sell_amount'=>rand(1111,9999),
            'total_payment'=>rand(1111,9999),
            'outlet_commission'=>(rand(111,999) * $outlet->commission_rate) / 100,
            'status'=>1
        ]);

        return redirect()->route('invoice.index')->with('Create Successful');
    }
    public function show(Invoice $invoice)
    {
        $outlet=Outlet::where('id',$invoice->outlet_id)->first();
       // dd($outlet);
       // $invoice=Invoice::find($id);
        $scheme=Scheme::where('status',1)->get();
        return view('invoice.view',compact('invoice','outlet','scheme'));
    }
    public function edit($id)
    {
        $invoice=Invoice::find($id);
        return view('invoice.edit',compact('invoice'));
    }
    public function update(UpdateInvoiceRequest $request, $id)
    {
        $invoice=Invoice::find($id);
        $invoice->update([
            'payment_status'=>$request->payment_status,
        ]);
        return redirect()->route('invoice.index')->with('Update Successful');
    }
}
