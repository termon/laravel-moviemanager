<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

use App\Models\Movie;
use App\Models\Review;
use App\Enums\Genre;
use App\Services\IMovieService;

class MovieSeeder extends Seeder
{
    protected $svc;

    public function __construct(IMovieService $svc)
    {
        $this->svc = $svc;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // use factory to create fake movies
        //factory(App\Movie::class, 50)->create();

        $m1 = $this->svc->createMovie([
            'name' => 'Terminator',
            'director' => 'James Cameron',
            'year' => 1979,
            'budget' => 45.0,
            'duration' => 140,
            'rating' => 5,
            'genre' => Genre::SciFi,
            'poster_url' => 'https://www.themoviedb.org/t/p/w1280/qvktm0BHcnmDpul4Hz01GIazWPr.jpg',
            'plot' => 'In the post-apocalyptic future, reigning tyrannical supercomputers teleport a cyborg assassin known as the Terminator back to 1984 to kill Sarah Connor, whose unborn son is destined to lead insurgents against 21st century mechanical hegemony. Meanwhile, the human-resistance movement dispatches a lone warrior to safeguard Sarah. Can he stop the virtually indestructible killing machine?',
            'cast' => 'Arnold Schwarzenegger, Michael Bien, Linda Hamilton',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $m2 = $this->svc->createMovie([
            'name' => 'Shawshank Redemption',
            'director' => 'JJ BLoggs',
            'year' => 2007,
            'budget' => 45.0,
            'duration' => 108,
            'rating' => 5,
            'genre' => Genre::Action,
            'poster_url' => 'https://www.themoviedb.org/t/p/w1280/q6y0Go1tsGEsmtFryDOJo3dEmqu.jpg',
            'plot' => 'Framed in the 1940s for the double murder of his wife and her lover, upstanding banker Andy Dufresne begins a new life at the Shawshank prison, where he puts his accounting skills to work for an amoral warden. During his long stretch in prison, Dufresne comes to be admired by the other inmates -- including an older prisoner named Red -- for his integrity and unquenchable sense of hope.',
            'cast' => 'Tim Robbins, Morgan Freeman, Bob Gunton, William Sadler, Clancy Brown',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $m3 = $this->svc->createMovie([
            'name' => 'Alien',
            'director' => 'Ridley Scott',
            'year' => 1979,
            'budget' => 11.0,
            'duration' => 157,
            'rating' => 5,
            'genre' => Genre::SciFi,
            'poster_url' => 'https://www.themoviedb.org/t/p/w1280/bk9GVjN4kxmGekswNigaa5YIdr5.jpg',
            'plot' => 'During its return to the earth, commercial spaceship Nostromo intercepts a distress signal from a distant planet. When a three-member team of the crew discovers a chamber containing thousands of eggs on the planet, a creature inside one of the eggs attacks an explorer. The entire crew is unaware of the impending nightmare set to descend upon them when the alien parasite planted inside its unfortunate host is birthed.',
            'cast' => 'Tom Smerritt, Sigorney Weaver',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $m4 = $this->svc->createMovie([
            'name' => 'Joker',
            'director' => 'Todd Phillips',
            'year' => 2019,
            'budget' => 55.0,
            'duration' => 127,
            'rating' => 5,
            'genre' => Genre::Action,
            'poster_url' => 'https://image.tmdb.org/t/p/w600_and_h900_bestv2/udDclJoHjfjb8Ekgsd4FDteOkCU.jpg',
            'plot' => 'During the 1980s, a failed stand-up comedian is driven insane and turns to a life of crime and chaos in Gotham City while becoming an infamous psychopathic crime figure. Some more blurb blah blah blah blaaaaa more bla.... badsfdf s sd sdf sd zsv zsdf zsdfv zsdfbvzdsfv szfv zsfdv zsfdv zsfvzsfv zsdfvzsdv zsfv zsfv zsdfv zsdv sdv zsdvzsdv zsdv zsv zsdv zsdv zsdv zsdv zsdv zsdvzsdvzsdv',
            'cast' => 'Joaquin Phoenix, Rovert DeNiro',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $m5 = $this->svc->createMovie([
            'name' => 'The Green Mile',
            'director' => 'Frank Darabont',
            'year' => 1999,
            'budget' => 60,
            'duration' => 189,
            'rating' => 5,
            'genre' => Genre::Supernatural,
            'poster_url' => 'https://www.themoviedb.org/t/p/w1280/velWPhVMQeQKcxggNEU8YmIo52R.jpg',
            'plot' => 'In the post-apocalyptic future, reigning tyrannical supercomputers teleport a cyborg assassin known as the Terminator back to 1984 to kill Sarah Connor, whose unborn son is destined to lead insurgents against 21st century mechanical hegemony. Meanwhile, the human-resistance movement dispatches a lone warrior to safeguard Sarah. Can he stop the virtually indestructible killing machine?',
            'cast' => 'Arnold Schwarzenegger, Michael Bien, Linda Hamilton',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        
        // add reviews
        $r1 = $this->svc->addReview([
            'movie_id' => $m1->id,
            'name' => 'Joe',
            'rating' => 4,
            'comment' => 'Brilliant',
            'on' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $r2 = $this->svc->addReview([
            'movie_id' => $m1->id,
            'name' => 'Fred',
            'rating' => 5,
            'comment' => 'Best ever',
            'on' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
