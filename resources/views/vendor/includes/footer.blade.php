<!-- Copyright -->
<div class="d-flex justify-content-center text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);width: 100%">
    @if (strtolower(language()->getCode()) == 'en')
      &copy; {{ date("Y") .' ' . __('public.Copyright') .':' }}
      {{ $titleEn }}
    @elseif (strtolower(language()->getCode()) == 'ar')
      {{ $titleAr . ' ' . __('public.Copyright') . ': ' . date("Y") }} &copy;
    @endif
</div>
<!-- Copyright -->
