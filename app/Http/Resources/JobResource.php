<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'title' => $this->title,
            'description'=>$this->description,
            'category_name'=>$this->getCategory(),
            'category'=>$this->category,
            'email'=>$this->email,
            'company'=>$this->company,
            'address'=>$this->address,
            'website'=>$this->website,
            'created_at' => Carbon::parse($this->created_at)->isoFormat('MMMM Do YYYY, dddd, h:mm a'),
            'updated_at' => Carbon::parse($this->updated_at)->isoFormat('MMMM Do YYYY, dddd, h:mm a'),
        ];
    }
}
