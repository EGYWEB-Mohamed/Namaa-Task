@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-success w-100" href="{{ route('subscriber.create') }}">Create New Subscriber</a>
                    </div>
                    <div class="card-body">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script>
        function deleteRow(url) {
            if (confirm("Confirm Delete ?") == true) {
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    success: function (response) {
                        getAlert('success',response.message);
                        window.LaravelDataTables["subscriber-table"].ajax.reload();
                    },
                    error: function (data){
                        var errors = data.responseJSON.errors;
                        $.each(errors,function (k,v){
                            getAlert('error',v[0]);
                        })
                    }
                });
            }
        }
    </script>
@endpush
