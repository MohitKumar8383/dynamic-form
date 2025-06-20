<div class="container">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Custom Form Field</li>
          </ol>
        </nav>
      </div>
    </div>


    <div class="d-flex mb-2 gap-2">
            <a class="btn btn-primary" href="{{route('addcustomformfield')}}">Add</a>
            <a class="btn btn-success" href="{{route('myform')}}">Form View</a>
          </div>
          @if(session('success'))
          <div class="alert alert-success mt-2">
            {{ session('success') }}
          </div>
        @endif
        <table class="table" >
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Label</th>
              <th scope="col">Type</th>
              <th scope="col">Is Required</th>
              <th scope="col">Show In Table</th>
              <th scope="col">Use In Filter</th>
              <th scope="col">Status</th>
              <th scope="col">Created At</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody id="sortable-table">
          @foreach($data['formfields'] as $key => $value)
          <tr data-id="{{ $value->id }}">
            <th scope="row" class="order-column">{{ $key+1 }}</th>
            <td>{{ $value->label }}</td>
            <td>{{ ucwords($value->type) }}</td>
            <td>{{ $value->is_required == '1' ? 'Yes' : 'No' }}</td>
            <td>{{ $value->show_in_table == '1' ? 'Yes' : 'No' }}</td>
            <td>{{ $value->use_in_filter == '1' ? 'Yes' : 'No' }}</td>
            <td>
              @if($value->status == 1)
                            <a title="Click Me" href="javascript:void(0)" data-status="active" data-table="custom_form_fields" data-id="{{$value->id}}" onclick="status_change(this)">
                                <span class="badge bg-success me-1 rounded border border-success">Active</span> 
                                </a>   
                        @else
                            <a title="Click Me" href="javascript:void(0)" data-status="inactive" data-table="custom_form_fields" data-id="{{$value->id}}" onclick="status_change(this)">
                               <span class="badge bg-danger me-1 rounded border border-danger">Inactive</span>
                              </a>   
                        @endif
                       </td>
            <td>{{ date('d-M-Y', strtotime($value->created_at)) }}</td>
            <td>
              <div class="d-flex gap-2">
                <a class="btn btn-primary" href="{{ url('/admin/field-edit/'.$value->id) }}">Edit</a>
                <a class="btn btn-danger" href="{{ url('/admin/field-delete/'.$value->id) }}">Delete</a>
              </div>
            </td>
          </tr>
          @endforeach
          </tbody>
        </table>

  </div>
