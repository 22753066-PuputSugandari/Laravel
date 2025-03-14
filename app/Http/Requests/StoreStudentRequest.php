<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|numeric',
            'class' => 'required|integer',
            'address' => 'required|string',
            'gender' => 'required|string',
            'status' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function messages()
{
    return [
        'name.required' => 'Nama wajib diisi.',

        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah digunakan, silakan gunakan email lain.',

        'phone.required' => 'Nomor telepon wajib diisi.',
        'phone.numeric' => 'Nomor telepon harus berupa angka.',

        'class.required' => 'Kelas wajib diisi.',
        'class.integer' => 'Kelas harus berupa angka.',

        'address.required' => 'Alamat wajib diisi.',
        'address.string' => 'Alamat harus berupa teks.',

        'gender.required' => 'Jenis kelamin wajib dipilih.',
        'gender.string' => 'Jenis kelamin harus berupa teks.',

        'status.required' => 'Status wajib dipilih.',
        'status.string' => 'Status harus berupa teks.',

        'image.image' => 'File yang diunggah harus berupa gambar.',
        'image.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif.',
        'image.max' => 'Ukuran gambar maksimal 2MB.',
    ];
}
}
