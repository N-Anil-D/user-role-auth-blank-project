@section('title') <h2>{{ $title }}</h2> @endsection
@section('page-title') {{ $pageTitle }} @endsection
<div class="row">
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
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
                                <th>Name & Surname</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Lang</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="{{ $loop->index%2 ? 'table-secondary' : '' }}">
                                    <td class="align-middle">
                                        <span>{{ $user->id }}</span>
                                        <button type="button" class="btn btn-xs btn-outline-info mx-2" wire:click='manageUser(1,{{ $user->id }})'>{!! __('icon.edit') !!}</button>
                                        <button type="button" class="btn btn-xs btn-outline-danger mr-1" wire:click='manageUser(0,{{ $user->id }})'>{!! __('icon.trash') !!}</button>
                                    </td>
                                    <td class="align-middle">{{ $user->name }}</td>
                                    <td class="align-middle">{{ $user->username }}</td>
                                    <td class="align-middle">{{ $user->email }}</td>
                                    <td class="align-middle">{{ $user->lang_to_string() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>


    @livewire('modal.user.edit-user', [
        'modalName'     => self::model.'EditModal',
        'title'         => __('modal.edit-title'),
        'modalPosition' => 'modal-dialog-centered',
        'modalSize'     => 'modal-lg',
        'formButton'    => true,
        'closeButton'   => true,
        'cancelButton'  => true,
    ])

    @livewire('modal.user.delete-user', [
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


