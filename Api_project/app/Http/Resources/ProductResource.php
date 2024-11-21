<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /*return parent::toArray($request);*/
       /*another method */
       return [
        'id'=>$this->id,
        'name'=>$this->name,
        'description'=>$this->description,
        'price'=>$this->price,
        'image' => $this->image ? Storage::url($this->image) : null, // Return full URL
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
       ];
       
    }
}
