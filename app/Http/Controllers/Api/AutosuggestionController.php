<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AutosuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [];
        $request->validate([
            'searchword' => 'required',
            'section' => 'required'
        ]);
        if($request->has('searchword')) {
            $keyword = $request->searchword;
            if($request->has('section')) {
                switch($request->section) {
                    case "customers":
                        $query = User::select('id', 'name', 'email')->whereHas("roles", function($query) { 
                            $query->where("id", 6); 
                        })->latest();
                        $this->search($keyword, $query, ['id', 'name', 'email']);
                        $data = $query->get();
                        break;
                }
                return response()->json([
                    'data' => $data
                ]);
            }
        }
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

    private function search($keyword, $query, $fields) 
    {
        $searchWildcard = '%' . $keyword . '%';

        $query->where(function($query) use($searchWildcard, $fields) {
            foreach($fields as $field) {
                $query->orWhere($field, 'LIKE', $searchWildcard);
            }
        });
    }

}
