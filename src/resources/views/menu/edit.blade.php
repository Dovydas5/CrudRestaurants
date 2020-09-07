@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Authors</div>


                    <div class="card-body">
                        <form method="POST" action="{{route('menu.update',[$menu->id])}}">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="menu_title" value="{{old('menu_title', $menu->title)}}">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control" step="0.10" name="menu_price" value="{{old('menu_price', $menu->price)}}">
                            </div>
                            <div class="form-group">
                                <label>Wieght</label>
                                <input type="number" class="form-control" name="menu_weight" value="{{old('menu_weight', $menu->weight)}}">
                            </div>
                            <div class="form-group">
                                <label>Meat</label>
                                <input type="number" class="form-control" name="menu_meat" value="{{old('menu_meat', $menu->meat)}}">
                            </div>
                            <textarea name="menu_about" id="summernote">{{$menu->about}}</textarea>

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
