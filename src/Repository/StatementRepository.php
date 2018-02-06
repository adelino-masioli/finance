<?php
/**
 *  Created by PhpStorm.
 *  User: Junior Ferreira
 *  Project: Sistema Financeiro HotMilhas
 */

declare(strict_types=1);

namespace FinanceHotM\Repository;

use Illuminate\Support\Collection;
use FinanceHotM\Models\Pay;
use FinanceHotM\Models\Receive;

class StatementRepository implements StatementRepositoryInterface
{


    public function all(string $dateStart, string $dateEnd, int $userId): array
    {
        $Pays = Pay::query()
            ->selectRaw('pays.*, categories.name as category_name')
            ->leftJoin('categories', 'categories.id', '=', 'pays.category_id')
            ->whereBetween('date_launch', [$dateStart, $dateEnd])
            ->where('pays.user_id', $userId)
            ->get();

        $billReceives = Receive::query()
            ->whereBetween('date_launch', [$dateStart, $dateEnd])
            ->where('user_id', $userId)
            ->get();

        $collection = new Collection(array_merge_recursive($Pays->toArray(), $billReceives->toArray()));
        $statements = $collection->sortByDesc('date_launch');
        return [
            'statements' => $statements,
            'total_pays' => $Pays->sum('value'),
            'total_receives' => $billReceives->sum('value')
        ];
    }
}
