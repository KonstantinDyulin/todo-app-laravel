<?php

namespace App\Services\TaskCategory;

use App\Models\TaskCategory;

class TaskCategoryService implements ITaskCategoryInterface
{

    public function listTaskCategories()
    {
        $taskCategories = TaskCategory::query();

        return $taskCategories->get();
    }

    public function createTaskCategory()
    {
        // TODO: Implement createTaskCategory() method.
    }

    public function getTaskCategory(int $id)
    {
        // TODO: Implement getTaskCategory() method.
    }

    public function updateTaskCategory(int $id)
    {
        // TODO: Implement updateTaskCategory() method.
    }

    public function deleteTaskCategory(int $id)
    {
        // TODO: Implement deleteTaskCategory() method.
    }
}