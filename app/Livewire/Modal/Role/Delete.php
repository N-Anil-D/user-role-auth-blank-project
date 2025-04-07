<?php

namespace App\Livewire\Modal\Role;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Role;

class Delete extends Component
{
    public $selectedRole;
    public $selectedRoleID;
    public $modalName;
    public $title;
    public $modalPosition;
    public $modalSize;
    public $formButton;
    public $closeButton;
    public $cancelButton;
    const model = 'role';

    public function render()
    {
        return view('livewire.modal.role.delete');
    }

    #[On('delete-role')]
    public function setSelectedRole($roleID){

        $this->selectedRoleID = $roleID;
        $this->selectedRole = Role::find($this->selectedRoleID);
    }

    public function removeThisRole(){
        foreach ($this->selectedRole->roleAuths as $roleAuth) {
            $roleAuth->delete();
        }
        $this->selectedRole->delete();
        $this->dispatch(self::model.'DeleteModal'.'Hide');
        $this->dispatch('refresh-role-table');
        //After creating relations, asigned roles on users should be remove. ###WORK###
    }

}
