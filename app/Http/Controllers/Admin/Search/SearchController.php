<?php

namespace App\Http\Controllers\Admin\Search;

use App\Http\Requests;
use App\Http\Requests\Search\CreateSearchRequest;
use App\Http\Requests\Search\UpdateSearchRequest;
use App\Repositories\Search\SearchRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;

use Illuminate\Support\Facades\Lang;
use App\Models\Search\Search;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\Document;

use App\Http\Controllers\Controller;
//use App\Models\Datatable;
use App\Models\Employee\Employee;
use Illuminate\Http\Request;

use App\Models\Datatable;

use Yajra\DataTables\DataTables;

//use Yajra\DataTables\DataTables;

class SearchController extends InfyOmBaseController
{
    /** @var  SearchRepository */
    private $searchRepository;

    public function __construct(SearchRepository $searchRepo)
    {
        $this->searchRepository = $searchRepo;
    }

    /**
     * Display a listing of the Search.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $professions=Datatable::pluck('job', 'id');
        $professions['all']='Select All';

        $max_count =Datatable::all()->count();   // We can pass max count for slider
        $max_id =Datatable::pluck('id')->max();
        $min_id =Datatable::pluck('id')->min();
        
        return view('admin.search.searches.search',
             compact('professions', 'max_count', 'max_id', 'min_id'));
    }

    /**
     * Show the form for creating a new Search.
     *
     * @return Response
     */

     

    //  public function sliderData(Request $request)
    //  {
    //      if ($request->idSlider!=null) {
    //          $tables = Datatable::whereBetween('id', $request->idSlider)->get(['id', 'firstname', 'lastname', 'email','job','age']);
    //      } else {
    //          $tables = Datatable::get(['id', 'firstname', 'lastname', 'email', 'job', 'age']);
    //      }
 
    //      return Datatables::of($tables)
    //          ->make(true);
    //  }
 
    //  public function radioData(Request $request)
    //  {
    //      if ($request->ageRadio!=null && $request->ageRadio !='all') {
    //          if ($request->ageRadio < 100) {
    //              $tables = Datatable::where('age', '<=', $request->ageRadio)->get(['id', 'firstname', 'lastname', 'email','job','age']);
    //          } else {
    //              $tables = Datatable::where('age', '>', 50)->get(['id', 'firstname', 'lastname', 'email','job','age']);
    //          }
    //      } else {
    //          $tables = Datatable::get(['id', 'firstname', 'lastname', 'email', 'job', 'age']);
    //      }
 
    //      return Datatables::of($tables)
    //          ->make(true);
    //  }
 
 
 
    //  public function selectData(Request $request)
    //  {
    //      if ($request->professionSelect != null && $request->professionSelect != "all") {
    //          $tables = Datatable::where('id', $request->professionSelect);
    //      } else {
    //          $tables = Datatable::get(['id', 'firstname', 'lastname', 'email', 'job', 'age']);
    //      }
    //      return DataTables::of($tables)
    //          ->make(true);
    //  }


    //  public function buttonData(Request $request)
    //  {
    //      if ($request->jobButton!=null) {
    //          $tables=Datatable::where('gender', $request->jobButton)->get(['id', 'firstname', 'lastname', 'email', 'job', 'age','gender']);
    //      } else {
    //          $tables = Datatable::get(['id', 'firstname', 'lastname', 'email', 'job', 'age','gender']);
    //      }
 
    //      return Datatables::of($tables)
    //          ->make(true);
    //  }
 
     
     public function totalData(Request $request)
     {
        // $d_id = 11;
        // $id = 10;
       


        // $get = Datatable::where(
        //     function($query) use ($d_id,$id){
        //             $if_id = $query->where('id',$d_id);
                    
        //        }
        // )->get();
             
        // $api = file_get_contents("http://hrms.astu.edu.et/api/person/".$id);
        // $json = json_decode($api,true);
        
        // $get['api'] = $json;

        // $get = response()->Json($get);
       
        // $get = json_encode($get,true);
        // $get = json_decode($get,true);
        // $get = $get['original'];
        // $get = $get['api'];
        // $get = $get[0];
        
        //dd($get['fullname']);
       
       
       
    //     //tyring to fetch json content and send data with datatabls
         
    //    // $tables = "'" . $toJson . "'";
         
        //  $tables = Datatable::where(
        //      function ($query) use ($request) {
        //         if ($request->has('idSlider2') && $request->idSlider2!=null) {
        //             $query->whereBetween('id', $request->idSlider2);
        //         }
        //         if ($request->has('ageRadio2') && $request->ageRadio2 != null && $request->ageRadio2 != 'all') {
        //             if ($request->ageRadio2 < 100) {
        //                 $query->where('age', '<=', $request->ageRadio2);
        //             } else {
        //                 $query->where('age', '>', 50);
        //             }
        //              $query->where('age', '<=', $request->ageRadio2);
        //         }
        //         if ($request->has('professionSelect2') && $request->professionSelect2 != null && $request->professionSelect2 != "all") {
        //             $query->where('id', $request->professionSelect2);
        //         }
        //         if ($request->has('jobButton2') && $request->jobButton2 != null) {
        //             $query->where('gender', $request->jobButton2);
        //         }

        //      }
        //  )->join('documents','documents.user_id','=','datatables.id')
        //  ->get(['datatables.id as id','documents.file_name as file_name', 'firstname', 'lastname', 'email','job','age','gender']);
        $person = file_get_contents("http://hrms.astu.edu.et/api/person/" . '10');
        //$person = file_get_contents("https://randomuser.me/api/");
        $purchaser_list= json_decode($person, true);
         //$tables = json_encode($purchaser_list,true);
        //  $table = Datatables::of($purchaser_list)  
        //         ->addIndexColumn()
        //         ->make(true);
         return Datatables::of($purchaser_list)  
                ->addIndexColumn()
                ->make(true);
     }
   }



