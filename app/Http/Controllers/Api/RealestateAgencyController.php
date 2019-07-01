<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RealestateAgency;
use App\Http\Resources\RealestateAgencyResource;

class RealestateAgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [];

        $helpers = [
            'statuses' => [
                'policy',
                'realestateagency'
            ],
            'other' => [
                'realestate_agency_kantons',
                'realestate_agency_cities'
            ]
        ];

        $this->responseHelper($data, $helpers);

        $query = RealestateAgency::latest();

        if($request->has('filters')) {
            $this->filters($request, $query, ['keyword_search', 'status', 'city', 'state', 'language', 'salutation', 'policy_count', 'policy_status']);
        }

        if($request->has('limit')) {
            $realestateagencies = $query->paginate($request->limit);
        } else {
            $realestateagencies = $query->paginate($request->per_page);
        }

        return RealestateAgencyResource::collection($realestateagencies)->additional($data);
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

    private function search($keyword, $query) 
    {
        $searchWildcard = '%' . request()->{'filters.'.$keyword} . '%';

        $query->where(function($query) use($searchWildcard) {
            $fields = ['name', 'email'];
            foreach($fields as $field) {
                $query->orWhere($field, 'LIKE', $searchWildcard);
            }
        });
    }

    private function filters($request, $query, $fields) 
    {
        foreach($request->filters as $key => $value) {
            if($request->has('filters.'.$key) && in_array($key, $fields)) {
                if($key == 'city') {
                    $query->where('city', '=', $value);
                } else if($key == 'state') {
                    $query->where('state', '=', $value);
                } else if($key == 'language') {
                    $query->where('language', '=', $value);
                } else if($key == 'policy_count') {
                    $this->policy_count($query, $value);
                } elseif ($key == 'policy_status') {
                    $query->whereHas('policies', function($query) use ($value) {
                        $query->where('status', '=', $value);
                    });
                } else if($key == 'keyword_search') {
                    $this->search($key, $query);
                } else {
                    $query->where($key, '=', $value);
                }
            }
        }
    }

}
