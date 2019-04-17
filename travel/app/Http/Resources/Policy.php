<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Policy extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            getLang('policy_description') => getLang('policy_description', $this),
            getLang('faqs_description') => getLang('faqs_description', $this),
        ];
    }
}
