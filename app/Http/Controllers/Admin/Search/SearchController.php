<?php

namespace App\Http\Controllers\Admin\Search;

use App\Http\Requests;
use App\Http\Requests\Search\CreateSearchRequest;
use App\Http\Requests\Search\UpdateSearchRequest;
use App\Repositories\Search\SearchRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Search\Search;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

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

        $this->searchRepository->pushCriteria(new RequestCriteria($request));
        $searches = $this->searchRepository->all();
        return view('admin.search.searches.index')
            ->with('searches', $searches);
    }

    /**
     * Show the form for creating a new Search.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.search.searches.create');
    }

    /**
     * Store a newly created Search in storage.
     *
     * @param CreateSearchRequest $request
     *
     * @return Response
     */
    public function store(CreateSearchRequest $request)
    {
        $input = $request->all();

        $search = $this->searchRepository->create($input);

        Flash::success('Search saved successfully.');

        return redirect(route('admin.search.searches.index'));
    }

    /**
     * Display the specified Search.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $search = $this->searchRepository->findWithoutFail($id);

        if (empty($search)) {
            Flash::error('Search not found');

            return redirect(route('searches.index'));
        }

        return view('admin.search.searches.show')->with('search', $search);
    }

    /**
     * Show the form for editing the specified Search.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $search = $this->searchRepository->findWithoutFail($id);

        if (empty($search)) {
            Flash::error('Search not found');

            return redirect(route('searches.index'));
        }

        return view('admin.search.searches.edit')->with('search', $search);
    }

    /**
     * Update the specified Search in storage.
     *
     * @param  int              $id
     * @param UpdateSearchRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSearchRequest $request)
    {
        $search = $this->searchRepository->findWithoutFail($id);

        

        if (empty($search)) {
            Flash::error('Search not found');

            return redirect(route('searches.index'));
        }

        $search = $this->searchRepository->update($request->all(), $id);

        Flash::success('Search updated successfully.');

        return redirect(route('admin.search.searches.index'));
    }

    /**
     * Remove the specified Search from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.search.searches.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Search::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.search.searches.index'))->with('success', Lang::get('message.success.delete'));

       }

}
