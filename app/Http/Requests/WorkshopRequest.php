<?php

namespace App\Http\Requests;

use App\Model\Tag;
use App\Model\Venue;
use App\Model\Workshop;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class WorkshopRequest extends FormRequest
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
      'title' => [
        'required', 'min:3', Rule::unique((new Workshop())->getTable())->ignore($this->route()->workshop->id ?? null)
      ],
      'excerpt' => [
        'required'
      ],
      'description' => [
        'required'
      ],
      'image' => [
        'nullable', 'image'
      ],
      'tags' => [
        'required'
      ],
      'tags.*' => [
        'exists:'.(new Tag)->getTable().',id'
      ],
      'venue_id' => [
        'required', 'exists:'.(new Venue)->getTable().',id'
      ],
      'status' => [
        'required', 'in:ongoing,cancelled,postponed,past'
      ],
      'mode' => [
        'required', 'in:online,online_multiple,offline,offline_multiple'
      ],
      'start_date' => [
        'required', 'date_format:Y/m/d H:i:s'
      ],
      'end_date' => [
        'required', 'date_format:Y/m/d H:i:s'
      ],
      'link' => [
        'nullable'
      ],
      'youtube' => [
        'nullable'
      ],
      'slide' => [
        'required_if:youtube,null'
      ],
      'photo' => [
        'nullable'
      ],
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
      'venue_id' => 'venue',
      'image' => 'picture'
    ];
  }
}
