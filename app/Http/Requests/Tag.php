<?php

namespace App\Http\Requests;

use App\Contracts\TagsRepositoryContract;
use Illuminate\Foundation\Http\FormRequest;

class Tag extends FormRequest
{
    private $tagsRepository;

    public function __construct(TagsRepositoryContract $tagsRepository)
    {
        $this->tagsRepository = $tagsRepository;
    }

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
            //
        ];
    }

    public function allTags()
    {
        $vals = explode(',', $this->tags);
        $a = [];
        foreach($vals as $val) {
            if (!empty(trim($val))) {
                array_push($a, $this->tagsRepository->getTagOrMake($val));
            }
        }
        return collect($a);
    }
}
