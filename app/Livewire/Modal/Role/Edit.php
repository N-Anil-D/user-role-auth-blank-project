<?php

namespace App\Livewire\Modal\Role;

use Livewire\Component;
use App\Models\Role;
use App\Models\RouteList;
use App\Models\RoleAuthority;
use Illuminate\Support\Facades\Validator; 
use Livewire\Attributes\On;

class Edit extends Component
{
    public $roles;
    public $mainRoutes;

    public $selectedRole;
    public $selectedRoleID;
    public $selectedRoleAuths;
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
        return view('livewire.modal.role.edit');
    }
    
    public function mount()
    {
        $this->mainRoutes = RouteList::where('parent_id',0)->get();
        $this->selectedRole = [
            'name' => '',
            'authority' => [],
        ];

    }

    #[On('edit-role')]
    public function setSelectedRole($roleID){
        $this->selectedRoleID = $roleID;
        $role = Role::find($this->selectedRoleID);
        $this->selectedRoleAuths = Role::find($this->selectedRoleID)->roleAuths;
        $this->selectedRole = [
            'name' => $role->name,
            'authority' => $this->selectedRoleAuths->pluck('route_id')->toArray(),
        ];
    }

    #[On('asign-authority-to-role')]
    public function setAsign($roleID){
        $this->selectedRoleID = $roleID;
    }

    public function saveRole(){
        $validator  = Validator::make($this->selectedRole, [
            'name'          => 'required|string|max:255',
            'authority'     => 'nullable|array',
        ]);
        $validated = $validator->validate();
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $editRole = Role::find($this->selectedRoleID);
        $editRole->name = $validated['name'];
        $editRole->save();
        
        foreach (Role::find($this->selectedRoleID)->roleAuths as $roleAuth) {
            $roleAuth->delete();
        }
        foreach ($validated['authority'] as $routeID) {
            $newRoleAuthorities = new RoleAuthority();
            $newRoleAuthorities->role_id = $editRole->id;
            $newRoleAuthorities->route_id = $routeID;
            $newRoleAuthorities->save();
        }

        $this->dispatch(self::model.'EditModal'.'Hide');
        return redirect(route('role.management')); // this is needed for refreshing navigation bar with bootstrap js works properly
        
        // $this->dispatch('refresh-role-table');
    }

}
