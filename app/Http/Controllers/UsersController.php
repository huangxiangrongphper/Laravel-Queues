<?php

namespace App\Http\Controllers;

use App\Jobs\SendReminderEmail;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UsersController extends Controller
{
    public function store()
    {
        $users = User::where('id','<',6)->get();

        foreach ($users as  $user) {
            $this->dispatch(new SendReminderEmail($user));
        }

        return 'Done';
    }
}
