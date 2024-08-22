<?php

namespace App\Models;
use App\Traits\Uuids;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use Uuids;
}
