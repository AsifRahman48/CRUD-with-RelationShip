<?php

namespace App\Http\Controllers;

use App\Models\CouponResult;
use Illuminate\Http\Request;

class WinnerListController extends Controller
{
    public function index()
    {
        /*$result=CouponResult::groupBy('coupon_id')->with([
            'receipt:id,barcode_id',
            'scheme:id,title',
            'coupon:id,drag_number',
            'receipt.user.outlet:id,outlet_name'
        ])->select(["receipt_id", "coupon_id", "scheme_id", "prize"])
            ->where('status',1)
            ->where('prize','>',99)
            ->get();*/
        $winners = CouponResult::
            with([
                'scheme:id,title',
                'receipt.user.outlet:id,outlet_name',
                'coupon:id,drag_number',
                'winnerInfo'
            ])
            ->select(["receipt_id", "coupon_id", "scheme_id", "prize"])
            ->where('status', 1)
            ->get()
        ->groupBy('receipt_id');
        dd($winners);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
