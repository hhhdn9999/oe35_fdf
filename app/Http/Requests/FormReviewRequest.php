<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormReviewRequest extends FormRequest
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
             'review_comment' => 'required',
             'review_star' => 'required',
         ];
     }
     public function messages()
     {
         return [
             'review_comment.required' => 'Không được để trống đánh giá.',
             'review_star.required' => 'Không được để trống star',
         ];
     }
}
