<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Faq;
use App\Models\Admin\Category;

class FaqController extends Controller
{
   
    public function index()
    {
        $faqs=Faq::all();
        return view('admin.faqs.index',compact('faqs'));
    }

    public function create()
    {
        $categories=Category::all();
        return view('admin.faqs.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required',
            
        ]);
        $faqs=new Faq();
        $faqs->category_id=$request->category_name;
        $faqs->question=$request->question;
        $faqs->answer=$request->answer;
        $faqs->status=$request->status;
        $faqs->save();
        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        return redirect()->route('faq.index')->with($notification);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $faq=Faq::with('category')->findOrFail($id);
        return view('admin.faqs.edit',compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required',
            
        ]);
        $faq=Faq::findOrFail($id);
        $faqs->category_id=$request->category_name;
        $faq->question=$request->question;
        $faq->answer=$request->answer;
        $faq->status=$request->status;
        $faq->save();
        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        return redirect()->route('faq.index')->with($notification);
    }

 
    public function destroy($id)
    {
        $faq=Faq::findOrFail($id);
        $faq->delete();
        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        return redirect()->route('faq.index')->with($notification);
    }
}
