<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ref_Product_Category;
// use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Helpers\Input_Validator;

class Ref_Product_Category_Controller extends Controller
{


  public function __construct()
  {
    $this->middleware('auth:admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }



    public function saveCategory(Request $request)
    {
        $input_validator = new Input_Validator();
        if ($input_validator->validateCategory($request)->fails())
        { $request->session()->flash('alert-danger', 'There was a problem adding your category!');
          return redirect(route('admin.addCategories'))->withInput()->withErrors($input_validator->validateCategory( $request));

        }
        else{
          $category= new Ref_Product_Category();
          $category->product_category_description=$request->product_category_description;
          $category->product_category_code =(Ref_Product_Category::lastCategory()->product_category_code)+(1);

          if ($category->save()) {
            $request->session()->flash('alert-success', 'Added Succesfully!');
            return redirect(route('admin.addCategories'));
          }
          // else{
          //   $request->session()->flash('alert-danger', 'There was a problem adding your category!');
          //   return redirect(route('admin.addCategories'))->withInput()->withErrors($input_validator->validateCategory( $request));
          // }

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
