
<div class="modal fade" id="{{ $modalName }}" tabindex="-1" aria-labelledby="{{ $modalName }}Label" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-dark">{!! $title.' Role :'.($selectedRole ? $selectedRole['name']:'') !!}</h5>
                @if($closeButton)
                    <button type="button" onclick="$('#{{ $modalName }}').modal('hide');" class="btn-close bg-dark" aria-label="Close"></button>
                @endif
            </div>
            <div class="modal-body">
                {{-- {!! $body !!} --}}
                <form class="form-horizontal form-bordered" wire:submit.prevent='saveRole'>
                    <div class="input-group mb-3">
                        <span class="input-group-text">{{ ucfirst('name') }}</span>
                        <input type="text" class="form-control" wire:model.live='selectedRole.name' placeholder="Name">
                    </div>
                    <h3 class="text-dark py-2">Multi Select Role Authorities for <span class="text-primary">{{ ($selectedRole ? $selectedRole['name']:'') }}</span></h3>
                    <select class="form-select" multiple aria-label="Multi Select Role Authorities" wire:model.defer="selectedRole.authority">
                        @foreach ($mainRoutes as $mainRoute)
                            <option value="{{ $mainRoute->id }}" {{ in_array($mainRoute->id,$selectedRole['authority']) ? 'selected':'' }}>
                                {{ $mainRoute->name }}
                            </option>
                        @endforeach
                    </select>
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