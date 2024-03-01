<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('datetime', function ($expression) {
            // Parse the expression as a date string
          
            $dateObject = date_create($expression);

            // Check if the date object is not empty
            if (!empty($dateObject)) {
                // Format the date and return it as a PHP string
                return "<?php echo $dateObject->('d/m/Y H:i:s'); ?>";
            }

            // If the date object is empty, return false
            return false;
        });
    }
}
