<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PrivateLandlord;
use App\Http\Resources\PrivateLandlordResource;

class PrivateLandlordController extends Controller
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
            'other' => [
                'kantons',
                'cities'
            ]
        ];

        $this->responseHelper($data, $helpers);

        $query = PrivateLandlord::latest();

        if($request->has('filters')) {
            $this->filters($request, $query, ['keyword_search' ,'city_id', 'state_id', 'language_id', 'anrede_id', 'policy_count', 'accepted_policy_count']);
        }

        if($request->has('limit')) {
            $privateLandlords = $query->paginate($request->limit);
        } else {
            $privateLandlords = $query->paginate($request->per_page);
        }

        return PrivateLandlordResource::collection($privateLandlords)->additional($data);
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
            $fields = ['first_name', 'email'];
            foreach($fields as $field) {
                $query->orWhere($field, 'LIKE', $searchWildcard);
            }
        });
    }

    private function filters($request, $query, $fields) 
    {
        foreach($request->filters as $key => $value) {
            if($request->has('filters.'.$key) && in_array($key, $fields)) {
                if($key == 'city_id') {
                    $query->where('city', '=', $value);
                } else if($key == 'state_id') {
                    $query->where('state', '=', $value);
                } else if($key == 'language_id') {
                    $query->where('language', '=', $value);
                } else if($key == 'policy_count') {
                    $this->policy_count($query, $value);
                } elseif ($key == 'accepted_policy_count') {
                    $this->policy_count($query, $value, 1);
                } else if($key == 'duplicate') {
                    $query->where('is_duplicate', '=', 1);
                } else if($key == 'keyword_search') {
                    $this->search($key, $query);
                } else {
                    dd($key);
                    $query->where($key, '=', $value);
                }
            }
        }
    }

    private function policy_count($query, $value, $accepted = 0) {
        if($value == 1) {
            $query->has('policies', '=', 0);
        } else if($value == 2) {
            $query->has('policies', '=', 1);
        } else if($value == 3) {
            $query->has('policies', '=', 2);
        } else if($value == 4) {
            $query->has('policies', '=', 3);
        } else if($value == 5) {
            $query->has('policies', '>=', 4);
        } else if($value == 6) {
            $query->has('policies', '>=', 5);
        } else if($value == 7) {
            $query->has('policies', '>=', 6);
            $query->has('policies', '<=', 10);
        } else if($value == 8) {
            $query->has('policies', '>=', 11);
            $query->has('policies', '<=', 20);
        } else if($value == 9) {
            $query->has('policies', '>=', 20);
        } else if($value == 10) {
            $query->has('policies', '>=', 1);
        } else if($value == 11) {
            $query->has('policies', '>=', 2);
        } else if($value == 12) {
            $query->has('policies', '>=', 3);
        } else if($value == 13) {
            $query->has('policies', '>=', 4);
        } else if($value == 14) {
            $query->has('policies', '>=', 5);
        } else if($value == 15) {
            $query->has('policies', '>=', 6);
        } else if($value == 16) {
            $query->has('policies', '>=', 7);
        } else if($value == 17) {
            $query->has('policies', '>=', 8);
        } else if($value == 18) {
            $query->has('policies', '>=', 9);
        } else if($value == 19) {
            $query->has('policies', '>=', 10);
        }
        if($accepted) {
            $query->whereHas('policies', function($query) {
                $query->where('status', '=', 'accepted');
            });
        }
    }

}
