@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Restaurant</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('restaurant.update',[$restaurant])}}">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="restaurant_title" class="form-control"
                                       value="{{old('restaurant_title',$restaurant->title)}}">
                            </div>
                            <div class="form-group">
                                <label>Max customers</label>
                                <input type="text" name="restaurant_customers" class="form-control"
                                       value="{{old('restaurant_customers',$restaurant->customers)}}">
                            </div>
                            <div class="form-group">
                                <label>Employees</label>
                                <input type="text" name="restaurant_employees" class="form-control"
                                       value="{{old('restaurant_employees',$restaurant->employees)}}">
                            </div>
                            <select class="form-control" name="restaurant_menu_id">
                                @foreach ($menus as $menu)
                                    <option value="{{$menu->id}}"
                                            @if($menu->id == $restaurant->menu_id) selected @endif>{{$menu->title}}</option>
                                @endforeach
                            </select>
                            @csrf
                            <button class="btn btn-primary" type="submit">EDIT</button>
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
