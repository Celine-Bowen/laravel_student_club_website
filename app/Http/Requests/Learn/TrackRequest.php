<?php

namespace App\Http\Requests\Learn;

use App\Model\Tag;
use App\Model\Learn\Track;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TrackRequest extends FormRequest
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
      'name' => [
        'required', 'min:3', Rule::unique((new Track())->getTable())->ignore($this->route()->track->id ?? null)
      ],
      'photo' => [
        'nullable', 'image'
      ],
      'tags' => [
        'required'
      ],
      'tags.*' => [
        'exists:'.(new Tag)->getTable().',id'
      ],
      'description' => [
        'required'
      ],
      'source' => [
        'required'
      ],
      'link' => [
        'required'
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
      'photo' => 'picture'
    ];
  }
}
