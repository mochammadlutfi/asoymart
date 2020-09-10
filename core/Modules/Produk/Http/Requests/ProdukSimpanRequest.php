<?php

namespace Modules\Produk\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukSimpanRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => 'required',
            'deskripsi' => 'required|min:10|max:3000|string',
            'kategori' => 'required',
            'harga' => 'required',
            'harga' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.unique' => 'title must be a unique.',
            'description.min'  => 'description minimum length bla bla bla'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
