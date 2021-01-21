<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestComment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'comment:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a test comment';

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
        // $this->info('Ceci est une info');
        // $this->warn('Ceci est un warning');
        // $this->error('Ceci est une erreur');

        $comment = new \App\Comment();
        $comment->fill([
            'user_id' => 1,
            'content' => 'Ceci est un commentaire...'
        ]);

        // $serie = \App\Serie::find(1);
        // $serie->comments()->save($comment);

        // $season = \App\Season::find(1);
        // $season->comments()->save($comment);

        $actor = \App\Actor::find(51);
        $actor->comments()->save($comment);


        return 0;
    }
}
