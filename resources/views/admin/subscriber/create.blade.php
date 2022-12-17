@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-warning w-100" href="{{ route('subscriber.index') }}">Back To All Subscribers</a>
                    </div>
                    <div class="card-body">
                        <form id="form" action="{{ route('api.subscriber.store') }}" method="post">
                            @csrf
                            <div>
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" name="name" required>

                            </div>
                            <div>
                                <label for="username">Username</label>
                                <input type="text" id="username" class="form-control" name="username" required>

                            </div>
                            <div>
                                <label for="Password">Password</label>
                                <input type="password" id="Password" class="form-control" name="password" required>
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
                $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
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
