<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HouseOwner;
use App\Http\Resources\HouseOwnerResource;

class HouseOwnerController extends Controller
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
                'houseowner'
            ],
            'other' => [
                'houseowner_cities',
                'houseowner_realestate_agencies'
            ]
        ];

        $this->responseHelper($data, $helpers);

        $query = HouseOwner::latest();

        if($request->has('filters')) {
            $this->filters($request, $query, ['keyword_search', 'city', 'realestate_agency', 'policy_count']);
        }

        if($request->has('limit')) {
            $houseOwners = $query->paginate($request->limit);
        } else {
            $houseOwners = $query->paginate($request->per_page);
        }

        return HouseOwnerResource::collection($houseOwners)->additional($data);
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
        $houseOwner = HouseOwner::find($id);
        return response()->json([
            "data" => new HouseOwnerResource($houseOwner)
        ], 200);
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
            $fields = ['name', 'city', 'address'];
            foreach($fields as $field) {
                $query->orWhere($field, 'LIKE', $searchWildcard);
            }
        });
    }

    private function filters($request, $query, $fields) 
    {
        foreach($request->filters as $key => $value) {
            if($request->has('filters.'.$key) && in_array($key, $fields)) {
                if($key == 'keyword_search') {
                    $this->search($key, $query);
                } elseif($key == 'city') {
                    $query->where('city', '=', $value);
                } else if($key == 'realestate_agency') {
                    $query->where('realestate_agency_id', '=', $value);
                } else if($key == 'policy_count') {
                    $this->policy_count($query, $value);
                }
            }
        }
    }

}
