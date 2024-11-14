<?php

namespace App\Services\TaskCategory;

interface ITaskCategoryInterface
{
    public function listTaskCategories();
    public function createTaskCategory();
    public function getTaskCategory(int $id);
    public function updateTaskCategory(int $id);
    public function deleteTaskCategory(int $id);
}