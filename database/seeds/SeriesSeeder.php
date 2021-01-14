<?php

use Illuminate\Database\Seeder;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Séries

        $breakingbad_id = DB::table('series')->insertGetId([
        	'title' => 'Breaking Bad'
        ]);

        $thewire_id = DB::table('series')->insertGetId([
        	'title' => 'The Wire'
        ]);

        $xfiles_id = DB::table('series')->insertGetId([
        	'title' => 'The X-Files'
        ]);

        //Saisons

        for($i = 1; $i <= 5; $i++) {
        	$season_id = DB::table('seasons')->insertGetId([
        		'season_number' => $i,
				'serie_id' => $breakingbad_id
        	]);

        	for($j = 1; $j <= 13; $j++) {
        		$episode_id = DB::table('episodes')->insertGetId([
	        		'episode_number' => $j,
					'season_id' => $season_id
	        	]);
        	}
        }

        for($i = 1; $i <= 5; $i++) {
        	$season_id = DB::table('seasons')->insertGetId([
        		'season_number' => $i,
				'serie_id' => $thewire_id
        	]);

        	for($j = 1; $j <= 12; $j++) {
        		$episode_id = DB::table('episodes')->insertGetId([
	        		'episode_number' => $j,
					'season_id' => $season_id
	        	]);
        	}
        }

        for($i = 1; $i <= 9; $i++) {
        	$season_id = DB::table('seasons')->insertGetId([
        		'season_number' => $i,
				'serie_id' => $xfiles_id
        	]);

        	for($j = 1; $j <= 24; $j++) {
        		$episode_id = DB::table('episodes')->insertGetId([
	        		'episode_number' => $j,
					'season_id' => $season_id
	        	]);
        	}
        }




    }
}
