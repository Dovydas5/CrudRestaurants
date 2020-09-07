@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new Restaurant</div>


                    <div class="card-body">
                        <form method="POST" action="{{route('restaurant.store')}}">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="restaurant_title" value="{{old('restaurant_title')}}">
                            </div>
                            <div class="form-group">
                                <label>Max Customers</label>
                                <input type="number" class="form-control" name="restaurant_customers" value="{{old('restaurant_customers')}}">
                            </div>
                            <div class="form-group">
                                <label>Employees</label>
                                <input type="number" class="form-control" name="restaurant_employees" value="{{old('restaurant_employees')}}">
                            </div>
                            <select class="form-control" name="restaurant_menu_id">
                                @foreach ($menus as $menu)
                                    <option value="{{$menu->id}}">{{$menu->title}}</option>
                                @endforeach
                            </select>
                            @csrf
                            <button class="btn btn-primary" type="submit">ADD</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote();
        });
    </script>
@endsection
