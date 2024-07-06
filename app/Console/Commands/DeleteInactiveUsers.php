<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class DeleteInactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:deleteInactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete inactive users.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        User::where('active', 0)->delete();
        $this->info('Inactive users deleted successfully.');
    }
}
