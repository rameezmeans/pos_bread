<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */

    protected $rules =
        [
            'company' => 'required|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|max:100',
            'address' => 'required|max:200',
            'city' => 'required|max:100',
            'state' => 'required|max:100',
            'country' => 'required|max:100'


        ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $type = 'companies';

//       $user = User::findOrFail( Auth::user()->id );
//
//        dd($user->companies);

        $companies = Company::all();

        $company = new Company;

        $columns = app('AppHelper')->getColumnsFromObject($company);

//        dd($columns);

        $title_singular = 'Company';
        $title_plural = 'Companies';










        return view('items.item', [

            'type' => $type,
            'entries' => $companies,
            'columns' => $columns,
            'title_plural' => $title_plural,
            'title_singular' => $title_singular,

        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $type = 'companies';
        $controller = 'Company';

        $company = new Company;

        $columns_and_types = app('AppHelper')->getColumnsFromObject($company)[2];

//        dd($columns_and_types);

        $columns_and_html = app('AppHelper')->getColumnsInputHtml($columns_and_types);

//        dd($columns_html);



        return view('items.create',['type' => $type, 'columns_and_html' => $columns_and_html, 'controller' => $controller]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), $this->rules);


        if ($validator->fails()) {


            $errors = $validator->getMessageBag()->toArray();

            $company = new Company;
            $columns_and_types = app('AppHelper')->getColumnsFromObject($company)[2];
            $columns_and_html = app('AppHelper')->getColumnsInputHtml($columns_and_types);
            $type = 'companies';
            $controller = 'Company';



            return view('items.create',['validation_errors' => $errors,'type' => $type, 'columns_and_html' => $columns_and_html, 'controller' => $controller]);


        }else{

            $data = $request->all();



            unset($data['_token']);

//            dd($data);


            $company = new Company();

            $company->company = $data['company'];
            $company->email = $data['email'];
            $company->phone = $data['phone'];
            $company->phone = $data['phone'];
            $company->address = $data['address'];
            $company->city = $data['city'];
            $company->state = $data['state'];
            $company->country = $data['country'];
            $company->user_id = $data['user_id'];

            $company->save($data);

            return redirect('/companies');


        }






//        dd($request->all());
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
