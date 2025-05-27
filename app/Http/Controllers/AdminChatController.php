<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminChatController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('role', 'user')->get();
        $selectedUser = null;

        if ($request->has('user_id')) {
            $selectedUser = User::find($request->user_id);
        }

        return view('admin.chat-list', [
            'users' => $users,
            'selectedUser' => $selectedUser
        ]);
    }
}
