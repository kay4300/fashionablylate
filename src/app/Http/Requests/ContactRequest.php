<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "last_name" => ["required", "string", "max:8"],
            "first_name" => ["required", "string", "max:8"],
            "gender" => ["required", "in:1,2,3"],
            "email" => ["required", "string", "email"],
            "tel1" => ["required", "string", "max:3"],
            "tel2" => ["required", "string", "max:4"],
            "tel3" => ["required", "string", "max:4"],
            "address" => ["required"],
            "building" => ["nullable", "string", "max:255"],
            "category_id" => ["required", 'exists:categories,id'],
            "detail" => ["required", "string", "max:120"],
            //
        ];
    }
    // 電話番号を１つにまとめる
    public function prepareForValidation()
    {
        $this->merge([
            'tel' => $this->tel1 . $this->tel2 . $this->tel3,
        ]);
    }

    public function messages()
    {
        return [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名を入力してください',
            'gender.required' => '性別を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tel.required' => '電話番号を入力してください。',
            // 'tel1.required' => '電話番号を入力してください',
            // 'tel2.required' => '電話番号を入力してください',
            // 'tel3.required' => '電話番号を入力してください',
            'address.required' => '住所を入力してください',
            'category_id.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせの内容を入力してください',
            'detail.max' => 'お問い合わせ内容は120文字以内で入力してください',
            
        ];
    }
}
