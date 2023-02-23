@extends('invoice.master')

@section('content')
    <div class="row">
        <div class="col-12 col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header">
                    Create Invoice
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('invoice.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 form-group">
                            <label class="required" for="outlet">{{ trans('crud.invoice.outlet') }}:</label>
                            <select class="form-control select2 {{ $errors->has('outlet') ? 'is-invalid' : '' }}" name="outlet" id="outlet" required>
                                <option value=" ">Select Outlet</option>
                                @foreach($outlet as $entry)
                                    <option value="{{ $entry->id }}" {{ old('outlet') == $entry->id ? 'selected' : '' }}>
                                        {{ "$entry->outlet_name( $entry->outlet_code )" }}
                                    </option>
                                @endforeach
                            </select>

                            @if($errors->has('outlet'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('outlet') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-12 form-group">
                            <label class="required" for="period">{{ trans('crud.invoice.period') }}:</label>
                            <select class="form-control select2 {{ $errors->has('outlet') ? 'is-invalid' : '' }}" name="period" id="period" required>
                                <option value=" ">Select Period</option>
                                @foreach($period as $key => $value)
                                    <option value="{{ $value }}" {{ old('period') == $value ? 'selected' : '' }}>
                                        {{ "$key( $value )" }}
                                    </option>
                                @endforeach
                            </select>

                            @if($errors->has('period'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('period') }}
                                </div>
                            @endif
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
