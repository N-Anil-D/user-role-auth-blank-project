<?php

namespace App\Livewire\Modal\User;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRoles;
use Illuminate\Support\Facades\Validator; 
use Livewire\Attributes\On;

class EditUser extends Component
{
    public $roles;
    
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
        return view('livewire.modal.user.edit-user');
    }
    
    public function mount()
    {
        $this->roles = Role::get();
        
    }
    
    #[On('user-edit')] 
    public function editUser($user_id)
    {
        $this->selectedUserID = $user_id;
        $user = User::find($this->selectedUserID);
        $this->selectedUser = [
            'name'              =>$user->name,
            'email'             =>$user->email,
            'username'          =>$user->username,
            'language'          =>$user->language,
            'phone_number'      =>$user->phone_number,
            'role'              =>$user->user_role?->role_id,
        ];
    }

    public function saveEditUser(){
        $validator  = Validator::make($this->selectedUser, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'username' => 'nullable|string',
            'language' => 'numeric',
            'phone_number' => 'nullable|max:255',
            'role' => 'nullable|numeric',
        ]);
        $validated = $validator->validate();
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::find($this->selectedUserID);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->username = $validated['username'];
        $user->language = $validated['language'];
        $user->phone_number = $validated['phone_number'];
        $user->save();
        
        $user->user_role ? $user->user_role->delete():null;
        $asignRoles = new UserRoles();
        $asignRoles->user_id = $this->selectedUserID;
        $asignRoles->role_id = $validated['role'];
        $asignRoles->save();

        $this->dispatch(self::model.'EditModal'.'Hide');
        $this->dispatch('refresh-user-table');

    }
}
