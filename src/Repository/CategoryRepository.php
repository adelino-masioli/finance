<?php
/**
 *  Created by PhpStorm.
 *  User: Junior Ferreira
 *  Project: Sistema Financeiro HotMilhas
 */

declare(strict_types=1);

namespace FinanceHotM\Repository;

use Illuminate\Database\Capsule\Manager;
use FinanceHotM\Models\Category;

class CategoryRepository extends DefaultRepository implements CategoryRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(Category::class);
    }

    public function sumByPeriod(string $dateStart, string $dateEnd, int $userId): array
    {Manager::
        $categories = '';
        $categories = Category::query()
            ->selectRaw('categories.name, sum(value) as value')
            ->leftJoin('pays', 'pays.category_id', '=', 'categories.id')
            ->whereBetween('date_launch', [$dateStart, $dateEnd])
            ->where('categories.user_id', $userId)
            ->whereNotNull('pays.category_id')
            ->groupBy('categories.name')
            ->get();
        return $categories->toArray();
    }
}
