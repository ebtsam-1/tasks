<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    public function __construct(private TaskRepository $taskRepository)
    {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('id', false);
        $paginate = $request->get('paginate', false);
        $status = $request->get('status', '*');
        $filters = ['status' => $status];
      
        $records = $this->taskRepository->get($search, $filters, false,$paginate);
        return response()->json(['records' => TaskResource::collection($records)->resource]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $data = $request->validated();
        $record = $this->taskRepository->store($data);
        return response()->json([
            'message' => 'Successfully created',
            'record' => $record
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return response()->json(['record' => TaskResource::make($task)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $data = $request->validated();
        $this->taskRepository->update($task->id,$data);

        return response()->json(['message' => 'Successfully Updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->taskRepository->destroy($task->id);
        return response()->json(['message' => 'Successfully deleted']);
    }
}
