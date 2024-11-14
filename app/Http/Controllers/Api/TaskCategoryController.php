<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TaskCategory\ITaskCategoryInterface;
use Illuminate\Http\Request;

class TaskCategoryController extends Controller
{
    public function __construct(
        private readonly ITaskCategoryInterface $taskCategoryInterface,
    ){}

    public function index()
    {

    }

    public function store()
    {

    }

    public function show()
    {

    }

    public function update(Request $request)
    {

    }

    public function destroy()
    {

    }
}
