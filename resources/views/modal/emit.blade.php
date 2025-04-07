@section('js')
    <script>
        @foreach($modals as $modal)

            document.addEventListener('livewire:init', () => {
                Livewire.on('{{ $modal }}Show', (event) => {
                    $('#{{ $modal }}').modal('show');
                });
                Livewire.on('{{ $modal }}Hide', (event) => {
                    $('#{{ $modal }}').modal('hide');
                });
            });
            
        @endforeach
    </script>
@endsection
