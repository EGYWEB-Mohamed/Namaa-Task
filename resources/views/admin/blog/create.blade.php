@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-warning w-100" href="{{ route('blog.index') }}">Back To All Blogs</a>
                    </div>
                    <div class="card-body">
                        <form id="form" action="{{ route('api.blog.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="title">title</label>
                                <input type="text" id="title" class="form-control" required name="title">

                            </div>
                            <div>
                                <label for="content">Content</label>
                                <textarea type="text" id="content" class="form-control" required name="content"></textarea>

                            </div>
                            <div>
                                <label for="publish_date">Publish Date</label>
                                <input type="date" id="publish_date" class="form-control" required name="publish_date">
                            </div>
                            <div>
                                <label for="image">Image</label>
                                <input type="file" accept="image/*" id="image" class="form-control" required name="image">
                            </div>
                            <div class="my-3 form-check">
                                <input type="checkbox" class="form-check-input" id="status" name="status">
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                            <button class="btn btn-success w-100 mt-2" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            $('form').on('submit', function (e) {
                e.preventDefault();
                var form_data = new FormData($('#form')[0]);

                $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        getAlert('success',response.message);
                        document.getElementById("form").reset();
                    },
                    error: function (data){
                        var errors = data.responseJSON.errors;
                        $.each(errors,function (k,v){
                            getAlert('error',v[0]);
                        })
                        // console.log();

                    }
                });
            })
        });
    </script>
@endpush
