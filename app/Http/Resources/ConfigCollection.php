<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ConfigCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = $this->collection->reduce(function ($configLookup, $config) {
            $configLookup[$config['option']] = $config['value'];
            return $configLookup;
        }, []);
        return ['data' => $data];
    }
}
