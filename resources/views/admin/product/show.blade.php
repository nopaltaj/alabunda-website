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
                <h5 class="card-title">Create Product</h5>

                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Your Product</label>
                    <input type="text" class="form-control" id="inputNanme4" name="name" value="{{ $product->name }}"
                        readonly>
                </div>
                <div class="col-12">
                    <label for="gambar1" class="form-label">Image</label>
                </div>
                <div class="col-12 ">

                    <img src="{{ asset('storage/products/' . $product->gambar) }}" alt="" width="200">
                </div>
                <div class="col-12 mt-2">
                    <label for="inputNanme4" class="form-label">Price</label>
                    <input type="number" class="form-control" id="inputNanme4" name="price" min="0"
                        value="{{ $product->price }}" readonly>
                </div>

                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Category Product</label>
                    <input type="text" class="form-control" id="inputNanme4" name="price" min="0"
                        value="{{ $product->category->name }}" readonly>
                </div>

                <div class="col-12 mt-2">
                    <textarea name="description" id="description" cols="30" rows="10" readonly>{!! $product->description !!}</textarea>
                </div>

                <div class="text-end">
                    <a href="{{ Route('product.index') }}">
                        <button type="submit" class="btn btn-primary mt-2">Back</button></a>
                </div>

            </div>
        </div>

    </div>
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
