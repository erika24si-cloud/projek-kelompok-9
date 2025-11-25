<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($slug)
    {
        // sanitize slug
        $slug = str_replace('/', '.', trim($slug, '/'));
        $view = 'pages.' . $slug;
        if (view()->exists($view)) {
            return view($view);
        }
        abort(404);
    }
}
