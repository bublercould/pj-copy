<div class="mt-0">

    @include('livewire.admin.contact.add')

    @include('livewire.admin.contact.edit')

    @include('livewire.admin.contact.data')

    {{-- Paginate Page --}}
    @if (!$contacts->isEmpty())
        <div class="mt-3">
            {!! $contacts->links() !!}
        </div>
    @endif

</div>
