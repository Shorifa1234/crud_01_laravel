@extends('layouts.app')
@section('main')
    <div class="container">
        <div class="text-right">
            <a href="{{ route('products.create') }}" class="btn btn-dark mt-2">New Products</a>
            <table class="table table-hover mt-2">
                <thead>
                    <tr>
                        <th>Sno.</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td><a href="products/{{ $product->id}}/show" class="text-dark">{{ $product->name }}</a></td>
                        <td>
                            <img src="{{ asset('products/' . $product->image) }}" class="rounded-circle" width="30" height="30" />
                        </td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-dark btn-sm">Edit</a>
                            <form method="POST" action="{{ route('products.destroy', $product->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
</body>

</html>
