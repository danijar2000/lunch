<?php

namespace App\Exports;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MenuExport implements FromView
{
    private $group;
    private $uik_id;
    private $user_id;

    /**
     * MenuExport constructor.
     */
    public function __construct() {}

    /**
     * @return View
     *
     */
    public function view(): View
    {
        $users = User::with('menu')->has('menu')->get();
        return view('menu.export', [
            'users' => $users,
        ]);
    }
}
