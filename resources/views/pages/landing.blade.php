<x-front-layout>
    @livewire('landing.section.hero')
    @livewire('landing.section.catalogue')
    @livewire('landing.section.about')
    @push('js')
        <script src="{{ asset('js/custom.js') }}"></script>
    @endpush
</x-front-layout>
