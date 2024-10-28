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
        $category_name=array();
        foreach($this->categories as $category){
            array_push($category_name,$category['name']);
                }
        return [
            'id'     => $this->id,
            'name'   => $this->name,
            'price'  => $this->price,
            'amount' => $this->amount,
            'category'=> $category_name
        ];}
    }

