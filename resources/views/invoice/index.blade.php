@extends('invoice.master')

@section('title','invoice')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-2 form-group">
                    <label for="invoice_number">{{ trans('crud.invoice.invoice_number') }}:</label>
                    <input type="text" class="form-control" name="invoice_number" id="invoice_number" value="{{ request()->invoice_number }}" placeholder="{{ trans('crud.invoice.invoice_number') }}">
                </div>

                <div class="col-12 col-md-2 form-group">
                    <label for="outlet">{{ trans('crud.invoice.outlet') }}:</label>
                    <select class="form-control select2" name="outlet" id="outlet" required>
                        <option value="">All</option>
                        @foreach($outlet as $entry)
                            <option value="{{ $entry->id }}" {{ request()->outlet == $entry->id ? 'selected' : '' }}>
                                {{ "$entry->outlet_name( $entry->outlet_code )" }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 col-md-2 form-group">
                    <label for="dealer">{{ trans('crud.invoice.dealer') }}:</label>
                    <select class="form-control select2" name="dealer" id="dealer" required>
                        <option value="">All</option>
                        @foreach($dealer as $value)
                            <option value="{{ $value->id }}" {{ request()->dealer == $value->id ? 'selected' : '' }}>
                                {{ $value->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 col-md-2 form-group">
                    <label for="settlement_status">{{ trans('crud.invoice.settlement_status') }}:</label>
                    <select class="form-control" name="settlement_status" id="settlement_status" required>
                        <option value="">All</option>
                        @foreach(\App\Models\Invoice::SETTLEMENT_STATUS as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 col-md-2 form-group mt-md-4">
                    <button class="btn btn-sm btn-primary" style="margin: 10px 0 0 0" type="button" id="btnFilterSubmitSearch">
                        Search
                    </button>
                </div>
            </div>
        </div>
    </div>

<div class="container">
    <h1>Invoice List</h1>

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('invoice.create') }}">
                Create Invoice
            </a>
        </div>
    </div>

    <table class="table table-bordered data-table">
        <thead>
        <tr>
            <th>{{ trans('crud.invoice.invoice_number') }}</th>
            <th>{{ trans('crud.invoice.period') }}</th>
            <th>{{ trans('crud.invoice.outlet') }}</th>
              <th>{{ trans('crud.invoice.dealer') }}</th>
            <th>{{ trans('crud.invoice.settlement_status') }}</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        </tbody>
    </table>
</div>

@endsection

@section('script')
<script type="text/javascript">
    $(function () {

        let dtOverrideGlobals = {
            processing: true,
            serverSide: true,
            retrieve: true,
            searching: false,
            ajax: /*"{{ route('invoice.index') }}",*/

            {
                url: "{{ route('invoice.index') }}",
                type: 'GET',
                data: function (d) {
                    d.invoice = $('#invoice_number').val();
                    d.outlet = $('#outlet').val();
                    d.dealer = $('#dealer').val();
                    d.settlement_status = $('#settlement_status').val();
                }
            },

            columns: [
                {data: 'invoice_number'},
                {data: 'period'},
                {data: 'outlet'},
                {data: 'dealer'},
                {data: 'settlement_status'},
                {data: 'actions', name: '{{ trans('global.actions') }}'}
            ],
            orderCellsTop: true,
            pageLength: 50,
        };

        let table = $('.data-table').DataTable(dtOverrideGlobals);
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });

        $('#btnFilterSubmitSearch').click(function (e) {
            e.preventDefault();
            $('.table').DataTable().draw(true);
        });
    });
</script>
@endsection
