<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
<div class="card">
    <div class="card-body">
        <div class="row justify-content-md-center">
            <div class="col-12 col-md-2 form-group">
                <label for="category_id">Category:</label>
                <select class="form-control" name="category" id="category">
                    <option value=""> Select category</option>
                    @foreach($category as $entry)
                        <option value="{{ $entry->id }}" {{ old('category_id') == $entry->id ? 'selected' : '' }}>
                            {{ "$entry->name" }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 col-md-2 form-group">
                <label for="product_id">Product:</label>
                <select class="form-control" name="products" id="products">
                    <option value=""> Select product</option>
                    @foreach($product as $entry)
                        <option value="{{ $entry->id }}" {{ old('product_id') == $entry->id ? 'selected' : '' }}>
                            {{ "$entry->name" }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 col-md-2 form-group mt-md-4">
                <button class="btn btn-sm btn-primary" style="margin: 10px 0 0 0" type="button"
                        id="btnFilterSubmitSearch">Search
                </button>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h1>Category List</h1>

    <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('categories.create') }}">
                    Add Category
                </a>
            </div>
        </div>

    <table class="table table-bordered data-table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Product</th>
            <th>Count</th>
            <th>Price</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        </tbody>
    </table>
</div>

</body>

<script type="text/javascript">
    $(function () {

        let dtOverrideGlobals = {
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('categories.index') }}",
                type: 'GET',
                data: function (d) {
                    d.category = $('#category').val();
                    d.products = $('#products').val();
                }
            },
            columns: [
                {data: 'id'},
                {data: 'Category'},
                {data: 'product'},
                {data: 'count'},
                {data: 'price'},
                {data: 'image'},
                {data: 'actions', name: '{{ trans('global.actions') }}'}
            ]
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
</html>
