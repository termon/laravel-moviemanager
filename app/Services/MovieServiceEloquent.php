<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Movie;
use App\Models\Review;

class MovieServiceEloquent implements IMovieService
{
    public function findMovieById($id)
    {
        return Movie::where('id',$id)->with('reviews')->first();
    }

    public function findAllMovies()
    {
        return Movie::orderBy('id')->paginate(3);
        //return Movie::Paginate(4);
    }

    public function createMovie(array $data)
    {
        $movie = Movie::create($data);
        return $movie;
    }

    public function updateMovie(int $id, array $data)
    {
        $movie = $this->findMovieById($id);
        $movie->update($data);
        $movie->save();
        return $movie;
    }

    public function deleteMovie(int $id)
    {
        $movie = $this->findMovieById($id);
        $movie->reviews()->delete();
        return $movie->delete();
    }

    // ------------------ Reviews ------------------------------
    public function findReviewById(int $id)
    {
        return Review::where('id',$id)->with('movie')->first();
    }

    public function addReview(array $data)
    {
        $review = Review::create($data);

        // update the movie rating after adding review
        $this->updateMovieRating($review->movie_id);

        return $review;
    }

    public function deleteReview(int $review_id)
    {
        $review = $this->findReviewById($review_id);
        $movie_id = $review->movie->id;
        $review->delete();

        // update the movie rating after deleting review
        $this->updateMovieRating($movie_id);
    }

    private function updateMovieRating(int $movie_id)
    {
        $movie = Movie::find($movie_id);

        // calculate updated rating and if null then set to 0
        $rating = $movie->reviews->avg('rating');
        $movie->rating = $rating ? $rating : 0;
        $movie->save();

        return $movie;
    }

}
