<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
      {{ __('public.Language') }}
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        @foreach (language()->allowed() as $code => $name)
            <li>
                <a class="dropdown-item" href="{{ language()->back($code) }}"> 
                    <img style="display: inline" src="{{ asset('storage/flags/'. language()->country($code) .'.png') }}" alt="{{ $name }}" width="{{ config('language.flags.width') }}" /> &nbsp;
                    {{ $name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>