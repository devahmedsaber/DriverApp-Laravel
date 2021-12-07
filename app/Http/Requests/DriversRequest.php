<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriversRequest extends FormRequest
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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:drivers,email,' . $this->id,
            'phone' => 'required',
            'card_id' => 'required|numeric|unique:drivers,card_id,' . $this->id,
            'city' => 'required',
            'transportation_type' => 'required',
            'avatar_image' => 'required_without:id|image|mimes:jpg,jpeg,png',
            'card_image' => 'required_without:id|image|mimes:jpg,jpeg,png',
            'car_image' => 'required_without:id|image|mimes:jpg,jpeg,png',
            'transport_image' => 'required_without:id|image|mimes:jpg,jpeg,png',
        ];
    }
}
