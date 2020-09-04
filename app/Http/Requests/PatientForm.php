<?php

namespace App\Http\Requests;

use App\Patient;
use Illuminate\Foundation\Http\FormRequest;

class PatientForm extends FormRequest
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
            'name' => 'required|max:50|min:3',
            'lastname' => 'required|max:50|min:3',
            'cin' => 'required|numeric',
            'birth' => 'required|date',
            'phone' => 'required',
            'profession' => 'required|max:60|min:5',
            'cnam' => 'required|max:14|min:8',
        ];
    }

    public function persist(Patient $patient)
    {
        $patient->name = $this->name;
        $patient->lastname = $this->lastname;
        $patient->cin = $this->cin;
        $patient->birth = $this->birth;
        $patient->phone = $this->phone;
        $patient->profession = $this->profession;
        $patient->cnam = $this->cnam;
        $patient->save();
    }
}
