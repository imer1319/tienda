<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PedidoResource extends JsonResource
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
            'client_name' => $this->client->name . " " . $this->client->profile->apellido_paterno . " " . $this->client->profile->apellido_materno,
            'sale_type' => $this->sale_type,
            'total' => $this->total,
            'ci' => $this->client->profile->ci,
            'status' => $this->status,
            'items' => count($this->detalles),
            'created_at' => $this->created_at->format('M d Y H:i'),
            'detalle_pedidos' => DetallePedidoResource::collection($this->detalles),
            'deudas' => DebtResource::collection($this->deudas)
        ];
    }
}
