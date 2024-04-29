@extends('admin.parent')

@section('content')
    <div class="container">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {!! \Session::get('success') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>
                {!! \Session::get('error') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Product</h5>



                <div class="d-flex justify-content-end">
                    <a href="{{ route('product.create') }}" class="btn btn-primary">Create</a>
                </div>

                <!-- Table with stripped rows -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($product as $row)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $row->name }}</td>
                                <td>
                                    <img src="{{ asset('storage/products/' . $row->gambar) }}" alt="p"
                                        width="100">
                                </td>
                                <td>Rp. {{ number_format($row->price) }}</td>
                                <td>{{ $row->category->name }}</td>
                                <td>
                                    <a href="{{ route('product.show', $row->id) }}" class="btn btn-primary">
                                        <i class="bi bi-eye"></i>
                                        Show
                                    </a>
                                    <a href="{{ route('product.edit', $row->id) }}" class="btn btn-warning">
                                        <i class="bi bi-pencil"></i>
                                        edit
                                    </a>

                                    <form action="{{ route('product.destroy', $row->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger m-1" type="submit">
                                            Delete
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center"> Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            
                <!-- End Table with stripped rows -->

            </div>
        </div>
    @endsection
