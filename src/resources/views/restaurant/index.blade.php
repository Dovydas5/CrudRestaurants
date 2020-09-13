@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form class="my-2" action="{{route('restaurant.index')}}" method="GET">
                    <div class="input-group">
                        <select class="form-control mr-2" name="menu_id">
                            <option value="0">Choose a dish</option>
                            @foreach ($menus as $menu)
                                <option value="{{$menu->id}}"
                                        @if($selectId == $menu->id) selected @endif>{{$menu->title}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-secondary mr-1">Show</button>
                        <a href="{{route('restaurant.index')}}" class="btn btn-secondary">All</a>
                    </div>
                </form>
                @if (count($restaurants))
                    <div class="card">
                        <div class="card-header">All Restaurants</div>
                        <div class="card-body">
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>Title</th>
                                        <th>Max customers</th>
                                        <th>Employees</th>
                                        <th>Dish</th>
                                        <th>Actions</th>
                                    </tr>
                                    @foreach ($restaurants as $restaurant)
                                        <tr>
                                            <td>{{$restaurant->title}}</td>
                                            <td>{{$restaurant->customers}}</td>
                                            <td>{{$restaurant->employees}}</td>
                                            <td>{{$restaurant->getMenu->title}}</td>
                                            <td>

                                                <form method="POST"
                                                      action="{{route('restaurant.destroy', [$restaurant])}}">
                                                    <a class="btn btn-info" role="button"
                                                       href="{{route('restaurant.createPDF', [$restaurant])}}"><i
                                                            class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="btn btn-primary" role="button"
                                                       href="{{route('restaurant.show', [$restaurant])}}"><i
                                                            class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="btn btn-success" role="button"
                                                       href="{{route('restaurant.edit',[$restaurant])}}"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </a>
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"
                                                                                                    aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                @else
                                    <div class="card">
                                        <div class="p-4">Didin't find any restaurant with that dish</div>
                                    </div>
                                @endif
                            </div>
                            <br>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
