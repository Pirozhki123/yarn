<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            'user_id' => ['required', 'numeric', 'max:2147483647', 'exists:users,id'],
            'machine_id' => ['required', 'numeric', 'max:2147483647', 'exists:machines,id'],
            'report_type' => ['required', 'string', 'max:255'],
            'product_id' => ['required', 'numeric', 'max:2147483647', 'exists:products,id'],
            'size_id' => ['required', 'numeric', 'max:2147483647', 'exists:sizes,id'],
            'symbol_id' => ['required', 'numeric', 'max:2147483647', 'exists:symbols,id'],
            'report' => ['required', 'string', 'max:1000'],
            'equipment_id.*' => ['numeric', 'max:2147483647', 'exists:equipment,id'],
            'quantity.*' => ['required_with:equipment_id', 'numeric', 'max:1000']
        ];
    }
}
