<?php

namespace Laravel\Breeze\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'breeze:vue-bootstrap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Breeze resources for Inertia + Vue 3 with Bootstrap 5';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // NPM Packages...
        $this->updateNodePackages(function ($packages) {
            return [
                "@inertiajs/vue3" => "^1.0.0",
                "@vitejs/plugin-vue" => "^4.0.0",
                "autoprefixer" => "^10.4.12",
                "axios" => "^1.1.2",
                "laravel-vite-plugin" => "^0.7.2",
                "postcss" => "^8.4.18",
                "vite" => "^4.0.0",
                "vue" => "^3.2.41",
                "@popperjs/core" => "^2.11.6",
                "bootstrap" => "^5.2.3",
                "sass" => "^1.58.2"
            ];
        });

        // Views...
        copy(__DIR__ . '/../../stubs/resources/views/app.blade.php', resource_path('views/app.blade.php'));

        // Components + Pages...
        (new Filesystem)->ensureDirectoryExists(resource_path('js/Components'));
        (new Filesystem)->ensureDirectoryExists(resource_path('js/Layouts'));
        (new Filesystem)->ensureDirectoryExists(resource_path('js/Pages'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/resources/js/Components', resource_path('js/Components'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/resources/js/Layouts', resource_path('js/Layouts'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/resources/js/Pages', resource_path('js/Pages'));

        // Bootstrap ...
        copy(__DIR__ . '/../../stubs/inertia-vue-bootstrap/resources/css/app.css', resource_path('css/app.css'));
        copy(__DIR__ . '/../../stubs/inertia-vue-bootstrap/resources/js/app.js', resource_path('js/app.js'));
        copy(__DIR__ . '/../../stubs/inertia-vue-bootstrap/resources/js/bootstrap.js', resource_path('js/bootstrap.js'));

        $this->info('Bootstrap Breeze scaffolding installed successfully.');
        $this->comment('Please execute the "npm install && npm run dev" command to build your assets.');
    }

    /**
     * Update the "package.json" file.
     *
     * @param  callable  $callback
     * @param  bool  $dev
     * @return void
     */
    protected static function updateNodePackages(callable $callback, $dev = true)
    {
        if (!file_exists(base_path('package.json'))) {
            return;
        }

        $configurationKey = $dev ? 'devDependencies' : 'dependencies';

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages[$configurationKey] = $callback(
            array_key_exists($configurationKey, $packages) ? $packages[$configurationKey] : [],
            $configurationKey
        );

        ksort($packages[$configurationKey]);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . PHP_EOL
        );
    }

    /**
     * Delete the "node_modules" directory and remove the associated lock files.
     *
     * @return void
     */
    protected static function flushNodeModules()
    {
        tap(new Filesystem, function ($files) {
            $files->deleteDirectory(base_path('node_modules'));

            $files->delete(base_path('yarn.lock'));
            $files->delete(base_path('package-lock.json'));
        });
    }
}
