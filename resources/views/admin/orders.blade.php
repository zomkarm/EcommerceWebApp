<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Orders </h3>
      <div class="">
        <a class="btn btn-primary" href="#">Add Order</a>
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
                    <th>Title</th>
                    <th>Created</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @if(count($products) == 0)
                        <tr>
                            <td></td>
                            <td></td>
                            <td>No records found..</td>
                            <td></td>
                        </tr>
                    @endif
                  @foreach ($products as $product)
                    <tr>
                      <td>{{ $product->title}}</td>
                      <td>{{ $product->created_at}}</td>
                      <td>
                        @if($product->status == 1)
                          <label class="badge badge-success">Active</label>
                        @else
                          <label class="badge badge-danger">Inactive</label>
                        @endif
                      </td>
                      <td>
                        <a class="btn btn-primary" href="{{ url('products/edit_product/'.$product->id) }}">Edit</a>
                        <a class="btn btn-danger" href="{{ url('products/delete/'.$product->id) }}">Delete</a>
                      </td>
                    </tr>  
                  @endforeach
                </tbody>
              </table>
            </div>
            <br>
            <div style="color:black;">
              {{ $products->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>