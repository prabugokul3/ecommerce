<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    public function index()
    {
        return view('index' );
    }

    public function store(Request $request)
    {
        $request->validate([
            'product' => 'required',
            'seller' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'gst' => 'required',
            'email' => 'required|email|unique:users',
            'address' => 'required',
            'mobilenumber' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'filename' => 'required',
        ]);
        $form = new Form;
        $form->product = $request->input('product');
        $form->seller = $request->input('seller');
        $form->price = $request->input('price');
        $form->quantity = $request->input('quantity');
        $form->gst = $request->input('gst');
        $form->email = $request->input('email');
        $form->address = $request->input('address');
        $form->mobilenumber = $request->input('mobilenumber');

        if ($request->hasfile('filename')) {
            $file = $request->file('filename');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/', $filename);
            $form->filename = $filename;
        }
        $form->save();
        return redirect('retrieve');
    }

    public function show()
    {
        $form = Form::paginate(3);
        return view('retrieve', compact('form'));

    }

    public function edit($id)
    {
        $form = Form::find($id);
        return view('edit',compact('form'));

    }
    public function view($id)
    {
        $form = Form::find($id);
        return view('view',compact('form'));

    }

    public function update(Request $request,$id){

        $form = Form::find($id);
        $form->product = $request->input('product');
        $form->seller = $request->input('seller');
        $form->price = $request->input('price');
        $form->quantity = $request->input('quantity');
        $form->gst = $request->input('gst');
        $form->email = $request->input('email');
        $form->address = $request->input('address');
        $form->mobilenumber = $request->input('mobilenumber');

        if ($request->hasfile('filename')) {
            $destination = 'uploads/'.$form->filename;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('filename');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/', $filename);
            $form->filename = $filename;
        }
        $form->update();
        return redirect('retrieve');
    }
    public function delete($id){
        $form = Form::find($id);
        $form->delete();
        return redirect('retrieve');

    }

    public function select()
    {
        // $form = Form::select('SELECT Product FROM forms');
        // return view('categories', compact('form'));

        $form = DB::select("SELECT Product FROM forms");
        return view('categories',['form'=>$form]);
        
    }
}
