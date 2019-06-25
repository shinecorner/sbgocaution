<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HouseOwnerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);
        $policies = $this->policies;
        $data['status_class'] = "label-status-" . str_replace("_", "-", renderStatusClass($this->status));
        $data['count_policies'] = $policies->count();
        return $data;
    }
}
