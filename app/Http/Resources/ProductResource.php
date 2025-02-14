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
        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'price' => $this->price,
            'off' => $this->off,
            'category' => new CategoryResource($this->category),
            'images' => [
                $this->image1, $this->image2, $this->image3, $this->image4
            ],
            'instock' => $this->instock
        ];
    }
}
