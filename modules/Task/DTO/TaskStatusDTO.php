<?php

namespace Modules\Task\DTO;

use Illuminate\Http\Request;

class TaskStatusDTO
{
    public function __construct(
        public int $status,
    ){}

    public static function fromRequest(Request $request)
    {
        return new self(
            $request->status,
        );
    }
}
