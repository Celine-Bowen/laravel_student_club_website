<?php

namespace App\Http\Requests;

use App\Model\Tag;
use App\Model\Story;
use App\Model\Category;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoryRequest extends FormRequest
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
        'required', 'min:3', Rule::unique((new Story)->getTable())->ignore($this->route()->story->id ?? null)
      ],
      'slug' => [
        'required', 'min:3', Rule::unique((new Story)->getTable())->ignore($this->route()->story->id ?? null)
      ],
      'category_id' => [
        'required', 'exists:'.(new Category)->getTable().',id'
      ],
      'excerpt' => [
        'required'
      ],
      'article' => [
        'required'
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
      'status' => [
        'required', 'in:publish,draft,archive'
      ],
      'published_date' => [
        'required_if:status,publish', 'date_format:d-m-Y'
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
      'category_id' => 'category',
      'photo' => 'picture'
    ];
  }
}
