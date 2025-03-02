<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            //UserResource represents a single user
            'user' => new UserResource($this->whenLoaded('user')),
            //attendees is a collection (multiple attendees).
            'attendees' => AttendeeResource::collection(
                $this->whenLoaded('attendees')
            )
        ];
    }
}
