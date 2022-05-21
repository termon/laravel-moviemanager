<?php

namespace App\Services;

use App\Models\Movie;
use App\Models\Review;

interface IMovieService
{
    public function findMovieById($id);

    public function createMovie(array $data);

    public function updateMovie(int $id, array $data);

    public function deleteMovie(int $id);

    public function findReviewById(int $id);

    public function addReview(array $data);

    public function deleteReview(int $review_id);

}
