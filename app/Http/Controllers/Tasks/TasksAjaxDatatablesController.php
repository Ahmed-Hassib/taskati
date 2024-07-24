<?php

namespace App\Http\Controllers\Tasks;

use App\Enums\TaskStatusEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class TasksAjaxDatatablesController extends Controller
{
    public function getTasks(Request $request)
    {
        //  check the request 
        if ($request->ajax()) {
            // get all current user tasks
            $data = DB::table('tasks')
                ->where('user_id', $request->user()->id)
                ->get();

            return $this->prepareDataIntoDatatables($data);
        }
    }

    public function prepareDataIntoDatatables($data)
    {
        return DataTables::of($data)
            ->addIndexColumn()

            ->addColumn('task_name', function ($task) {
                return Str::wordWrap($task->task_name, '40', '<br>', true);
            })
            ->addColumn('status', function ($task) {
                if ($task->is_done == TaskStatusEnum::Done->value)
                    return '<span class="badge fw-semibold py-1 w-100 bg-light-success text-success"><span class="round-8 bg-success rounded-circle d-inline-block me-1"></span>' . trans('tasks.done') . '</span>';
                return '<span class="badge fw-semibold py-1 w-100 bg-light-warning text-warning"><span class="round-8 bg-warning rounded-circle d-inline-block me-1"></span>' . trans('tasks.processing') . '</span>';
            })
            ->addColumn('action', function ($task) {
                $buttons = '<div class="hstack gap-3">';
                $buttons .= '<a class="btn btn-success btn-sm me-1 mb-1" href="' . route('tasks.edit', [$task->id]) . '"><i class="ti ti-edit fs-4"></i></a>';
                $buttons .= '</div>';

                return $buttons;
            })
            ->rawColumns(['task_name', 'status', 'action'])
            ->make(true);
    }
}
