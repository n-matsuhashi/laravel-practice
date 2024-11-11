<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginProcessRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * ログイン処理
     * @param LoginProcessRequest $request
     * @return RedirectResponse
     */
    public function login(LoginProcessRequest $request): RedirectResponse
    {

        $credentials = $request->only('email', 'password');

        // 認証成功時、セッションにemailを保存
        if(User::isCredentialsValid($credentials)){
            $request->session()->regenerate();
            $request->session()->put('user_email', $credentials['email']);
            return redirect()->route('offices.index');
        }

        // 認証失敗時、エラーメッセージを追加してログイン画面にリダイレクト
        return redirect()->route('login')->withErrors([
            'failed' => $request->messages()['login_failed']
        ]);
    }

    /**
     * ログアウト処理
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        // セッションを無効化
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}

