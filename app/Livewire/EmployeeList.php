<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeList extends Component
{

    use WithPagination;

    public $sortField = 'name'; // default sort
    public $sortDirection = 'asc';      // ascending atau descending

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            // kalau klik kolom yang sama, toggle arah sort
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }


    public function render()
    {
        $workers = User::where('role', '!=', 'manager')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(5);
        return view('livewire.employee-list', compact('workers'));
    }
}
