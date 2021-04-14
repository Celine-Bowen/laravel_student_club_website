<?php

namespace App\Http\Requests;

use App\Model\Venue;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class VenueRequest extends FormRequest
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
        'required', 'min:3', Rule::unique((new Venue)->getTable())->ignore($this->route()->venue->id ?? null)
      ],
      'address' => [
        'required', 'min:5'
      ],
      'locality' => [
        'required', 'min:3'
      ],
      'postal' => [
        'required'
      ],
      'region' => [
        'required'
      ],
      'country' => [
        'required'
      ],
      'link' => [
        'required'
      ],
      'map' => [
        'required'
      ]
    ];
  }
}
