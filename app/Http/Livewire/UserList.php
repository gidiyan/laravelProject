<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;


class UserList extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = 10;
    public $sortField = 'id';
    public $sortAsc = true;
    public $selected = [];
    public function render()
    {
        return view('livewire.user-list',[
            'users' => User::search($this->search)
            ->orderBy($this->sortField,$this->sortAsc ? 'asc':'desc')
            ->simplePaginate($this->perPage)
        ]);
    }
}
