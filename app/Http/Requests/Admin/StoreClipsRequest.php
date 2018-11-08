<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreClipsRequest extends FormRequest
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
            'total_impressions' => 'max:2147483647|nullable|numeric',
            'ad_airing_date_first' => 'nullable|date_format:'.config('app.date_format'),
            'ad_airing_date_last' => 'nullable|date_format:'.config('app.date_format'),
        ];
    }
}
