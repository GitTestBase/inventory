@extends('layouts.admin.main')
@section('title','Product')
@section('body')
@if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
<div class="card">
    <div class="card-body">
        <button type="button" class="btn btn-outline-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">ADD PRODUCTS</button>
    </div>
</div>
<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Add products</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-prod">
                    @csrf
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div>
                                <label for="ProductName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="ProductName" name="ProductName" placeholder="Enter Product yName">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="CategoryName" class="form-label">Select Category</label>
                                <select class="form-select" data-choices="" name="CategoryName" data-choices-sorting="true" id="CategoryName">
                                    <option selected="">Choose...</option>
                                    @foreach($category as $val)
                                        <option value={{$val->id}}>{{$val->cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

    <script>
        $(document).on('submit','#add-prod',function(e)
        {   
            e.preventDefault()
            var formData = $(this).serialize();
            $.ajax({
                url:'{{route("add-prod")}}',
                type:'POST',
                data:formData,
                success:function(data)
                {
                    console.log(data);
                },
            })
        })
    </script>

@endpush
