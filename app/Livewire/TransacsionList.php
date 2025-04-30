<?php

namespace App\Livewire;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TransacsionList extends Component
{
    use WithPagination;

    public $sortField = 'transaction_date'; // default sort
    public $sortDirection = 'desc';      // ascending atau descending

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
        $query = Transaction::with('user');

        if (Auth::user()->role !== 'manager') {
            $query->where('user_id', Auth::user()->id);
        }

        $transactions = $query
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(5);

        return view('livewire.transacsion-list', compact('transactions'));
    }
}
