<?php

namespace App\Http\Requests;

use App\Models\Currency;
use App\Models\Lens;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LensRequest extends FormRequest
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
            'colour'=>['required','string'],
            'description'=>['required'],
            'prescription_type'=>['required',Rule::in(Lens::PRESCRIPTION_TYPE)],
            'lens_type'=>['required',Rule::in(Lens::LENS_TYPE)],
            'stock'=>['required','integer','min:1'],
            'prices'=>['required','array','size:'.Currency::query()->count()],
            'prices.*.price'=>['required','numeric','min:0'],
            'prices.*.currency'=>['required','integer','exists:currencies,id'],
        ];
    }
}
