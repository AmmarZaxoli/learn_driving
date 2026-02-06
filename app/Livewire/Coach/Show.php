<?php

namespace App\Livewire\Coach;

use App\Models\coach;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $name;
    public $mobile;
    public $address;
    public $numberid;
    public $datenumberidexpiry;
    public $coachAdd = false;

    // for Edit

    public $isEdit = false;
    public $editId = null;


    public function edit($id)
    {
        $coach = Coach::findOrFail($id);

        $this->editId = $coach->id;
        $this->isEdit = true;
        $this->coachAdd = true;

        $this->name = $coach->name;
        $this->mobile = $coach->mobile;
        $this->numberid = $coach->numberid;
        $this->datenumberidexpiry = $coach->datenumberidexpiry;
        $this->address = $coach->address;
    }


    public function toggleForm()
    {
        $this->coachAdd = ! $this->coachAdd;

        if (! $this->coachAdd) {
            $this->reset([
                'name',
                'mobile',
                'numberid',
                'datenumberidexpiry',
                'address'
            ]);
        }
    }
    protected $rules = [
        'name' => 'required|string|max:255',
        'mobile' => 'nullable|string|max:20',
        'address' => 'nullable|string',
        'numberid' => 'nullable|string|max:100',
        'datenumberidexpiry' => 'nullable|date',
    ];

    public function save()
    {
        $this->validate([
            'name' => 'required|min:2|max:100',
        ]);

        Coach::updateOrCreate(
            ['id' => $this->editId],
            [
                'name' => $this->name,
                'mobile' => $this->mobile,
                'numberid' => $this->numberid,
                'datenumberidexpiry' => $this->datenumberidexpiry,
                'address' => $this->address,
            ]


        );

        flash()
            ->success(
                $this->isEdit
                    ? 'هاتە گوهــریــن'
                    : 'هاتە زێـدەکــرن'
            );

        $this->resetForm();
        $this->coachAdd = false;
        $this->resetPage();
    }
    private function resetForm()
    {
        $this->reset([
            'name',
            'mobile',
            'numberid',
            'datenumberidexpiry',
            'address',
            'isEdit',
            'editId',
        ]);
    }

    protected $listeners = ['deleteCoach'];

    public function deleteCoach($id)
    {

        $coach = Coach::find($id);

        if ($coach) {
            $coach->delete();



            flash()
                ->success('هاتە ژێـــبـرن');
        }
    }


    public function render()
    {
        return view('livewire.coach.show', [
            'coaches' => Coach::paginate(30),
        ]);
    }
}
