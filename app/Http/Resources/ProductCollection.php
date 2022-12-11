<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    public static $wrap = '';

    /**
     * @param $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\Illuminate\Support\Collection|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection;
    }
}
