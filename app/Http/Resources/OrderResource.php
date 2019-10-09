<?php

namespace App\Http\Resources;

use App\Product;
use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $status = $this->getStatus($this->status);
        return [
            'id'           => $this->id,
            'order_number' => $this->order_number,
            'user'         => new UserResource(User::find($this->user->id)),
            'product'      => new ProductResource(Product::find($this->product->id)),
            'quantity'     => $this->quantity,
            'status'       => $status
        ];
    }

    /**
     * Mengubah data status
     *
     * 0 - CANCEL
     * 1 - PROSES
     * 2 - ONGOING
     * 3 - DELIVERY
     * 4 - COMPLETE
     *
     * @param   $status
     */
    protected function getStatus($status)
    {
        switch ($status) {
            case 0:
                $status = 'CANCEL';
                break;

            case 1:
                $status = 'PROSES';
                break;

            case 2:
                $status = 'ONGOING';
                break;

            case 3:
                $status = 'DELIVERY';
                break;

            case 4:
                $status = 'COMPLETE';
                break;

            default:
                $status = null;
                break;
        }

        return $status;
    }
}
