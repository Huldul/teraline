<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use App\Models\Advantage;
use Illuminate\Http\Request;

use App\Models\IndexPage;
use App\Models\IndexSwipper;
use App\Models\Partner;
use App\Models\Question;
use App\Models\IndexPromotion;
use App\Models\Category;
use App\Models\Point;

class PageController extends Controller
{
    public function index(){
        $page = IndexPage::firstOrFail();
        $swippers = IndexSwipper::All();
        $partners = Partner::All();
        $questions = Question::All();
        $promotions = IndexPromotion::All();
        $categories = Category::All();
        
        return view('index', [
            'page'=>$page,
            'swippers'=>$swippers,
            'partners'=>$partners,
            'questions'=>$questions,
            'promotions'=>$promotions,
            'categories'=>$categories,
        ]);
    }
    public function about(){
        
        $page = AboutPage::firstOrFail();
        $points = Point::All();
        $advantages = Advantage::All();
        
        return view("about", [
            "page"=>$page,
            "points"=>$points,
            "advantages"=>$advantages,
        ]);
    }
    public function contacts(){
        
        return view("contacts");
    }
}
