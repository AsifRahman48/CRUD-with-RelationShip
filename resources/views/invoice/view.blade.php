@extends('invoice.master')
@section('content')
    <div class="row">
        <div class="col-12 col-md-12">
                <a class="btn btn-info" href="{{ route('invoice.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>

            <div class="card mt-3">
                <div class="card-body">
                    <table align="center" class="tbl" cellpadding="0" cellspacing="0" border="0" style="border: none;" width="100%">
                        <tbody>
                        <tr>
                            <td width="40%" style="padding: 7px;">
                                <img src="{{ asset('Image/logo.png') }}" alt="Logo" style="width:100%; max-width: 220px;" />
                            </td>

                            <td width="60%" style="padding: 7px; font-family: arial; font-size: 20px; text-align:right; vertical-align: middle;">
                                <div class="outlet-name"><strong>{{ $outlet->outlet_name }}</strong></div>
                                Address:<strong>{{ $outlet->address }}</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <h3 align="center">VAT INVOICE WEEKLY STATEMENT</h3>

                    <table align="center" class="tbl" cellpadding="0" cellspacing="0" border="1" width="100%">
                        <tbody>
                        <tr>
                            <td rowspan="3" >
                                <strong>Customer Details:</strong><br />
                                Name: <strong>{{ $outlet->outlet_name }}</strong><br />
                                Address: <strong>{{ $outlet->address }}</strong><br />
                            </td>
                            <td class="title_name">Invoice No. </td>
                            <td class="title_name" style="font-size: 12px !important;font-weight: bold;">{{ $invoice->invoice_number }}</td>
                        </tr>

                        <tr>
                            <td class="title_name">Date</td>
                            <td class="title_name" style="font-size: 15px !important;">{{ \Carbon\Carbon::parse($invoice->created_at)->format('Y-m-d') }}</td>
                        </tr>

                        <tr>
                            <td class="title_name">Settlement Status</td>
                            <td class="title_name" style="font-size: 15px !important;">{{ \App\Models\Invoice::SETTLEMENT_STATUS[$invoice->payment_status] }}</td>
                        </tr>

                        <tr>
                            <td width="50%" align="right" class="title_name">Period:</td>
                            <td colspan="2">Week ({{ $invoice->start_date }} - {{ $invoice->end_date }})</td>
                        </tr>

                        <tr>
                            <td width="50%" class="title_name"><strong>Description</strong></td>
                            <td width="30%" align="center">
                                <table width="100%">
                                    <tbody>
                                    <tr>
                                        <td align="left" class="title_name">Amount</td>
                                        <td align="right" class="title_name">Vat</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td width="20%" align="center" class="title_name">Total (Incl. VAT)</td>
                        </tr>

                        @foreach($scheme as $list)
                            <tr>
                                <td >{{ $list->title }}</td>
                                <td>
                                    <table width="100%">
                                        <tbody>
                                        <tr>
                                            <td align="left">{{ $invoice->sell_amount }}</td>
                                            <td align="right">{{ $invoice->vat_amount }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td align="center">{{ $invoice->total_sell_amount }}</td>

                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td align="right"><strong>Total Sales</strong></td>
                            <td>
                                <table  width="100%">
                                    <tbody>
                                    <tr>
                                        <td align="left"><strong>{{ $invoice->sell_amount }}</strong></td>
                                        <td align="right"><strong>{{ $invoice->vat_amount }}</strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td align="right"><strong>{{ $invoice->total_sell_amount }}</strong></td>
                        </tr>


                        <tr>
                            <td width="50%" class="title_name"><strong>Less: commission
                                    <span style="float:right">({{ $invoice->outlet_commission_percent }} %)</span></strong></td>
                            <td></td>
                            <td align="right"><strong>{{ $invoice->outlet_commission }}</strong></td>
                        </tr>

                        <tr>
                            <td  colspan="2" align="center"><strong>Net Amount</strong></td>
                            <td align="right"><strong>{{ $invoice->total_sell_amount - ($invoice->outlet_commission + $invoice->total_payment) }}</strong></td>
                        </tr>

                        <tr>
                            <td  colspan="2" align="center"><b>Total Amount Due</b></td>
                            <td align="right"><strong>{{ $invoice->total_sell_amount - ($invoice->outlet_commission + $invoice->total_payment) }}</strong></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
