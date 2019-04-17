<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                 => $this->id,
            'name'               => $this->name,
            'username'           => $this->username,
            'facebook_id'        => $this->facebook_id,
            'google_id'          => $this->google_id,
            'gender'             => $this->gender,
            'phone'              => $this->phone,
            'is_verified'        => $this->is_verified,
            'role'               => $this->role,
            'image'              => $this->image,
            'recently_locations' => $this->recently_locations,
            'list_tour_id'       => $this->list_tour_id,
            'wallet'             => $this->wallet,
            'coutry_id'          => $this->coutry_id,
            'parent_id'          => $this->parent_id,
            'facebook_id'        => $this->facebook_id,
            'google_id'          => $this->google_id,
            'remember_token'     => $this->remember_token,
            'user_rank'          => new UserRank($this->userRank),
        ];
    }
}
