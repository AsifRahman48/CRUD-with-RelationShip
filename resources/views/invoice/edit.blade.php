@extends('invoice.master')

@section('content')

    <div class="row">
        <div class="col-12 col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} Invoice
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('invoice.update', $invoice->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="col-12 form-group">
                            <label class="required" for="invoice">{{ trans('crud.invoice.invoice_number') }}:</label>
                            <input class="form-control" id="invoice" value="{{ $invoice->invoice_number }}" readonly>
                        </div>

                        <div class="col-12 form-group">
                            <label class="required" for="payment_status">{{ trans('crud.invoice.settlement_status') }}:</label>
                            <select class="form-control {{ $errors->has('payment_status') ? 'is-invalid' : '' }}" name="payment_status" id="payment_status" required>
                                @foreach(\App\Models\Invoice::SETTLEMENT_STATUS as $key => $value)
                                    <option value="{{ $key }}" @if((int)$key === (int)$invoice->payment_status) {{ 'selected' }} @endif>{{ $value }}</option>
                                @endforeach
                            </select>

                            @if($errors->has('payment_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_status') }}
                                </div>
                            @endif
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">
                                Save
                            </button>
                        </div>

                        <div class="col-12 col-md-4">
                            <a class="btn btn-success" href="{{ route('invoice.index') }}">
                                Back to List
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
