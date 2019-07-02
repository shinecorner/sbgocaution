<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
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

        $data['permissions'] = $this->permissions;
        $data['count_active_users'] = $this->users()->where('status', 1)->count();
        $data['count_inactive_users'] = $this->users()->where('status', 0)->count();

        return $data;
    }
}
