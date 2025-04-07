
<div class="modal fade" id="{{ $modalName }}" tabindex="-1" aria-labelledby="{{ $modalName }}Label" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-dark">{!! $title.'Role : '.($selectedRole ? $selectedRole?->name : '') !!}</h5>
                @if($closeButton)
                    <button type="button" onclick="$('#{{ $modalName }}').modal('hide');" class="btn-close bg-dark" aria-label="Close"></button>
                @endif
            </div>

            <div class="modal-body">
                {{-- {!! $body !!} --}}
                <div class="modal-wrapper">
                    <div class="modal-icon">
                        <i class="fas fa-question-circle text-primary"></i>
                    </div>
                    <div class="modal-text">
                        {{-- <h4 class="font-weight-bold text-dark">Primary</h4> --}}
                        <p>Role and role authorities will be deleted.</u></p>
                        <p>Are you sure that you want to delete <u>{!! $selectedRole?->icon.' '.$selectedRole?->name !!}?</u></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button wire:click="removeThisRole" type="button" class="btn btn-primary">{!! trans('modal.button.confirm') !!}</button>
                    @if ($formButton)
                        <button type="submit" class="btn btn-primary">{!! trans('modal.button.send-form') !!}</button>
                    @endif
                    @if($cancelButton)
                    <button type="button" onclick="$('#{{ $modalName }}').modal('hide');" class="btn btn-secondary">{!! trans('modal.button.cancel') !!}</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>