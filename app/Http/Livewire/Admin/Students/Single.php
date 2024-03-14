<?php

namespace App\Http\Livewire\Admin\Students;

use App\Models\students;
use Livewire\Component;

class Single extends Component
{

    public $students;

    public function mount(Students $Students){
        $this->students = $Students;
    }

    public function delete()
    {
        $this->students->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Students') ]) ]);
        $this->emit('studentsDeleted');
    }

    public function render()
    {
        return view('livewire.admin.students.single')
            ->layout('admin::layouts.app');
    }
}
