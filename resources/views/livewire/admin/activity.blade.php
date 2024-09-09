<div class="mt-0">

    @include('livewire.admin.activity.add')

    @include('livewire.admin.activity.edit')

    @include('livewire.admin.activity.data')

    {{-- Paginate Page --}}
    @if (!$activities->isEmpty())
        <div class="mt-3">
            {!! $activities->links() !!}
        </div>
    @endif

</div>
