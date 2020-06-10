<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Visitor; 
use App\Page;
use App\User;   

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dateLimit = date('Y-m-d H:i:s',strtotime('-5 minutes'));
        $visitorsTotal = Visitor::count();
        $usersOnSomeDate = Visitor::select('ip')->where('date_access','>=',$dateLimit)->groupBy('ip')->get();
        $usersOnline = count($usersOnSomeDate); 
        $pagesTotal = Page::count();
        $usersRegistered = User::count(); 

        return view('admin.home',[
            'visitorsTotal' => $visitorsTotal,
            'usersOnline' => $usersOnline,
            'pagesTotal' => $pagesTotal, 
            'usersRegistered' => $usersRegistered
        ]);
    }
}
