<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LectureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user_id' => $this->user_id,
            'livre_id' => $this->livre_id,

            'start' => $this->start,
            'end' => $this->end,
            'pages_read' => $this->pages_read,

            'book' => $this->book,
            'percentage_read' => $this->percentage_read,

            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
