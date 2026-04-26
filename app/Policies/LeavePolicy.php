<?php

namespace App\Policies;

use App\Models\Leave;
use App\Models\User;

class LeavePolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }
    public function view(User $user, Leave $record): bool
    {
        return true;
    }
    public function create(User $user): bool
    {
        return true;
    }
    public function update(User $user, Leave $record): bool
    {
        return true;
    }
    public function delete(User $user, Leave $record): bool
    {
        return true;
    }
}