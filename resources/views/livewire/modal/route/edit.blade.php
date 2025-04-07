
<div class="modal fade" id="{{ $modalName }}" tabindex="-1" aria-labelledby="{{ $modalName }}Label" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-dark">{!! $title.' '.($selectedRoute ? $selectedRoute['name']:'') !!}</h5>
                @if($closeButton)
                    <button type="button" onclick="$('#{{ $modalName }}').modal('hide');" class="btn-close bg-dark" aria-label="Close"></button>
                @endif
            </div>
            <div class="modal-body">
                {{-- {!! $body !!} --}}
                <form class="form-horizontal form-bordered" wire:submit.prevent='saveRoute'>
                    <div class="input-group mb-3">
                        <span class="input-group-text">{{ ucfirst('name') }}</span>
                        <input type="text" class="form-control" wire:model='selectedRoute.name' placeholder="Name">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">{{ ucfirst('icon') }}</span>
                        <input type="text" class="form-control" wire:model='selectedRoute.icon' placeholder='<i class="fa-solid fa-gear"></i>'>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">{{ ucfirst('slug') }}</span>
                        <input type="text" class="form-control" wire:model='selectedRoute.slug' placeholder="URL path">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">{{ ucfirst('route name') }}</span>
                        <input type="text" class="form-control" wire:model='selectedRoute.route_name' placeholder="Route Name in code OR NULL">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Sub or main</label>
                        <select class="form-select" id="inputGroupSelect01" wire:model='selectedRoute.parent_id'>
                          <option selected value="0">Main Route</option>
                          @foreach ($mainRoutes as $mainRoute)
                            <option value="{{ $mainRoute->id }}">{!! $mainRoute->icon.' '.$mainRoute->name !!}</option>
                          @endforeach
                        </select>
                    </div>

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