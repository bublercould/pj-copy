<div class="mt-0">

    @include('livewire.admin.about.add')

    @include('livewire.admin.about.edit')

    @include('livewire.admin.about.data')

    {{-- Paginate Page --}}
    @if(!$staff->isEmpty())
        <div class="mt-3">
            {!! $staff->links() !!}
        </div>
    @endif

</div>
