<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Edit Category </h3>
      <div class="">
        <a class="btn btn-primary" href="{{ url('view_category') }}">back</a>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
              <form class="forms-sample" method="POST" action="{{ url('category/update/'.$category->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="category_name">Category Name</label>
                  <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name" value="{{ $category->category_name }}" required>
                  @error('category_name')
                      <div class="alert alert-danger">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="category_img">Category Image</label>
                  <input type="file" class="form-control" id="category_img"  name="category_img">
                    <img width="80px" height="80px" src="{{ url($category->category_img) }}" />
                  @error('category_img')
                      <div class="alert alert-danger">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="category_img">Category Status</label><br>
                    <input type="radio" class="form-radio" name="status" value="1" {{ $category->status == 1 ? 'checked' : '' }}/>Active
                    <input type="radio" class="form-radio" name="status" value="0" {{ $category->status == 0 ? 'checked' : '' }}/>Inactive
                    @error('category_img')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary me-2">Add</button>
                <button class="btn btn-dark">Cancel</button>
              </form>
            </div>
          </div>

      </div>
    </div>
  </div>