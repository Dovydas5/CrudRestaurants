@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Menus</div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Weight</th>
                                <th>Meat</th>
                                <th>About</th>
                            </tr>
                            @foreach ($menus as $menu)
                                <tr>
                                    <td>{{$menu->title}}</td>
                                    <td>{{$menu->price}} &#8364</td>
                                    <td>{{$menu->weight}} g</td>
                                    <td>{{$menu->meat}} g</td>
                                    <td>{!!$menu->about!!}</td>
                                    <td>
                                        <form method="POST" action="{{route('menu.destroy', [$menu])}}">
                                            <a class="btn btn-success"
                                               href="{{route('menu.edit',[$menu])}}"><i
                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            @csrf
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"
                                                                                            aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
