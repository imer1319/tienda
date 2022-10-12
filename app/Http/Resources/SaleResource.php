<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
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
            'id' => $this->id,
            'client_name' => $this->client->name,
            'user_name' => $this->user->name,
            'sale_type' => $this->sale_type,
            'published_date' => $this->published_date,
            'total' => $this->total,
            'status' => $this->status,
            'products' => ProductResource::collection($this->products),
            'debts' => DebtResource::collection($this->debts)
        ];
    }
}
