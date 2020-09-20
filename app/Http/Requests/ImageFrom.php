<?php

namespace App\Http\Requests;

use App\Image;
use Illuminate\Foundation\Http\FormRequest;

class ImageFrom extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description'=>'required',
            'patient_id'=>'required',
        ];
    }
    public function persist(Image $image)
    {
        $$image->path = $this->path;
        $$image->description = $this->description;
        $$image->patient_id = $this->patient_id;
        $image->save();
    }
}
