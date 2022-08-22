@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    @section('content')
@if(session('success'))
<p class="alert alert-success">{{ session('success') }}</p>
@endif
<div class="card card-default">
    <div class="card-header">
        <form class="row row-cols-auto g-1">
            <div class="col">
                <input class="form-control" type="text" name="q" value="" placeholder="Search here..." />
            </div>
            <div class="col">
                <button class="btn btn-success">Refresh</button>
            </div>
            <div class="col">
                <a class="btn btn-primary" href="">Add</a>
            </div>
            <div class="col">
                <a class="btn btn-primary" href="">Edit</a>
            </div>
            <div class="col">
                <a class="btn btn-primary" href="">Add</a>
            </div>
        </form>
    </div>
    <div class="card-body p-0 table-responsive">
        <table class="table table-bordered table-striped table-hover mb-0">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Division ID</th>
                    <th>Position ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $no = 1 ?>
            {{-- @foreach( $employee as $customer)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->divId }}</td>
                <td>{{ $customer->posId }}</td>
                <td>
                    <a class="btn btn-sm btn-warning" href="">Edit</a>
                    <form method="POST" action="" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach --}}
        </table>
    </div>
</div>
@endsection
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop