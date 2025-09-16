<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => [
                'nullable',
                'string',
                'max:20',
                // Must be Saudi format: +966 followed by exactly 9 digits
                'regex:/^\+966\d{9}$/'
            ],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
            'date_of_birth' => 'nullable|date|before:today',
            'gender' => 'nullable|in:male,female,other',
            'address' => 'nullable|string|max:500',
            'city' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'timezone' => 'nullable|string|max:50',
            'language' => 'nullable|string|max:10|in:ar,en',
            'user_type' => 'required|in:customer,provider',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'first_name.required' => 'الاسم الأول مطلوب',
            'last_name.required' => 'اسم العائلة مطلوب',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'يجب أن يكون البر��د الإلكتروني صحيحاً',
            'email.unique' => 'البريد الإلكتروني مستخدم بالفعل',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.confirmed' => 'تأكيد كلمة المرور غير متطابق',
            'password.min' => 'يجب أن تتكون كلمة المرور من 8 أحرف على الأقل',
            'phone.regex' => 'تنسيق رقم الهاتف غير صحيح',
            'date_of_birth.before' => 'تاريخ الميلاد يجب أن يكون في الماضي',
            'gender.in' => 'الجنس يجب أن يكون ذكر، أنثى، أو آخر',
            'user_type.required' => 'نوع المستخدم مطلوب',
            'user_type.in' => 'نوع المستخدم يجب أن يكون عميل أو مقدم خدمة',
            'language.in' => 'اللغة يجب أن تكون العربية أو الإنجليزية',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'first_name' => 'الاسم الأول',
            'last_name' => 'اسم العائلة',
            'email' => 'البريد الإلكتروني',
            'phone' => 'رقم الهاتف',
            'password' => 'كلمة المرور',
            'date_of_birth' => 'تاريخ الميلاد',
            'gender' => 'الجنس',
            'address' => 'العنوان',
            'city' => 'المدينة',
            'country' => 'البلد',
            'timezone' => 'المنطقة الزمنية',
            'language' => 'اللغة',
            'user_type' => 'نوع المستخدم',
        ];
    }
}
