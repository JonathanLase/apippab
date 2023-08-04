<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GlsapResource extends JsonResource
{
    public $code;
    public $status;
    public $message;
    public $resource;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function __construct($code, $status, $message, $resource)
    {
        parent::__construct($resource);
        $this->code = $code;
        $this->status = $status;
        $this->message = $message;
    }

    public function toArray(Request $request): array
    {
        return [
            'code' => $this->code,
            'status' => $this->status,
            'message' => $this->message,
            'data' => $this->resource
        ];
    }
}
