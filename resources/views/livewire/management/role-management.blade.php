@section('title') <h2>{{ $title }}</h2> @endsection
@section('page-title') {{ $pageTitle }} @endsection
<div class="row">
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <button type="button" class="btn btn-xs btn-outline-primary mx-2" wire:click='addRole()'>{!! __('icon.plus') !!} Create New Role</button>
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">{{ $table_title }}</h2>
                </header>
                <div class="card-body">

                    <table class="table table-bordered table-striped mb-0" id="datatable-default">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Role Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr class="{{ $loop->index%2 ? 'table-secondary' : '' }}">
                                    <td class="max-w-10 align-middle">
                                        <span>{{ $role->id }}</span>
                                        <button type="button" class="btn btn-xs btn-outline-info mx-2" wire:click='editRole({{ $role->id }})'>{!! __('icon.edit') !!}</button>
                                        <button type="button" class="btn btn-xs btn-outline-danger mr-1" wire:click='deleteRole({{ $role->id }})'>{!! __('icon.trash') !!}</button>
                                    </td>
                                    <td class="align-middle">{{ $role->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

    @livewire('modal.role.create', [
        'modalName'     => self::model.'CreateModal',
        'title'         => __('modal.create-title'),
        'modalPosition' => 'modal-dialog-centered',
        'modalSize'     => 'modal-lg',
        'formButton'    => true,
        'closeButton'   => true,
        'cancelButton'  => true,
    ])

    @livewire('modal.role.edit', [
        'modalName'     => self::model.'EditModal',
        'title'         => __('modal.edit-title'),
        'modalPosition' => 'modal-dialog-centered',
        'modalSize'     => 'modal-lg',
        'formButton'    => true,
        'closeButton'   => true,
        'cancelButton'  => true,
    ])

    @livewire('modal.role.delete', [
        'modalName'     => self::model.'DeleteModal',
        'title'         => __('modal.delete-title'),
        'modalPosition' => 'modal-dialog-centered',
        'modalSize'     => 'modal-lg',
        'formButton'    => false,
        'closeButton'   => true,
        'cancelButton'  => true,
    ])

    @component('modal.emit', ['modals' => $modals]) @endcomponent

</div>