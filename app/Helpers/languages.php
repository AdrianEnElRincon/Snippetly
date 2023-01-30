<?php

if (!function_exists('langs')) :

    class LanguagesEnumHelper implements App\Interfaces\EnumHelperInterface
    {
        private $table = 'languages';

        public function enum(string $from): App\Enums\Languages
        {
            return App\Enums\Languages::from($from);
        }

        public function id(string $from) : int
        {
            return Illuminate\Support\Facades\DB::scalar("select id from $this->table where name = '$from'");
        }

        public function fromId($id) : App\Enums\Languages
        {
            return App\Enums\Languages::from(
                Illuminate\Support\Facades\DB::scalar("select value from $this->table where id = $id")
            );
        }

        public function check(string|object $test, string|object $language): bool
        {
            if ($test instanceof \App\Models\Language) {
                $test = $test->value;
            }

            $enum = $language instanceof \App\Enums\Languages ? $language : \App\Enums\Languages::from($language);

            switch (gettype($test)) {
                case 'string':
                    return App\Enums\Languages::from($test) === $enum;
                case 'object':
                    return $test === $enum;
                default:
                    throw new Error("Invalid test for language check. PROVIDED " . gettype($test) . " REQUIRED string|object");
            }

            return false;
        }

        public function in(string|object $test, array $languages): bool
        {
            foreach ($languages as $language) {
                try {
                    App\Enums\Languages::from($language);
                } catch (Exception $e) {
                    throw new Error('Language in languages array is not a valid language');
                }
            }

            if ($test instanceof \App\Models\Language) {
                $test = $test->name;
            }

            switch (gettype($test)) {
                case 'string':
                    return in_array($test, $languages);
                case 'object':
                    return in_array(strtolower($test->name), $languages);
                default:
                    throw new Error('Invalid test for languages check. PROVIDED ' . gettype($test) . ' REQUIRED string|object');
            }
        }

        public function names(): array
        {
            return array_map(fn ($enum) => $enum->name, \App\Enums\Languages::cases());
        }

        public function values(): array
        {
            return array_map(fn ($enum) => $enum->value, \App\Enums\Languages::cases());
        }
    }

    /**
     * Helper function for working with languages enum
     *
     */
    function langs()
    {
        return new LanguagesEnumHelper;
    }

endif;
