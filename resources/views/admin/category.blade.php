<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Category </h3>
      <div class="">
        <a class="btn btn-primary" href="category/add_category">Add Category</a>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Category Name</th>
                    <th>Created</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)
                    <tr>
                      <td>{{ $category->category_name}}</td>
                      <td>{{ $category->created_at}}</td>
                      <td>
                        @if($category->status == 1)
                          <label class="badge badge-success">Active</label>
                        @else
                          <label class="badge badge-danger">Inactive</label>
                        @endif
                      </td>
                      <td>
                        <a class="btn btn-primary" href="{{ url('category/edit_category/'.$category->id) }}">Edit</a>
                        <a class="btn btn-danger" href="{{ url('category/delete/'.$category->id) }}">Delete</a>
                      </td>
                    </tr>  
                  @endforeach
                </tbody>
              </table>
            </div>
            <br>
            <div style="color:black;">
              {{ $categories->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>