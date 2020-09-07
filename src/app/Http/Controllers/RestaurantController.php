<?php

namespace App\Http\Controllers;
use App\Menu;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $menus = Menu::all();
        $selectId = 0;
        if ($request->menu_id) {
            $restaurants = Restaurant::where('menu_id', $request->menu_id)->orderBy('title')->get();
            $selectId = $request->menu_id;
        } else {
            $restaurants = Restaurant::orderBy('title')->get();
        }
        return view('restaurant.index', compact('restaurants', 'menus', 'selectId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::orderBy('title', 'desc')->get();
        return view('restaurant.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'restaurant_title' => ['required', 'min:3', 'max:64'],
                'restaurant_customers' => ['required', 'numeric', 'min:2'],
                'restaurant_employees' => ['required']
            ],
            [
                'restaurant_title.min' => 'Title must be at least 3 characters.',
                'restaurant_customers.min' => 'There must be at least 2 customers',
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $restaurant = new Restaurant;
        $restaurant->title = $request->restaurant_title;
        $restaurant->customers = $request->restaurant_customers;
        $restaurant->employees = $request->restaurant_employees;
        $restaurant->menu_id = $request->restaurant_menu_id;
        $restaurant->save();
        return redirect()->route('restaurant.index')->with('success_message', 'Sucessfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('restaurant.show', compact('restaurant'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $menus =Menu::orderBy('title')->get();
        return view('restaurant.edit', compact('restaurant', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $validator = Validator::make($request->all(),
            [
                'restaurant_title' => ['required', 'min:3', 'max:64'],
                'restaurant_customers' => ['required', 'numeric', 'min:2'],
                'restaurant_employees' => ['required']
            ],
            [
                'restaurant_title.min' => 'Title must be at least 3 characters.',
                'restaurant_customers.min' => 'There must be at least 2 customers',
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $restaurant->title = $request->restaurant_title;
        $restaurant->customers = $request->restaurant_customers;
        $restaurant->employees = $request->restaurant_employees;
        $restaurant->menu_id = $request->restaurant_menu_id;
        $restaurant->save();
        return redirect()->route('restaurant.index')->with('success_message', 'Sucessfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {

        $restaurant->delete();
        return redirect()->route('restaurant.index')->with('success_message', 'Sucessfully deleted');
    }
}
