@props(['color' => '#ffffff', 'size' => '32', 'type' => 'default'])

<div {{ $attributes }}>
    @switch($type)
        @case('brand')
            <svg id="code_snippet" data-name="code snippet" height="{{ $size }}" viewBox="0 0 104 24"
                width="{{ $size * 5 }}" xmlns="http://www.w3.org/2000/svg">

                <rect id="Rectangle" fill="none" height="24" width="24" />

                <path id="Rectangle-2" data-name="Rectangle" d="M0,6.586V0H6.586" fill="none"
                    stroke-miterlimit="10" stroke-width="1.5" stroke="{{ $color }}"
                    transform="translate(2.343 12) rotate(-45)" />

                <path id="Line" d="M4.659,0,0,17.387" fill="none" stroke-linecap="square"
                    stroke-miterlimit="10" stroke-width="1.5" stroke="{{ $color }}"
                    transform="translate(9.671 3.307)" />

                <path id="Rectangle-3" data-name="Rectangle" d="M0,6.586V0H6.586" fill="none"
                    stroke-miterlimit="10" stroke-width="1.5" stroke="{{ $color }}"
                    transform="translate(21.657 12) rotate(135)" />

                <text x="26" y="18" fill="{{ $color }}">Snippetly</text>
            </svg>
        @break

        @default
            <svg id="code_snippet" data-name="code snippet" height="{{ $size }}" viewBox="0 0 24 24"
                width="{{ $size }}" xmlns="http://www.w3.org/2000/svg">
                <rect id="Rectangle" fill="none" height="24" width="24" />
                <path id="Rectangle-2" data-name="Rectangle" d="M0,6.586V0H6.586" fill="none"
                    stroke-miterlimit="10" stroke-width="1.5" stroke="{{ $color }}"
                    transform="translate(2.343 12) rotate(-45)" />
                <path id="Line" d="M4.659,0,0,17.387" fill="none" stroke-linecap="square"
                    stroke-miterlimit="10" stroke-width="1.5" stroke="{{ $color }}"
                    transform="translate(9.671 3.307)" />
                <path id="Rectangle-3" data-name="Rectangle" d="M0,6.586V0H6.586" fill="none"
                    stroke-miterlimit="10" stroke-width="1.5" stroke="{{ $color }}"
                    transform="translate(21.657 12) rotate(135)" />
            </svg>
    @endswitch
</div>
