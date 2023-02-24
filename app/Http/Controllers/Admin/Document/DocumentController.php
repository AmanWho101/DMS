<?php

namespace App\Http\Controllers\Admin\Document;

use App\Http\Requests;
use App\Http\Requests\Document\CreateDocumentRequest;
use App\Http\Requests\Document\UpdateDocumentRequest;
use App\Repositories\Document\DocumentRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Document\Document;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Datatable;
use Illuminate\Http\JsonResponse;
use PHPUnit\Util\Json;
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Yajra\DataTables\Facades\DataTables;

class DocumentController extends InfyOmBaseController
{
    /** @var  DocumentRepository */
    private $documentRepository;

    public function __construct(DocumentRepository $documentRepo)
    {
        $this->documentRepository = $documentRepo;
    }

    /**
     * Display a listing of the Document.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
       
        // $tables = Datatable::where(
        //     function ($query) use ($request) {
        //        if ($request->has('idSlider2') && $request->idSlider2!=null) {
        //            $query->whereBetween('id', $request->idSlider2);
        //        }
        //        if ($request->has('ageRadio2') && $request->ageRadio2 != null && $request->ageRadio2 != 'all') {
        //            if ($request->ageRadio2 < 100) {
        //                $query->where('age', '<=', $request->ageRadio2);
        //            } else {
        //                $query->where('age', '>', 50);
        //            }
        //             $query->where('age', '<=', $request->ageRadio2);
        //        }
        //        if ($request->has('professionSelect2') && $request->professionSelect2 != null && $request->professionSelect2 != "all") {
        //            $query->where('id', $request->professionSelect2);
        //        }
        //        if ($request->has('jobButton2') && $request->jobButton2 != null) {
        //            $query->where('gender', $request->jobButton2);
        //        }

        //     }
        // )->join('documents','documents.user_id','=','datatables.id')
        // ->get(['datatables.id as id','documents.file_name as file_name', 'firstname', 'lastname', 'email','job','age','gender']);
        //      //$tables = $tables[0];
        //      //$tables =   
        $json = file_get_contents("https://randomuser.me/api/");
         $tables = json_encode($json,true);
         //$table = Datatables::of($tables)  
                //->addIndexColumn()
                //->make(true);
            
            
             
             //$table = json_encode($table,true);
        dd($tables);


        $this->documentRepository->pushCriteria(new RequestCriteria($request));
        $documents = $this->documentRepository->all();
        return view('admin.document.documents.index')
            ->with('documents', $documents);
    }

    /**
     * Show the form for creating a new Document.
     *
     * @return Response
     */
    public function create()
    {
        $user_id = Datatable::all();
       
        return view('admin.document.documents.create',compact('user_id'));
    }

    /**
     * Store a newly created Document in storage.
     *
     * @param CreateDocumentRequest $request
     *
     * @return Response
     */
    public function store(CreateDocumentRequest $request)
    {
        $input = $request->all();
       
        $document = $this->documentRepository->create($input);

        Flash::success('Document saved successfully.');

        return redirect(route('admin.document.documents.index'));
    }

    /**
     * Display the specified Document.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $document = $this->documentRepository->findWithoutFail($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('documents.index'));
        }

        return view('admin.document.documents.show')->with('document', $document);
    }

    /**
     * Show the form for editing the specified Document.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $document = $this->documentRepository->findWithoutFail($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('documents.index'));
        }

        return view('admin.document.documents.edit')->with('document', $document);
    }

    /**
     * Update the specified Document in storage.
     *
     * @param  int              $id
     * @param UpdateDocumentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDocumentRequest $request)
    {
        $document = $this->documentRepository->findWithoutFail($id);

        

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('documents.index'));
        }

        $document = $this->documentRepository->update($request->all(), $id);

        Flash::success('Document updated successfully.');

        return redirect(route('admin.document.documents.index'));
    }

    /**
     * Remove the specified Document from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.document.documents.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Document::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.document.documents.index'))->with('success', Lang::get('message.success.delete'));

       }

}
