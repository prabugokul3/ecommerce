<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Http\Resources\Form as FormResources;
use App\Http\Resources\FormCollection;


class ApiController extends Controller
{
    public function form(Request $request, $id)
    {
        $form = Form::find($id);
        return new FormResources($form);
    }

    public function users(){
        $forms = Form::all();
        return new FormCollection($forms);
    }
}
