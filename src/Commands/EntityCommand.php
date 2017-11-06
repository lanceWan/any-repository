<?php
namespace Iwanli\Repository\Commands;

use Illuminate\Console\Command;

class EntityCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'any:entity';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new entity';


    public function handle()
    {
        $name = $this->ask('What is your entity name?');

        $this->call('any:repository', [
            'name' => $name
        ]);

        $this->call('any:service', [
            'name' => $name
        ]);

        if ($this->choice('Do you wish to create presenter ?', ['y', 'n'], 1) == 'y') {
            
            $presenter = $this->ask('What is your presenter name?');

            $this->call('any:presenter', [
                'name' => $presenter
            ]);
        }


        if ($this->choice('Do you wish to create criteria ?', ['y', 'n'], 1) == 'y') {
            
            $criteria = $this->ask('What is your criteria name?');

            $this->call('any:criteria', [
                'name' => $criteria
            ]);
        }

        if ($this->choice('Do you wish to create trait ?', ['y', 'n'], 1) == 'y') {
            
            $trait = $this->ask('What is your trait name?');

            $this->call('any:trait', [
                'name' => $trait
            ]);
        }

    }

    

}