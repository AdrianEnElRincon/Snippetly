<div>
    <style>
        .breakpoint-tooltip {
            position: fixed;
            left: 50%;
            top: 10px;
            color: yellow;
            display: none;
            z-index: 999;
        }

        @media (max-width: 575px) {
            .none {
                display: inline;
            }
        }

        @media (min-width: 576px) and (max-width: 767px) {
            .sm {
                display: inline;
            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            .md {
                display: inline;
            }
        }

        @media (min-width: 992px) and (max-width: 1199px) {
            .lg {
                display: inline;
            }
        }

        @media (width >=1200px) and (max-width: 1399px) {
            .xl {
                display: inline;
            }
        }

        @media (width >=1400px) {
            .xxl {
                display: inline;
            }
        }
    </style>

    <div class="breakpoint-tooltip none">none</div>
    <div class="breakpoint-tooltip sm">sm</div>
    <div class="breakpoint-tooltip md">md</div>
    <div class="breakpoint-tooltip lg">lg</div>
    <div class="breakpoint-tooltip xl">xl</div>
    <div class="breakpoint-tooltip xxl">xxl</div>
</div>
