<?php
 
namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Category;
 
class CategoryComposer
{
    /**
     * Create a new category composer.
     */
    public function __construct() {
        // 
    }
 
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $categories = Category::query()
            ->limit(5)
            ->get();

        $view->with('categories', $categories);
    }
}