<?php

namespace App\Http\Controllers;

use App\Models\ShortUrls;
use Illuminate\Http\Request;
use ToneflixCode\Cuttly\Facades\Cuttly;

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
        $response = Cuttly::regular()->shorten($request->url);
        if ($response->status !== 7) {
            return back()->with('error', __('URL shortened failed. Please try again later.'))->withInput();
        }
        $input['url'] = $request->url;
        $input['code'] = pathinfo($response->shortLink)['basename'];
        ShortUrls::create($input);
        return redirect('short-url/generate')
             ->with('success', __('URL shortened successfully!'));
    }
}
