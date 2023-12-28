<?php

namespace App\Http\Controllers;

use App\Models\ShortUrls;
use Illuminate\Http\Request;
use Slvler\Cuttly\Facades\Cuttly;

class ShortUrlsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortUrls = ShortUrls::latest()->get();
   
        return view('short-url', compact('shortUrls'));
    }
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'url' => 'required|url'
        ]);
        $response = Cuttly::edit(['edit' => '', 'short' => $request->url]);
        if (!($response = json_decode($response))) {
            return back()->with('error', __('URL shortened failed. Please try again later.'))->withInput();
        }
        $input['url'] = $request->url;
        $input['code'] = pathinfo($response->url->shortLink)['basename'];
        ShortUrls::create($input);
        return redirect('short-url/generate')
             ->with('success', __('URL shortened successfully!'));
    }
}
