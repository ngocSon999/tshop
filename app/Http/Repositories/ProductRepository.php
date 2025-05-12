<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Impl\ProductRepoInterface;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductRepository extends BaseRepository implements ProductRepoInterface
{
    public function model(): string
    {
        return Product::class;
    }

    public function pagination(Request $request): array
    {
        $sorts = $request->input('order');
        $Columns = $request->input('columns');

        $start = $request->input('start', 1);
        $length = $request->input('length', 10);
        $page = floor($start / $length) + 1;

        $model = $this->model();
        $dataQuery = $model::whereNotNull('id');
        $dataQuery->with('category', 'images');

        $search = $request->input('search');
        if (!empty($search['value'])) {
            $val = $search['value'];
            $dataQuery->where(function ($query) use ($val) {
                $query->orwhere('name', 'like', "%{$val}%");
                $query->orwhere('title', 'like', "%{$val}%");
                $query->orwhere('price', 'like', "%{$val}%");
                $query->orwhere('description', 'like', "%{$val}%");
            });
        }

        if (!empty($sorts)) {
            foreach ($sorts as $orderSort) {
                $orderSortColumn = $orderSort['column'];
                $dir = $orderSort['dir'];
                $field = $Columns[$orderSortColumn]['data'];
                if (!empty($field) && !empty($dir)) {
                    $dataQuery->orderBy($field, $dir);
                }
            }
        }

        $dataPaginate = $dataQuery->paginate($length, '*', 'lists', $page);
        $recordsTotal = $dataPaginate->total();

        return [
            'data' => $dataPaginate->all(),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsTotal
        ];
    }
}
