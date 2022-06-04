<?php

namespace App\Http\Requests;

use App\Models\Currency;
use App\Models\Frame;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FrameRequest extends FormRequest
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
            'name'=>['required','string'],
            'description'=>['required'],
            'status'=>['required','integer',Rule::in(Frame::STATUS)],
            'stock'=>['required','integer','min:1'],
            'prices'=>['required','array','size:'.Currency::query()->count()],
            'prices.*.price'=>['required','numeric','min:0'],
            'prices.*.currency'=>['required','integer','exists:currencies,id'],
        ];
    }
}
