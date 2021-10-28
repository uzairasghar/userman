<?php

namespace App\Http\Controllers;


use App\Products;
use Illuminate\Http\Request;
use DB;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;
use Validator;

class UsermanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* Authentication Middleware */

    // public function __construct()
    // {
    //     $this->middleware('si');
    // }

    public function index(Request $request)
    {
        //$product = DB::table('products')->simplePaginate(10);
        //$products = Products::orderBy('created_at','desc')->paginate(10);
        // $product = Products::orderby('name','asc')->simplePaginate(1);
        // return view('products.index')->with('product', $product);
        $product = Products::orderBy('name', 'asc');
        if ($request->ajax()) {
            $data = Products::latest()->get();
            return DataTables::of($data)
                // ->addIndexColumn()
                ->addColumn('action', function($data){
                    $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
        return view('products.index')->with('product', $product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'description' => 'required',
        //     'price' => 'required'
        // ]);
        // $product = new Products();
        // $product->name = $request->input('name');
        // $product->description = $request->input('description');
        // $product->price = $request->input('price');
        // $product->save();
        // $product = DB::table('products')->insert([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'price' => $request->price
        // ]);
        // return redirect('/products')->with('success', 'Product Added');

        $rules = array(
            'name'    =>  'required',
            'description'     =>  'required',
            'price'    =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'name'        =>  $request->name,
            'description'        =>  $request->description,
            'price'        =>  $request->price
        );

        Products::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        //$product = Products::find($id);
        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $product = DB::table('products')->where('id', $id)->first();
        //$product = Products::find($id);
        // return view('products.edit')->with('product', $product);

        if(request()->ajax())
        {
            $data = Products::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'description' => 'required',
        //     'price' => 'required',
        // ]);
        // $product = Products::find($id);
        // $product->name = $request->input('name');
        // $product->description = $request->input('description');
        // $product->price = $request->input('price');
        // $product->save();

        // $product = DB::table('products')->where('id', $id)->update([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'price' => $request->price
        // ]);
        // return redirect('/products')->with('success', 'Product Updated');
        $rules = array(
            'name'          => 'required',
            'description'   => 'required',
            'price'         => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'name'          =>  $request->name,
            'description'   =>  $request->description,
            'price'         =>  $request->price,
        );

        Products::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $product = Products::find($id);
        // $product->delete();
        // $product = DB::table('products')->where('id',$id)->delete();
        // return redirect('/products')->with('success', 'Product Removed');
        
        // $data = Products::findOrFail($id);
        // $data->delete();

        $student = Products::find($id);
        if($student)
        {
            $student->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Student Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Student Found.'
            ]);
        }

    }

    public function export()
    {
        return Excel::download(new UsersExport, 'products.xls');
    }
}