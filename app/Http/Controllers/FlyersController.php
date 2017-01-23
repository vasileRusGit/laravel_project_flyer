<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlyerRequest;
use Illuminate\Http\Request;
use App\Flyer;
use Intervention\Image\Facades\Image;


class FlyersController extends Controller
{
    protected $baseDir = "images/photos";

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('flyers.create');
    }

    /**
     * @param FlyerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FlyerRequest $request)
    {
        //persist the flyer
//        Flyer::create($request->all());
        // link the flyer to the user
        $flyer = \Auth::user()->publish(
            new Flyer($request->all())
        );

        // flash messages
        flash()->success('Success!', 'Tks for registering on our site@');

        // redirect ot landing page
        return redirect($flyer->zip . '/' . str_replace('-', ' ', $flyer->street));
    }

    /**
     * @param $zip
     * @param $street
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip, $street)->firstOrFail();

        return view('/flyers.show', compact('flyer'));
    }

    public function showAll()
    {
        $flyer = Flyer::get();
//        dd($flyer);

        return view('/flyers.showAll', compact('flyer'));
    }

    /**
     * @param $zip
     * @param $street
     * @param Request $request
     * @return string
     */
    public function addPhoto($zip, $street, Request $request)
    {
        $this->validate($request, array(
            'photo' => 'required|mimes:jpg,jpeg,png,bmp'
        ));

        $file = $request->file('photo');
        $name = time() . $file->getClientOriginalName();
        $file->move($this->baseDir, $name);

//        $thumbnail_path = Image::make($this->baseDir . '/' . $name)->resize(300, 200);

        $flyer = Flyer::locatedAt($zip, $street)->first();

        if ($flyer->user_id !== \Auth::id()) {
            return $this->unauthorized($request);
        }

        $flyer->photos()->create(['name' => $name, 'path' => $this->baseDir . '/' . $name]);

        return 'Done';
    }

    public function unauthorized(Request $request)
    {
        if ($request->ajax()) {
            return response(array('message' => 'No way.'), 403);
        }
        flash('No way.');

        return redirect('/');
    }
}
