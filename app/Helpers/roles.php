<?php

if (!function_exists('roles')) :

    class RolesEnumHelper implements App\Interfaces\EnumHelperInterface
    {
        private $table = 'roles';

        public function enum(string $from): \App\Enums\Roles
        {
            return \App\Enums\Roles::from($from);
        }

        public function id(string $from): int
        {
            return Illuminate\Support\Facades\DB::scalar("select id from $this->table where name = '$from'");
        }

        public function fromId($id): BackedEnum
        {
            return App\Enums\Roles::from(
                Illuminate\Support\Facades\DB::scalar("select value from $this->table where id = $id")
            );
        }

        public function check(string|object $test, string|object $role): bool
        {
            if ($test instanceof \App\Models\Role) {
                $test = $test->name;
            }

            $enum = $role instanceof \App\Enums\Roles ? $role : \App\Enums\Roles::from($role);

            switch (gettype($test)) {
                case 'string':
                    return App\Enums\Roles::from($test) === $enum;
                case 'object':
                    return $test === $enum;
                default:
                    throw new Error('Invalid test for roles check. PROVIDED ' . gettype($test) . ' REQUIRED string|object');
            }
        }

        public function in(string|object $test, array $roles) : bool
        {
            foreach ($roles as $role) {
                try {
                    App\Enums\Roles::from($role);
                } catch (Exception $e) {
                    throw new Error('Role in roles array is not a role');
                }
            }

            if ($test instanceof \App\Models\Role) {
                $test = $test->value;
            }

            switch (gettype($test)) {
                case 'string':
                    return in_array($test, $roles);
                case 'object':
                    return in_array($test->value, $roles);
                default:
                    throw new Error('Invalid test for roles check. PROVIDED ' . gettype($test) . ' REQUIRED string|object');
            }
        }

        public function names(): array
        {
            return array_map(fn ($enum) => $enum->name, \App\Enums\Roles::cases());
        }

        public function values(): array
        {
            return array_map(fn ($enum) => $enum->value, \App\Enums\Languages::cases());
        }
    }

    /**
     * Helper function for working with Roles enum
     *
     */
    function roles()
    {
        return new RolesEnumHelper;
    }

endif;
