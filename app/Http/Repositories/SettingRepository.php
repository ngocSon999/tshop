<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Impl\SettingRepoInterface;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SettingRepository extends BaseRepository implements SettingRepoInterface
{
    public function model(): string
    {
        return Setting::class;
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
                $query->orwhere('key', 'like', "%{$val}%");
                $query->orwhere('value', 'like', "%{$val}%");
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

    public function update($data, $id): ?Model
    {
        $setting = $this->model()::find($id);
        if ($setting) {
            $setting->update($data);
            return $setting;
        }

        return null;
    }
}
