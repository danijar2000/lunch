<?php

namespace App\Http\Controllers;

use App\Exports\MenuExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\{Request, RedirectResponse};
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\{Auth, Validator};
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * @param Menu $menu
     */
    public function order(Menu $menu)
    {
        Auth::user()->menu()->detach();
        Auth::user()->menu()->attach($menu->id);
        return redirect(route('menu'))
            ->with('success', __('Ok'));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export() {
        return Excel::download(
            new MenuExport(),
            config('app.name') . date('_Y-m-d') . '.xlsx'
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('menu.index', ['menus' => Menu::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Menu::create($request->all());

        return redirect(route('menu'))
            ->with('success', __('Ok'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Menu $menu
     * @return View
     */
    public function show(Menu $menu)
    {
        return view('menu.show', ['menu' => $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Menu $menu
     * @return View
     */
    public function edit(Menu $menu)
    {
        return view('menu.edit', ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Menu $menu
     * @return RedirectResponse
     */
    public function update(Request $request, Menu $menu)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $menu->update($request->all());
        return redirect(route('menu'))
            ->with('success', __('Ok'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Menu $menu
     * @return RedirectResponse
     */
    public function destroy(Menu $menu)
    {
        $menu->users()->detach();
        $menu->delete();
        return redirect(route('menu'))
            ->with('success', __('Ok'));
    }
}
