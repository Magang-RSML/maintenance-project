<?php

namespace App\Services;

class UserLevelService
{
    public function checkUserLevel($user)
    {
        return $user->level ?? 'guest';
    }
}
