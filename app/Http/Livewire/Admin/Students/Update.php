<?php

namespace App\Http\Livewire\Admin\Students;

use App\Models\students;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $students;

    
    protected $rules = [
        
    ];

    public function mount(Students $Students){
        $this->students = $Students;
        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Students') ]) ]);
        
        $this->students->update([
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.students.update', [
            'students' => $this->students
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Students') ])]);
    }
}
