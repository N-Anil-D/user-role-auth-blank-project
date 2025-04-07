<?php

namespace App\Livewire\Modal\Role;

use Livewire\Component;
use App\Models\RouteList;
use App\Models\Role;
use App\Models\RoleAuthority;
use Illuminate\Support\Facades\Validator; 
use Livewire\Attributes\On;

class Create extends Component
{
    public $roles;
    // public $selectedRoleAuthority = [];
    public $mainRoutes;

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
        return view('livewire.modal.role.create');
    }

    #[On('create-role')] 
    public function addRole(){
        $this->selectedRole = [
            'name' => null,
            'selectedRoleAuthority' => [],
        ];
    }
    
    public function mount()
    {
        $this->mainRoutes = RouteList::where('parent_id',0)->get();
    }

    public function saveRole(){
        $validator  = Validator::make($this->selectedRole, [
            'name'                      => 'required|string|max:255',
            'selectedRoleAuthority'     => 'nullable|array',
        ]);
        $validated = $validator->validate();
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $newRole = new Role();
        $newRole->name = $validated['name'];
        $newRole->save();
        foreach ($this->selectedRole['selectedRoleAuthority'] as $routeID) {
            $newRoleAuthorities = new RoleAuthority();
            $newRoleAuthorities->role_id = $newRole->id;
            $newRoleAuthorities->route_id = $routeID;
            $newRoleAuthorities->save();
        }
        $this->dispatch(self::model.'CreateModal'.'Hide');
        $this->dispatch('refresh-role-table');
    }

}
