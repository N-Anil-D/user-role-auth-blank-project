
<div class="modal fade" id="{{ $modalName }}" tabindex="-1" aria-labelledby="{{ $modalName }}Label" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-dark">{!! $title.': '.($selectedUser ? $selectedUser['name'] : '') !!}</h5>
                @if($closeButton)
                    <button type="button" onclick="$('#{{ $modalName }}').modal('hide');" class="btn-close bg-dark" aria-label="Close"></button>
                @endif
            </div>

            <div class="modal-body">
                {{-- {!! $body !!} --}}
                <form class="form-horizontal form-bordered" wire:submit.prevent='saveEditUser'>
                    <div class="input-group mb-3">
                        <span class="input-group-text">{{ ucfirst('name') }}</span>
                        <input type="text" class="form-control" wire:model='selectedUser.name'>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">{{ ucfirst('email') }}</span>
                        <input type="email" class="form-control" wire:model='selectedUser.email'>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">{{ ucfirst('username') }}</span>
                        <input type="text" class="form-control" wire:model='selectedUser.username'>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">{{ ucfirst('Phone Number') }}</span>
                        <input type="text" class="form-control" wire:model='selectedUser.phone_number'>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">{{ ucfirst('language') }}</label>
                        <select class="form-select" id="inputGroupSelect01" wire:model='selectedUser.language'>
                          <option selected disabled>Choose...</option>
                          <option value="0">EN</option>
                        </select>
                    </div>
                    @if (isset($selectedUser))
                        <label class="input-group-text" for="inputGroupSelect02">{{ ucfirst('select role for ') }} <span class="text-primary">{{ $selectedUser['name'] }}</span></label>
                        <select class="form-select" id="inputGroupSelect02" aria-label="Select A Role" wire:model.defer="selectedUser.role">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ in_array($role->id,[$selectedUser['role']]) ? 'selected':'' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    @endif
                    <div class="modal-footer">
                        @if ($formButton)
                            <button type="submit" class="btn btn-primary">{!! trans('modal.button.send-form') !!}</button>
                        @endif
                        @if($cancelButton)
                            <button type="button" onclick="$('#{{ $modalName }}').modal('hide');" class="btn btn-secondary">{!! trans('modal.button.cancel') !!}</button>
                        @endif
                    </div>
                </form>
        
                {{-- <button wire:click="" type="button" class="btn btn-primary">{!! trans('modal.button.confirm') !!}</button> --}}
            </div>
        </div>
    </div>
</div>

{{-- 

general modal parameters

title           : [html] content
modalPosition   : [text] ['', 'modal-dialog-centered']
modalSize       : [text] ['modal-sm', 'modal-lg', 'modal-xl']
body            : [html] content
closeButton     : [boolean] [true, false]
function        : [text] [$functionName]
cancelButton    : [boolean] [true, false]

--}}