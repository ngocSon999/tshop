<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Impl\UserRepoInterface;
use App\Models\User;
use Illuminate\Http\Request;

class UserRepository extends BaseRepository implements UserRepoInterface
{
    public function model(): string
    {
        return User::class;
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

        $search = $request->input('search');
        if (!empty($search['value'])) {
            $val = $search['value'];
            $dataQuery->where(function ($query) use ($val) {
                    $query->orwhere('name', 'like', "%{$val}%");
                    $query->orwhere('email', 'like', "%{$val}%");
                    $query->orwhere('phone', 'like', "%{$val}%");
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
