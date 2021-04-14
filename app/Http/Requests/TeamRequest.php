<?php

namespace App\Http\Requests;

use App\Model\Team;
use App\Model\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return auth()->check();
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'user_id' => [
        'required', 'exists:'.(new User())->getTable().',id'
      ],
      'title' => [
        'required', 'min:3', Rule::unique((new Team)->getTable())->ignore($this->route()->team->id ?? null)
      ],
      'description' => [
        'required'
      ],
      'twitter' => [
        'required'
      ],
      'github' => [
        'nullable'
      ],
      'telegram' => [
        'nullable'
      ]
    ];
  }

  /**
   * Get the validation attributes that apply to the request.
   *
   * @return array
   */
  public function attributes()
  {
    return [
      'user_id' => 'user',
    ];
  }
}
