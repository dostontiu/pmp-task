<?php

namespace Modules\Task\DTO;

use Illuminate\Http\Request;

class TaskAssignDTO
{
    public function __construct(
        public int $assigned_user_id,
        public int $project_id,
        public int $user_id,
        public string $name,
        public string $description,
        public int $status,
    ){}

    public static function fromRequest(Request $request)
    {
        return new self(
            $request->assigned_user_id,
            $request->project_id,
            $request->user_id,
            $request->name,
            $request->description,
            $request->status,
        );
    }
}
