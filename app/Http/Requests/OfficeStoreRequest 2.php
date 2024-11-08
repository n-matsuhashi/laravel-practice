<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfficeStoreRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'address' => 'required|string|unique:offices|max:255',
            'post_code' => 'required|string|size:7',
            'stair' => 'required|int',
            'comment' => 'required|string|max:255',
        ];
    }

    /**
     * カスタム属性名
     * @return array<string, string>
     */
    public function attributes():array
    {
        return [
            'name' => '施設名',
            'address' => '住所',
            'post_code' => '郵便番号',
            'stair' => '階数',
            'comment' => '備考',
        ];
    }

    /**
     * バリデーションエラーメッセージ
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => ':attributeは必須です',
            'name.string' => ':attributeは文字列を入力してください',
            'name.max' => ':attributeは:max文字以内で入力してください',
            'address.required' => ':attributeは必須です',
            'address.string' => ':attributeは文字列を入力してください',
            'address.max' => ':attributeは:max文字以内で入力してください',
            'address.unique' => 'この:attributeは既に登録されています',
            'post_code.required' => ':attributeは必須です',
            'post_code.integer' => ':attributeは数字で入力してください',
            'post_code.size' => ':attributeは:size桁で入力してください',
            'stair.required' => ':attributeは必須です',
            'stair.integer' => ':attributeは数字で入力してください',
            'comment.required' => ':attributeは必須です',
            'comment.string' => ':attributeは文字列を入力してください',
            'comment.max' => ':attributeは:max文字以内で入力してください',
        ];
    }

}
