<?php

namespace App\Livewire\Modal\User;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\User;

class DeleteUser extends Component
{
    public $selectedUserID;
    public $selectedUser;
    public $modalName;
    public $title;
    public $modalPosition;
    public $modalSize;
    public $formButton;
    public $closeButton;
    public $cancelButton;
    const model = 'userManage';

    public function render()
    {
        return view('livewire.modal.user.delete-user');
    }

    #[On('user-delete')] 
    public function editUser($user_id)
    {
        $this->selectedUserID = $user_id;
        $this->selectedUser = User::find($this->selectedUserID);
        
    }
    
    public function endHisJourney(){
        $this->selectedUser->delete();
        $this->dispatch(self::model.'DeleteModal'.'Hide');
        $this->dispatch('refresh-user-table');

    }

}
