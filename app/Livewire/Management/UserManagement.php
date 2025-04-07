<?php

namespace App\Livewire\Management;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\User;

class UserManagement extends Component
{
    const model = 'userManage';
    public $title = 'User Management';
    public $pageTitle = 'Users';
    public $modals;
    public $users;
    public $table_title = 'User List';
    public $selectedUser;
    public $selectedUserID;
    public $operation;

    public function render()
    {
        return view('livewire.management.user-management');
    }

    public function mount(){
        $this->modals = [
            self::model.'EditModal',
            self::model.'DeleteModal',
        ];
    }

    #[On('refresh-user-table')]
    public function boot(){
        $this->users = User::get();
    }

    public function manageUser($operation,$id){
        $this->operation = $operation;
        if($this->operation){//if $operation == 1 meands EDIT
            $this->selectedUserID = $id;
            $this->dispatch('user-edit', user_id:$id);
            $this->dispatch(self::model.'EditModal'.'Show');

        }else{//if $operation == 0 meands DELETE
            $this->selectedUser = User::find($id);
            $this->dispatch('user-delete', user_id:$id);
            $this->dispatch(self::model.'DeleteModal'.'Show');
        }
    }
    
}
