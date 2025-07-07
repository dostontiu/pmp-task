<?php

namespace Modules\Project\DTO;

use Illuminate\Http\Request;

class ProjectDTO
{
    public function __construct(
        public string $name,
        public string $description,
        public int $user_id,
    ){}

    public static function fromRequest(Request $request)
    {
        return new self(
            $request->name,
            $request->description,
            $request->user_id,
        );
    }
}
