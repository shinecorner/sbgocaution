<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Template;
use App\Http\Controllers\Controller;
use App\Http\Resources\TemplateResource;

class TemplateController extends Controller
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
                'sections'
            ]
        ];

        $this->responseHelper($data, $helpers);

        $query = Template::latest();

        if($request->has('filters')) {
            $this->filters($request, $query, ['keyword_search', 'type', 'section']);
        }

        if($request->has('limit')) {
            $templates = $query->paginate($request->limit);
        } else {
            $templates = $query->paginate($request->per_page);
        }
        return TemplateResource::collection($templates)->additional($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'section' => 'required',
            'template_key' => 'required|unique:templates,template_key',
            'template_desc' => 'required'
        ]);
        $template = Template::create($request->all());
        if($template) {
            $message = __('general.template.CREATE_SUCCESS');
        } else {
            $message = __('general.template.CREATE_FAILURE');
        }
        return response()->json([
            "message" => $message,
            "data" => new TemplateResource($template)
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json([
            "data" => new TemplateResource(Template::find($id))
        ]);
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
        $request->validate([
            'name' => 'required',
            'section' => 'required',
            'template_desc' => 'required'
        ]);
        $template = Template::find($id);
        $status = $template->update($request->all());
        if($status) {
            $message = __('general.template.UPDATE_SUCCESS');
        } else {
            $message = __('general.template.UPDATE_FAILURE');
        }
        return response()->json([
            "message" => $message,
            "data" => new TemplateResource($template)
        ], 200);
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
            $fields = ['name', 'template_key'];
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
                } elseif($key == 'type') {
                    $query->where('type', '=', $value);
                } else if($key == 'section') {
                    $query->where('section', '=', $value);
                }
            }
        }
    }

}
