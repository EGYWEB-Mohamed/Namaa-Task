@extends('layouts.front')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        All Blogs
                    </div>
                    <div class="card-body">
                        <div class="row" id="blogs">

                        </div>
                        <button data-nextUrl="" id="showMore" class="btn btn-lg btn-outline-success w-100">Load More
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            $('#showMore').click(function (e) {
                e.preventDefault();
                var page = $(this).attr('nextUrl').split('page=')[1];
                fetchData(page);
            });

            function fetchData(page = 1) {
                $.get("{{ route('api.blog.index') }}?page=" + page, function (data, status) {
                    var items = data.data;
                    for (let item of items) {
                        var html = `<div class="col-3 mb-3"><div class="card"><img class="img-fluid card-img-top" src="${item.image}" alt="Card image cap"><div class="card-body"><h5 class="card-title">${item.title}</h5><p class="card-text">${item.content}</p><a href="${item.url}" class="btn btn-primary">Read More..</a></div></div></div>`;
                        $('#blogs').append(html);
                    }
                    $('#showMore').attr('nextUrl', data.links.next);
                });
            }

            fetchData();
        })
    </script>
@endpush
