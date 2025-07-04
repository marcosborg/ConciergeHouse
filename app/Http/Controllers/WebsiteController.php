<?php

namespace App\Http\Controllers;

use App\Models\ContentPage;
use Illuminate\Http\Request;
use App\Models\Header;
use App\Models\Service;

class WebsiteController extends Controller
{
    public function home()
    {
        $headers = Header::limit(1)->get();
        return view('website.home', compact('headers'));
    }

    public function contentPage($content_page_id)
    {

        $content_page = ContentPage::find($content_page_id);

        return view('website.content_page', compact('content_page'));
    }

    public function services()
    {

        $services = Service::all();

        return view('website.services', compact('services'));
    }
}
