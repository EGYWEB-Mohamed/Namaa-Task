@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-warning w-100" href="{{ route('blog.index') }}">Back To All Subscribers</a>
                    </div>
                    <div class="card-body">
                        <form id="form" action="{{ route('api.blog.update',$blog->id) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="title">title</label>
                                <input type="text" id="title" class="form-control"
                                       value="{{ old('title',$blog->title) }}" required name="title">

                            </div>
                            <div>
                                <label for="content">Content</label>
                                <textarea type="text" id="content" class="form-control" required
                                          name="content">{{ old('content',$blog->content) }}</textarea>

                            </div>
                            <div>
                                <label for="publish_date">Publish Date</label>
                                <input type="date" id="publish_date" class="form-control"
                                       value="{{ old('publish_date',$blog->publish_date) }}" required
                                       name="publish_date">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div>
                                        <label for="image">Image</label>
                                        <input type="file" accept="image/*" id="image" class="form-control"
                                               name="image">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div>
                                        <label for="image">Old Image</label>
                                        <img id="imagePreview" src="{{ asset($blog->image) }}" class="img-fluid">
                                    </div>
                                </div>
                            </div>

                            <div class="my-3 form-check">
                                <input type="checkbox" class="form-check-input" id="status"
                                       {{ ($blog->status) ? 'checked' : '' }} name="status">
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                            <button class="btn btn-success w-100 mt-2" type="submit">Update</button>
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
                var form_data = new FormData($(this)[0]);

                console.log(form_data);
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: form_data,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        getAlert('success', response.message);
                        $('#imagePreview').attr('src', response.data.image);
                    },
                    error: function (data) {
                        var errors = data.responseJSON.errors;
                        $.each(errors, function (k, v) {
                            getAlert('error', v[0]);
                        })
                        // console.log();

                    }
                });
            })
        });
    </script>
@endpush
