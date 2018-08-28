<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Ref_Product_Category;
use App\Ref_Product_Brand;
// use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Helpers\Input_Validator;

class Ref_Product_Brand_Controller extends Controller
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


    public function saveBrand(Request $request)
    {
        $input_validator = new Input_Validator();
        if ($input_validator->validateBrand($request)->fails())
        {
          $request->session()->flash('alert-danger', 'There was a problem adding your Brand!');
          return redirect(route('admin.addBrands'))->withInput()->withErrors($input_validator->validateBrand( $request));

        }
        else{
          $brand= new Ref_Product_Brand();
          $brand->product_brand_name=$request->product_brand_name;
          $brand->product_brand_code =(Ref_Product_Brand::lastBrand()->product_brand_code)+(1);

          if ($brand->save()) {
            $request->session()->flash('alert-success', 'Added Succesfully!');
            return redirect(route('admin.addBrands'));
          }
          // else{
          //   $request->session()->flash('alert-danger', 'There was a problem adding your category!');
          //   return redirect(route('admin.addCategories'))->withInput()->withErrors($input_validator->validateBrand( $request));
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
