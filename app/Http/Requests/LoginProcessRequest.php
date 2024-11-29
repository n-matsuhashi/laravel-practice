<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginProcessRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string',
        ];
    }

    /**
     * カスタム属性名
     * @return array<string, string>
     */
    public function attributes():array
    {
        return [
            'email' => 'メールアドレス',
            'password' => 'パスワード',
        ];
    }

    /**
     * バリデーションエラーメッセージ
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.required' => ':attributeは必須です。',
            'email.string' => ':attributeは文字列で入力してください。',
            'email.email' => ':attributeはメールアドレス形式で入力してください。',
            'password.required' => ':attributeは必須です。',
            'password.string' => ':attributeは文字列で入力してください。',
            'email.exists' => '入力された:attributeは登録されていません。',
            'login_failed' => 'メールアドレスまたはパスワードが間違っています',
        ];
    }
}
