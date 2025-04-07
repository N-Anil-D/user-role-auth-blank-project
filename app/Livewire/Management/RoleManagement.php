<?php

namespace App\Livewire\Management;

use Livewire\Attributes\On;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use App\Models\Role;

class RoleManagement extends Component
{
    const model = 'role';

    public $pageTitle = 'Roles';
    public $roles;
    public $modals;
    public $title = 'Role Management';
    public $table_title = 'Role List';
    public $selectedRole;
    public $selectedRoleID;

    public function render()
    {
        return view('livewire.management.role-management');
    }

    public function mount(){
        $this->modals = [
            self::model.'AsignModal',
            self::model.'CreateModal',
            self::model.'EditModal',
            self::model.'DeleteModal',
        ];
    }

    #[On('refresh-role-table')]
    public function boot(){
        $this->roles = Role::get();
    }

    public function addRole(){
        $this->dispatch('create-role');
        $this->dispatch(self::model.'CreateModal'.'Show');
    }

    public function editRole($roleID){
        $this->dispatch('edit-role',$this->validateID($roleID));
        $this->dispatch(self::model.'EditModal'.'Show');
    }


    public function deleteRole($roleID){
        $this->dispatch('delete-role',$this->validateID($roleID));
        $this->dispatch(self::model.'DeleteModal'.'Show');
    }


    public function asignAuthorityToRole($roleID){
        $this->dispatch('asign-authority-to-role',$this->validateID($roleID));
        $this->dispatch(self::model.'AsignModal'.'Show');
    }

    private function validateID($id){
        $validator  = Validator::make(['id'=>$id], [
            'id' => 'required|numeric',
        ]);
        $validated = $validator->validate();
        return $validated['id'];
    }


}