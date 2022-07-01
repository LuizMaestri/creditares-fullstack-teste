<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class WebController extends Controller
{
    //
    public function cultivation()
    {
        # code...
        return Inertia::render('Cultivation');
    }

    public function history($id)
    {
        return Inertia::render('History', [
            'id' => $id
        ]);
    }
}
