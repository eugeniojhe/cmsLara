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
    public function index(Request $request)
    {
        $dateInterval = intval($request->input('interval',30)); 
        if ($dateInterval > 120){
            $dateInterval = 120; 
        }
        $dateNowLessInterval = date('Y-m-d H:i:s',strtotime('-'.$dateInterval.'days')); 
        $dateNowLessSome = date('Y-m-d H:i:s',strtotime('-5 minutes'));
        $visitorsTotal = Visitor::where('date_access','>=',$dateNowLessInterval)->count();
        $usersOnSomeDate = Visitor::select('ip')->where('date_access','>=',$dateNowLessSome)->groupBy('ip')->get();
        $usersOnline = count($usersOnSomeDate); 
        $pagesTotal = Page::count();
        $usersRegistered = User::count();
        $pageData = [];
        $visitorsPage = Visitor::selectRaw('page,count(page) as c')
        ->where('date_access','>=',$dateNowLessInterval)
        ->groupBy('page')
        ->get();
        foreach($visitorsPage as $vistorByPage){
            $pageData[$vistorByPage['page']] = intval($visitorByPage['c']); 
        };
        $pageLabels = json_encode(array_keys($pageData));
        $pageValues = json_encode(array_values($pageData)); 

        return view('admin.home',[
            'visitorsTotal' => $visitorsTotal,
            'usersOnline' => $usersOnline,
            'pagesTotal' => $pagesTotal, 
            'usersRegistered' => $usersRegistered,
            'pageLabels' => $pageLabels,
            'pageValues' => $pageValues,
            'dateInterval' => $dateInterval
        ]);
    }
}
