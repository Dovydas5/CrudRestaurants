<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::orderBy('price')->get();
        return view('menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'menu_title' => ['required', 'min:3', 'max:64'],
                'menu_price' => ['required', 'numeric'],
                'menu_weight' => ['required', 'numeric'],
                'menu_meat' => ['required', 'lte:menu_weight','numeric'],
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $menu = new Menu;
        $menu->title = $request->menu_title;
        $menu->price = $request->menu_price;
        $menu->weight = $request->menu_weight;
        $menu->meat = $request->menu_meat;
        $menu->about = $request->menu_about;
        $menu->save();
        return redirect()->route('menu.index')->with('success_message', 'Successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $validator = Validator::make($request->all(),
            [
                'menu_title' => ['required', 'min:3', 'max:64'],
                'menu_price' => ['required', 'numeric'],
                'menu_weight' => ['required', 'numeric'],
                'menu_meat' => ['required', 'lte:menu_weight','numeric'],
            ],
            [
                'title.min' => 'Pavadinimą turi sudaryti bent trys simboliai.',
                'title.required' => 'Įveskite pavadinimą.',
                'price.required' => 'Įveskite kainą.',
                'weight.required' => 'Įveskite porcijos svorį.',
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $menu->title = $request->menu_title;
        $menu->price = $request->menu_price;
        $menu->weight = $request->menu_weight;
        $menu->meat = $request->menu_meat;
        $menu->about = $request->menu_about;
        $menu->save();
        return redirect()->route('menu.index')->with('success_message', 'Successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if ($menu->getRestaurant->count()) {
            return redirect()->route('menu.index')->with('info_message', 'Can\'t delete! Restaurant has this dish');
        }

        $menu->delete();
        return redirect()->route('menu.index')->with('success_message', 'Successfully deleted');
    }
}
