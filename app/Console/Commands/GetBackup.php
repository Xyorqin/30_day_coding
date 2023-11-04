<?php

namespace App\Console\Commands;

use App\Telegram;
use Illuminate\Console\Command;

class GetBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:get-backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $filename = "backup-" . now()->modify('-1 day')->format('Y-m-d') .  ".sql";
        $old_filename = "backup-" . now()->modify('-2 day')->format('Y-m-d') . ".sql";

        if (file_exists(storage_path() . "/app/backup/" . $old_filename)) {
            unlink(storage_path() . "/app/backup/" . $old_filename);
        }

        if (!file_exists(storage_path() . "/app/backup")) {
            mkdir(storage_path() . "/app/backup", 0755, true);
        }

        $databaseDetails = [
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'host' => env('DB_HOST'),
            'database' => env('DB_DATABASE')
        ];
        (new Telegram)->sendMessage('get');
        $command = "pg_dump";

        foreach ($databaseDetails as $key => $value) {
            if ($value) {
                switch ($key) {
                    case 'username':
                        $command .= " -U $value";
                        break;
                    case 'password':
                        $command .= " -p $value";
                        break;
                    case 'host':
                        $command .= " -h $value";
                        break;
                    case 'database':
                        $command .= " -d $value";
                        break;
                    default:
                        break;
                }
            }
        }

        $url = " > " . storage_path() . "/app/backup/" . $filename;
        $command .= $url;

        $returnVar = NULL;
        $output  = NULL;

        exec($command, $output, $returnVar);


        (new Telegram)->sendDocument();
    }
}
