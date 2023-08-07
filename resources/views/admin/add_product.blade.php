<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Add Product </h3>
      <div class="">
        <a class="btn btn-primary" href="{{ url('products') }}">back</a>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
              <form class="forms-sample" method="POST" action="{{ url('products') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category_id" id="category_id" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="alert alert-danger">
                          {{ $message }}
                        </div>
                    @enderror
                  </div>
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title') }}" required>
                  @error('title')
                      <div class="alert alert-danger">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="alert alert-danger">
                          {{ $message }}
                        </div>
                    @enderror
                  </div>
                <div class="form-group">
                  <label for="image">Product Image</label>
                  <input type="file" class="form-control" id="image"  name="image" value="{{ old('image') }}" required>
                  @error('image')
                      <div class="alert alert-danger">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" step="any" class="form-control" id="price" name="price" placeholder="Price" value="{{ old('price') }}" required>
                    @error('price')
                        <div class="alert alert-danger">
                          {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" step="any" class="form-control" id="quantity" name="quantity" placeholder="Quantity" value="{{ old('quantity') }}" required>
                    @error('quantity')
                        <div class="alert alert-danger">
                          {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="discount_price">Discount Price</label>
                    <input type="number" step="any" class="form-control" id="discount_price" name="discount_price" placeholder="Discount price" value="{{ old('discount_price') }}" required>
                    @error('discount_price')
                        <div class="alert alert-danger">
                          {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button class="btn btn-dark">Cancel</button>
              </form>
            </div>
          </div>

      </div>
    </div>
  </div>