@section('title') <h2>{{ $title }}</h2> @endsection
@section('page-title') {{ $pageTitle }} @endsection
<div class="row">
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <button type="button" class="btn btn-xs btn-outline-primary mx-2" wire:click='addRoute()'>{!! __('icon.plus') !!} Create New Route</button>
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
                                <th>Icon</th>
                                <th>Route Name</th>
                                <th>Parent ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($routes as $route)
                                <tr class="{{ $loop->index%2 ? 'table-secondary' : '' }}">
                                    <td class="max-w-10 align-middle">
                                        <span>{{ $route->id }}</span>
                                        <button type="button" class="btn btn-xs btn-outline-info mx-2" wire:click='editRoute({{ $route->id }})'>{!! __('icon.edit') !!}</button>
                                        <button type="button" class="btn btn-xs btn-outline-danger mr-1" wire:click='deleteRoute({{ $route->id }})'>{!! __('icon.trash') !!}</button>
                                    </td>
                                    <td class="align-middle">{!! $route->icon !!}</td>
                                    <td class="align-middle">{{ $route->name }}</td>
                                    <td class="align-middle">{{ $route->parent_id }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

    @livewire('modal.route.create', [
        'modalName'     => self::model.'CreateModal',
        'title'         => __('modal.create-title'),
        'modalPosition' => 'modal-dialog-centered',
        'modalSize'     => 'modal-lg',
        'formButton'    => true,
        'closeButton'   => true,
        'cancelButton'  => true,
    ])

    @livewire('modal.route.edit', [
        'modalName'     => self::model.'EditModal',
        'title'         => __('modal.edit-title'),
        'modalPosition' => 'modal-dialog-centered',
        'modalSize'     => 'modal-lg',
        'formButton'    => true,
        'closeButton'   => true,
        'cancelButton'  => true,
    ])

    @livewire('modal.route.delete', [
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


