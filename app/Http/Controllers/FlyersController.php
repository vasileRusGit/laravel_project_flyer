<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlyerRequest;
use Illuminate\Http\Request;
use App\Flyer;

class FlyersController extends Controller
{
    public function create()
    {
//        flash('Hello world', 'This is the message');

        return view('flyers.create');
    }

    public function store(FlyerRequest $request)
    {
        // validate the form
        //persist the flyer
        Flyer::create($request->all());

        // flash messages
        flash()->success('Success!', 'Tks for registering on our site@');

        // redirect ot landing page
        return redirect()->back();
    }
}
