<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ScoresCreateRequest extends Request
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
        return ['X\'s/10\'s' => 'required|max:3', 'round_id' => 'required', 'score' => 'required|max:4'];
    }
}
