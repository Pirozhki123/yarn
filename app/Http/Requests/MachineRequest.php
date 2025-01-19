<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MachineRequest extends FormRequest
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
            'product_id' => ['required', 'numeric', 'max:2147483647', 'exists:products,id'],
            'size_id' => ['required', 'numeric', 'max:2147483647', 'exists:sizes,id'],
            'symbol_id' => ['required', 'numeric', 'max:2147483647', 'exists:symbols,id'],
            'machine_status' => ['required', 'string', 'max:255'],
            'machine_name' => ['required', 'string', 'max:255'],
            'manufacture' => ['required', 'string', 'max:255'],
            'needle_count' => ['required', 'numeric', 'max:500'],
            'needle_type' => ['required', 'string', 'max:255'],
            'lane_number' => ['required', 'numeric', 'max:10'],
            'machine_number' => ['required', 'numeric', 'max:255'],
        ];
    }
}
