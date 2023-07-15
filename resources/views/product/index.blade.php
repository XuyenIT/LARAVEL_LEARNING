<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-3">
        <nav class="navbar navbar-expand-sm bg-light navbar-light">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item me-2">
                        <a href="{{ route('category.index') }}" class="btn btn-info">Category</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('product.index') }}" class="btn btn-primary">Product</a>
                    </li>
                </ul>
            </div>
        </nav>
        <h1>product List</h1>
        <a href="{{ route('product.create') }}" class="btn btn-primary">Create product</a>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Success!</strong> {{ session('success') }}
            </div>
        @endif
        <a class="btn btn-primary" href="{{ route('product.index', ['name' => 'name', 'type' => $type === 'asc' ? 'desc' : 'asc']) }}">Name</a>
        <a class="btn btn-info" href="{{ route('product.index', ['name' => 'price', 'type' => $type === 'asc' ? 'desc' : 'asc']) }}">Price</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>CategoryId</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category_id }}</td>
                        <td><a href="{{ route('product.edit', $product->id) }}" 
                            class="btn btn-primary">Edit</a> 
                            <a href="{{route('product.delete',$product->id)}}" 
                                class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
</body>

</html>
