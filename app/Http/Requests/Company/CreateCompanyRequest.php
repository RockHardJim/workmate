<?php

namespace App\Http\Requests\Company;

use App\Models\Companies\Company;
use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !auth()->user()->isOnboarded();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_name' => 'required|min:2|max:100',
            'company_size' => 'required',
            'industry' => 'required',
            'description' => 'required|min:2|max:500',
        ];
    }

    public function persist()
    {
        Company::add([
            'user_id' => auth()->id(),
            'name' => $this->get('company_name'),
            'size' => $this->get('company_size'),
            'industry' => $this->get('industry'),
            'description' => $this->get('description'),
        ]);
    }
}
