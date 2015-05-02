<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

    public function about()
    {
        $first = 'Misagh';
        $last = 'Laghaee';
        $people = ['P1', 'P2', 'P3'];

        return view('pages.about', compact('first', 'last', 'people'));
	}

}
