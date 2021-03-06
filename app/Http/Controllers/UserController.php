<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\User;

class UserController extends Controller
{
    /**
     * マイページ内ユーザー情報の編集、更新
     */
    //ユーザー情報の編集
    public function edit()
    {
        $user = User::find(Auth::id());
        return view('profile.user.edit', ['user' => $user]);
    }
    
    //ユーザー情報の更新->マイページ
    public function update(Request $request)
    {
        $user = User::find(Auth::id());
        //validation
        $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255',
                Rule::unique('users')->ignore($user->id)
                ],
            ]);
        $form = $request->all();
        unset($form['_token']);
        $user->fill($form)->save();
        
        return redirect()->route('mypage')->with('status', 'ユーザー情報を更新しました。(Your user profile has been updated.)');
    }
}
