<?php

if (! function_exists('prefs')) :

    function prefs() {
        $user = App\Models\User::find(auth()->user()->id);

        $data = $user->preferences;

        return json_decode($data);
    }

endif;