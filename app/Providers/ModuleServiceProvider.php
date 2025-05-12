<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $repositoryPath = app_path('Http/Repositories');
        $this->autoBindRepositories($repositoryPath);

        $servicePath = app_path('Http/Services');
        $this->autoBindServices($servicePath);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Tự động binding các repository với interface tương ứng.
     *
     * @param string $directoryPath
     * @return void
     */
    protected function autoBindRepositories(string $directoryPath): void
    {
        if (File::isDirectory($directoryPath)) {
            $repositoryNamespaceBase = 'App\\Http\\Repositories';
            $interfaceNamespaceBase = 'App\\Http\\Repositories\\Impl';

            $repositoryFiles = File::files($directoryPath);
            foreach ($repositoryFiles as $repositoryFile) {
                $repositoryNameWithoutExtension = pathinfo($repositoryFile, PATHINFO_FILENAME);
                if (str_ends_with($repositoryNameWithoutExtension, 'Repository')) {
                    $interfaceName = str_replace('Repository', 'RepoInterface', $repositoryNameWithoutExtension);
                    $interfaceFullName = "{$interfaceNamespaceBase}\\{$interfaceName}";
                    $repositoryFullName = "{$repositoryNamespaceBase}\\{$repositoryNameWithoutExtension}";

                    if (interface_exists($interfaceFullName) && class_exists($repositoryFullName)) {
                        $this->app->bind($interfaceFullName, $repositoryFullName);
                    }
                }
            }
        }
    }

    protected function autoBindServices(string $servicePath): void
    {
        if (File::isDirectory($servicePath)) {
            $serviceNamespaceBase = 'App\\Http\\Services';
            $interfaceNamespaceBase = 'App\\Http\\Services\\Impl';

            $serviceFiles = File::files($servicePath);
            foreach ($serviceFiles as $serviceFile) {
                $serviceNameWithoutExtension = pathinfo($serviceFile, PATHINFO_FILENAME);
                $interfaceName = $serviceNameWithoutExtension . 'Interface';
                $interfaceFullName = "{$interfaceNamespaceBase}\\{$interfaceName}";
                $serviceFullName = "{$serviceNamespaceBase}\\{$serviceNameWithoutExtension}";

                if (interface_exists($interfaceFullName) && class_exists($serviceFullName)) {
                    $this->app->bind($interfaceFullName, $serviceFullName);
                }
            }
        }
    }
}
