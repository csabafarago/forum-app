<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Category;

/**
 * Class CategoryRepository.
 */
class CategoryRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Category::class;
    }

    /**
     * @param array $data
     * @return Category|\Illuminate\Database\Eloquent\Model
     */

    public function create($data)
    {
        $category = new Category();
        $category->created_by = Auth::user()->id;
        $category->updated_by = Auth::user()->id;
        $category->name = $data->name;
        $category->save();

        return $category;
    }
}
