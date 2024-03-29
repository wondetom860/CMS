<span class="flex justify-center pt-8 sm:justify-center sm:pt-0">
    @foreach ($available_locales as $locale_name => $available_locale)
        @if ($available_locale === $current_locale)
            <span class="ml-2 mr-2 text-gray-700">[{{ $locale_name }}]&nbsp;&nbsp;</span>
        @else
            <a class="ml-1 underline ml-2 mr-2" href="/language/{{ $available_locale }}">
                <span>[{{ $locale_name }}] &nbsp;&nbsp;</span>
            </a>
        @endif
    @endforeach
</span>