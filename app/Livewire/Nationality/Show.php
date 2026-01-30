<?php

namespace App\Livewire\Nationality;

use App\Models\Nationality;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $Nationalityadd = false;
    public $nationality;
    public $editId = null;
    public $isEdit = false;

    public function toggleForm()
    {
        $this->Nationalityadd = ! $this->Nationalityadd;

        if (! $this->Nationalityadd) {
            $this->reset('nationality');
        }
    }




    public function save()
    {
        $this->validate([
            'nationality' => 'required|min:2|max:100|unique:nationalities,nationality,' . $this->editId,
        ]);

        $isEdit = $this->isEdit;

        Nationality::updateOrCreate(
            ['id' => $this->editId],
            [
                'nationality' => $this->nationality,
            ]
        );

        notyf()
            ->duration(3000)
            ->dismissible(true)
            ->success(
                $isEdit
                    ? 'Edit successfully'
                    : 'Adding successfully'
            );

        $this->resetForm();
        $this->Nationalityadd = false;
        $this->resetPage();
    }

    private function resetForm()
    {
        $this->reset([
            'nationality',
            'editId',
            'isEdit',
        ]);
    }

    public function edit($id)
    {
        $nat = Nationality::findOrFail($id);

        $this->editId = $nat->id;
        $this->nationality = $nat->nationality;
        $this->isEdit = true;
        $this->Nationalityadd = true;
    }

    protected $listeners = ['deletenationality'];

    public function deleteNationality($id)
    {

        $nationality = Nationality::find($id);

        if ($nationality) {
            $nationality->delete();



            notyf()
                ->duration(3000)
                ->dismissible(true)
                ->success('هاتە ژێـــبـرن');
        }
    }
    public function render()
    {
        return view('livewire.nationality.show', [
            'nationalities' => Nationality::paginate(10),
        ]);
    }
}
