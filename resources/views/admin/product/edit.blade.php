@extends('admin.parent')

@section('content')
    <div class="container">

        {{-- @if (session('success'))
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
        @endif --}}

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Product</h5>
                <form class="row g-3" method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Your Product</label>
                        <input type="text" class="form-control" id="inputNanme4" name="name"
                            value="{{ $product->name }}">
                    </div>
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Image product</label>
                        <input type="file" class="form-control" id="inputNanme4" multiple name="gambar">
                    </div>
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Price</label>
                        <input type="number" class="form-control" id="inputNanme4" name="price" min="0"
                            value="{{ $product->price }}">
                    </div>

                    <div class="col-12">
                        <label class="col-sm-2 col-form-label">Select</label>
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            <option selected value="{{ $product->category->id }}">{{ $product->category->name }}</option>
                            <option selected>Select Category Product</option>
                            @foreach ($category as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <textarea name="description" id="description" cols="30" rows="10">{!! $product->description !!}</textarea>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
