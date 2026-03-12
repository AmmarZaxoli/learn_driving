<?php

namespace App\Livewire\Driver;

use App\Models\coach;
use App\Models\Learntype;
use App\Models\Student;
use App\Models\StudentInfo;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;


class Learntime extends Component
{
    use WithPagination;

    public $id;
    public $coach;
    public $search = '';
    public $learn;
    public $arrayId = [];

    public function saveSelected()
    {
        if (empty($this->arrayId)) {
            flash()->warning('Please select student(s)!');
            return;
        }

        foreach ($this->arrayId as $id) {
            StudentInfo::create([
                'student_id' => $id,
                'absent' => true,
                'date_day' => now(),
            ]);
        }


        $this->arrayId = [];
        flash()->success('Selected students saved!');
    }

    public function mount()
    {
        $this->learn = Learntype::all();
    }
    //////////////////////////
    public function save()
    {
        
    }




    public function render()
    {
        $students = Student::query()
            ->where('learn', 0)
            ->where('status', 0)
            ->where('coach_id', Auth::id())
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('mobile_number', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('name')
            ->paginate(30);

        return view('livewire.driver.learntime', [
            'students' => $students
        ]);
    }
}
