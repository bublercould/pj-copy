<div class="mt-0">

    @include('livewire.admin.news.add')

    @include('livewire.admin.news.edit')

    @include('livewire.admin.news.data')

    {{-- Paginate Page --}}
    @if(!$postNews->isEmpty())
        <div class="mt-3">
            {!! $postNews->links() !!}
        </div>
    @endif

</div>
