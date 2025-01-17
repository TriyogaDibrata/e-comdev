<x-front-layout>
    @livewire('landing.section.hero')
    @livewire('landing.section.catalogue')
    @push('js')
        <script src="{{ asset('js/custom.js') }}"></script>
    @endpush
</x-front-layout>
