<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SeedFromCurrent extends Command
{
    protected $signature = 'db:seed-from-current';

    protected $description = 'Regenerate all seeder files from current database data';

    public function handle(): int
    {
        $tables = [
            'company_info' => ['seeder' => 'CompanyInfoSeeder', 'model' => 'CompanyInfo'],
            'services' => ['seeder' => 'ServiceSeeder', 'model' => 'Service', 'json' => ['features']],
            'clients' => ['seeder' => 'ClientSeeder', 'model' => 'Client'],
            'team_members' => ['seeder' => 'TeamMemberSeeder', 'model' => 'TeamMember'],
            'courses' => ['seeder' => 'CourseSeeder', 'model' => 'Course', 'json' => ['modules']],
            'academy_offers' => ['seeder' => 'AcademyOfferSeeder', 'model' => 'AcademyOffer'],
            'company_values' => ['seeder' => 'CompanyValueSeeder', 'model' => 'CompanyValue'],
            'gallery_items' => ['seeder' => 'GalleryItemSeeder', 'model' => 'GalleryItem'],
            'users' => ['seeder' => 'UserSeeder', 'model' => 'User'],
        ];

        foreach ($tables as $table => $config) {
            $rows = DB::table($table)->orderBy('sort_order')->orderBy('id')->get();

            $data = [];
            foreach ($rows as $row) {
                $item = [];
                foreach (get_object_vars($row) as $key => $value) {
                    if (in_array($key, ['id', 'created_at', 'updated_at', 'email_verified_at', 'remember_token'], true)) {
                        continue;
                    }
                    if (is_null($value)) {
                        continue;
                    }
                    if (isset($config['json']) && in_array($key, $config['json'], true) && is_string($value)) {
                        $decoded = json_decode($value, true);
                        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                            $item[$key] = $decoded;

                            continue;
                        }
                    }
                    $item[$key] = $value;
                }
                if ($item !== []) {
                    $data[] = $item;
                }
            }

            $this->writeSeeder($config['seeder'], $config['model'], $data);
            $this->info("Wrote {$config['seeder']}.php (".count($data).' records)');
        }

        $this->writeDatabaseSeeder(array_column($tables, 'seeder'));

        $this->info('All seeders regenerated. Run vendor/bin/pint --format agent to fix formatting.');

        return Command::SUCCESS;
    }

    private function writeSeeder(string $name, string $model, array $data): void
    {
        $plural = match ($name) {
            'CompanyInfoSeeder' => 'infos',
            'GalleryItemSeeder' => 'items',
            'TeamMemberSeeder' => 'members',
            'CompanyValueSeeder' => 'values',
            'AcademyOfferSeeder' => 'offers',
            default => lcfirst(Str::plural($model)),
        };
        $singular = match ($name) {
            'ClientSeeder' => 'client',
            'ServiceSeeder' => 'service',
            'CourseSeeder' => 'course',
            'GalleryItemSeeder' => 'item',
            'TeamMemberSeeder' => 'member',
            'CompanyValueSeeder' => 'value',
            'AcademyOfferSeeder' => 'offer',
            'CompanyInfoSeeder' => 'info',
            'UserSeeder' => 'user',
            default => lcfirst($model),
        };

        $code = "<?php\n\n";
        $code .= "namespace Database\\Seeders;\n\n";
        $code .= "use App\\Models\\{$model};\n";
        $code .= "use Illuminate\\Database\\Seeder;\n\n";
        $code .= "class {$name} extends Seeder\n";
        $code .= "{\n";
        $code .= "    public function run(): void\n";
        $code .= "    {\n";
        $code .= "        \${$plural} = [\n";

        foreach ($data as $item) {
            $code .= "            [\n";
            foreach ($item as $key => $value) {
                $code .= "                '{$key}' => {$this->export($value, 3)},\n";
            }
            $code .= "            ],\n";
        }

        $code .= "        ];\n\n";
        $code .= "        foreach (\${$plural} as \${$singular}) {\n";
        $code .= "            {$model}::create(\${$singular});\n";
        $code .= "        }\n";
        $code .= "    }\n";
        $code .= "}\n";

        file_put_contents(database_path("seeders/{$name}.php"), $code);
    }

    private function export(mixed $value, int $depth): string
    {
        if (is_null($value)) {
            return 'null';
        }
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }
        if (is_int($value) || is_float($value)) {
            return (string) $value;
        }
        if (is_array($value)) {
            if ($value === []) {
                return '[]';
            }
            $itemIndent = str_repeat('    ', $depth + 2);
            $closeIndent = str_repeat('    ', $depth + 1);
            $parts = [];
            $isList = array_is_list($value);
            foreach ($value as $k => $v) {
                if ($isList) {
                    $parts[] = "{$itemIndent}{$this->export($v, $depth + 2)}";
                } else {
                    $parts[] = "{$itemIndent}{$this->export($k, $depth + 2)} => {$this->export($v, $depth + 2)}";
                }
            }

            return "[\n".implode(",\n", $parts).",\n{$closeIndent}]";
        }
        $escaped = str_replace(['\\', "'"], ['\\\\', "\\'"], (string) $value);

        return "'{$escaped}'";
    }

    private function writeDatabaseSeeder(array $tables): void
    {
        $seederNames = array_values($tables);
        sort($seederNames);

        $calls = implode("::class,\n            ", $seederNames);

        $code = "<?php\n\n";
        $code .= "namespace Database\\Seeders;\n\n";
        $code .= "use Illuminate\\Database\\Console\\Seeds\\WithoutModelEvents;\n";
        $code .= "use Illuminate\\Database\\Seeder;\n\n";
        $code .= "class DatabaseSeeder extends Seeder\n";
        $code .= "{\n";
        $code .= "    use WithoutModelEvents;\n\n";
        $code .= "    public function run(): void\n";
        $code .= "    {\n";
        $code .= "        \$this->call([\n";
        $code .= "            {$calls}::class,\n";
        $code .= "        ]);\n";
        $code .= "    }\n";
        $code .= "}\n";

        file_put_contents(database_path('seeders/DatabaseSeeder.php'), $code);
    }
}
