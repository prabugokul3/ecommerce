<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Note;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Validation\Rule;


class FormController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product' => 'required',
            'category' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'gst' => 'required',
            'email' => 'required|email',
            'description' => 'required',
            'mobilenumber' => 'required|digits:10',
            'filename' => 'required',
        ]);
        $form = new Form;
        $form->product = $request->input('product');
        $form->category = $request->input('category');
        $form->price = $request->input('price');
        $form->quantity = $request->input('quantity');
        $form->gst = $request->input('gst');
        $form->email = $request->input('email');
        $form->description = $request->input('description');
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
        return view('edit', compact('form'));
    }
    public function view($id)
    {
        $form = Form::find($id);
        return view('view', compact('form'));
    }

    public function update(Request $request, $id)
    {

        $form = Form::find($id);
        $form->product = $request->input('product');
        $form->category = $request->input('category');
        $form->price = $request->input('price');
        $form->quantity = $request->input('quantity');
        $form->gst = $request->input('gst');
        $form->email = $request->input('email');
        $form->description = $request->input('description');
        $form->mobilenumber = $request->input('mobilenumber');

        if ($request->hasfile('filename')) {
            $destination = 'uploads/' . $form->filename;
            if (File::exists($destination)) {
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
    public function delete($id)
    {
        $form = Form::find($id);
        $form->delete();
        return redirect('retrieve');
    }

    public function select()
    {
        // $form = Form::select('SELECT Product FROM forms');
        // return view('categories', compact('form'));

        $form = DB::select("SELECT Product FROM forms");
        return view('categories', ['form' => $form]);
    }
    public function registration()
    {
        return view('registration');
    }
    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:users,email',
            'password' => 'required|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/',
            'phone_number' => 'required|digits:10',
            'address' => 'required',
        ]);

        $note = new Note();
        $note->name = $request->name;
        $note->email = $request->email;
        $note->phone_number = $request->phone_number;
        $note->address = $request->address;
        $note->password = Hash::make($request->password);
        $request = $note->save();
        if ($request) {
            return back()->with('success', 'you have registered successfully');
        } else {
            return back()->with('fail', 'something wrong');
        }
        $userCount = Note::where('email',$note['email']);
        if($userCount->count()){
            
        }

    }
    public function login()
    {
        return view('login');
    }
    public function loginUser(Request $request)
    {
        $request->validate([

            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12',

        ]);
        $note = Note::where('email', '=', $request->email)->first();

        if ($note) {
            if (Hash::check($request->password, $note->password)) {
                // Session::put('email', $request->email);
                return redirect('retrieve');
            } else {
                return back()->with('fail', 'the password is not matches');
            }
        } else {
            return back()->with('fail', 'the email is not registered');
        }
    }
    public function test(){
        return view('test');
    }


}
