@extends('layouts.backend')
@section('title', 'Product Create')
@section('content')
  <div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
      <div class="flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('backend.home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product Create</li>
          </ol>
        </nav>
        <h1 class="m-0">Product Create</h1>
      </div>
    </div>
  </div>

  <div class="container-fluid page__container">
    <form></form>
    <form action="{{ route('backend.product.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
      </div>
      <div class="row">
        
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4>Product Info</h4>
            </div>
            <div class="card-body">
              <div class=" form-group">
                <label for="">Select Category</label>
                <select name="category_id[]" id="" class="form-control mb-3 select_2" multiple>
                  <option disabled>Select Category</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class=" form-group">
                <label for="">Title</label>
                <input type="text" class="form-control mb-3" name="title" placeholder="Title"
                  value="{{ old('title') }}">
              </div>
              <div class=" form-group">
                <label for="">SKU Code</label>
                <input type="text" class="form-control mb-3" name="sku_code" placeholder="SKU Code"
                  value="{{ old('sku_code') }}">
              </div>
              <div class=" form-group">
                <label for="">Price</label>
                <input type="number" class="form-control mb-3" name="price" placeholder="Price"
                  value="{{ old('price') }}">
              </div>
              <div class=" form-group">
                <label for="">Sale Price</label>
                <input type="number" class="form-control mb-3" name="sale_price" placeholder="Sale Price"
                  value="{{ old('sale_price') }}">
              </div>
              <div class=" form-group">
                <label for="">Select Currency</label>
                <select name="currency" id="" class="form-control mb-3 select_2">
                  <option disabled selected>Select Currency</option>
                  <option value="usd">USD</option>
                  <option value="bdt">BDT</option>
                </select>
              </div>
              <div class=" form-group">
                <label for=""> Product Preview Image</label>
                <input type="file" class="form-control" name="image">
              </div>

            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4>Product Gallery</h4>
            </div>
            <div class="card-body">
              <div class=" form-group">
                <label for=""> Product Gallery Image</label>
                <input type="file" class=" form-control" name="gallery[]" multiple>
              </div>
            </div>
          </div>
          <div class="">
            <button type="submit" class=" btn btn-primary form-control my-lg-5">Add Product <i
                class=" fas fa-plus"></i></button>
          </div>

        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4>Product Descriptions</h4>
            </div>
            <div class="card-body">
              <div class=" form-group">
                <label for="">Short Description</label>
                <textarea name="short_description" class="form-control mb-3" rows="5" placeholder="Short Description">{{ old('short_description') }}</textarea>
              </div>
              <div class=" form-group">
                <label for="">Description</label>
                <textarea name="description" class="form-control mb-3 summernote" placeholder="Description">{{ old('description') }}</textarea>
              </div>
              <div class=" form-group">
                <label for="">Additional Information</label>
                <textarea name="add_info" class="form-control mb-3 summernote" placeholder="Additional Information">{{ old('add_info') }}</textarea>
              </div>

            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection
@section('style')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css">
@endsection
@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>
  <script>
    $(function($) {
      $('.select_2').select2();

      $('.summernote').summernote({
        tabsize: 2,
        height: 150,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    });
  </script>
@endsection
