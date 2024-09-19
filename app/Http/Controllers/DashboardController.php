<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{        
    /**
     * Display the dashboard.
     */
    public function dashboard(Request $request): View
    {
        $articles = $request->user()
            ->articles()
            ->with('user:id,name')
            ->get();
        
        return ViewFacade::make('dashboard', [
            'articles' => $articles,
        ]);
    }
}
