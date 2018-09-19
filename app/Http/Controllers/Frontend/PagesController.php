<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tender;
use App\Models\TenderRequest;
use App\Models\Category;
use App\Models\User;
use Session;
use Auth;

class PagesController extends Controller
{
  public function index()
  {
    $tenders = Tender::orderBy('id', 'DESC')->paginate(2);
    return view('frontend.pages.index', compact('tenders'));
  }


  public function singleTender($slug)
  {
    $tender = Tender::where('slug', $slug)->first();
    $tender->visitor = $tender->visitor + 1;
    $tender->save();
    return view('frontend.pages.singleTender', compact('tender'));
  }


  public function allTenders()
  {
    $categoryTenders = Tender::where('status', 0)->orderBy('id', 'DESC')->paginate(20);
    return view('frontend.pages.allTender', compact('categoryTenders'));
  }


  public function categoryTender($slug)
  {
    $category = Category::where('slug', $slug)->first();
    $categoryTenders = Tender::where('category_id', $category->id)->orderBy('id', 'DESC')->get();
    return view('frontend.pages.categoryTender', compact('categoryTenders'));
  }


  public function applyForTender(Request $request, $slug)
  {
    if(Auth::guard('web')->check()){
      if(Auth::guard('web')->user()->account_role == 'contractor'){
        $tender = Tender::where('slug', $slug)->first();
        $this->validate($request, [
          'message' => 'required',
        ]);

        $tenderRequest = new TenderRequest();
        $tenderRequest->message = $request->message;
        $tenderRequest->user_id = Auth::guard('web')->user()->id;
        $tenderRequest->tender_id = $tender->id;
        $tenderRequest->save();

        session()->flash('success', 'Your request submitted successfully');
        return redirect()->route('user.tender.index');
      }
      else{
        session()->flash('error', 'Please login first as a contractor to request');
        return redirect()->route('user.login');
      }
    }
    else{
      session()->flash('error', 'Please login first to request');
      return redirect()->route('user.login');
    }
  }


  public function placeTender($city)
  {
    $user = User::where('city', $city)->first();
    $categoryTenders = Tender::where('user_id', $user->id)->orderBy('id', 'DESC')->get();
    return view('frontend.pages.categoryTender', compact('categoryTenders'));
  }


  public function organizationTender($organization)
  {
    $user = User::where('organization', $organization)->first();
    $categoryTenders = Tender::where('user_id', $user->id)->orderBy('id', 'DESC')->get();
    return view('frontend.pages.categoryTender', compact('categoryTenders'));
  }
}
