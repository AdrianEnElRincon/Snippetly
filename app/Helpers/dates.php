<?php

if (!function_exists('date_dmy_array')) :

    function date_dmy_array(\Carbon\Carbon $date)
    {
        $locale = Illuminate\Support\Facades\App::getLocale();

        $date->locale($locale);

        return [
            'day' => $locale === 'en' ? $date->format('jS') : $date->day,
            'month' => $date->monthName,
            'year' => $date->year,
        ];
    }

endif;
