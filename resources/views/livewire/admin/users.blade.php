<div>
    @include('livewire.admin.users.add')

    @include('livewire.admin.users.edit')

    @include('livewire.admin.users.data')

    {{-- Paginate Page --}}
    @if(!$users->isEmpty())
        <div class="mt-3">
            {!! $users->links() !!}
        </div>
    @endif

</div>
