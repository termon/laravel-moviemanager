<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

use App\Models\Movie;
use App\Models\Review;
use App\Services\IMovieService;
use App\Http\Requests\MovieStoreRequest;
use App\Http\Requests\ReviewStoreRequest;

use Prologue\Alerts\Facades\Alert;

class MovieController extends Controller
{

    /**
     * @var IMovieService
     */
    private $svc;

    public function __construct(IMovieService $svc)
    {
        $this->svc = $svc;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = $this->svc->findAllMovies();
        return view('movie.index', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create-movie');

        return view('movie.create', ['movie' => new Movie()]);

    }

    /**
     * Store a newly created resource in storage.
     * Using MovieStoreRequest to check auth, validate and sanitize the form data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieStoreRequest $request)
    {
        $this->authorize('create-movie');

        // only store validated data
        $movie = $this->svc->createMovie($request->validated());

        Alert::add('success', 'Movie added')->flash();
        return redirect()->route('movies.show', ['id'=>$movie->id])->with('success',"Movie created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $movie = $this->svc->findMovieById($id);
        if (!$movie)
        {

            abort(404);
        }
        return view('movie.show', ['movie' => $movie]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $this->authorize('update-movie');

        $movie = $this->svc->findMovieById($id);
        if (!$movie)
        {
            abort(404);
        }
        return view('movie.edit', ['movie' => $movie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, MovieStoreRequest $request)
    {
        $this->authorize('update-movie');

        // only access validated data
        $movie = $this->svc->updateMovie($id, $request->validated());

        Alert::add('success', 'Movie updated')->flash();
        return redirect()->route('movies.show', ['id'=>$movie->id])->with('success',"Movie updated successfully");
    }

    /**
     * Show form to delete the specified resource.
     *
     * @param \App\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function delete(int $id)
    {
        $this->authorize('delete-movie');

        $movie = $this->svc->findMovieById($id);
        if (!$movie)
        {
            abort(404);
        }
        return view('movie.delete', ['movie' => $movie]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Movie $movie
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(int $id)
    {
        $this->authorize('delete-movie');

        if ($this->svc->deleteMovie($id)) {
            return redirect()->route('movies.index')->with('success','Movie deleted successfully!');
        }

        Alert::add('success', 'Movie deleted')->flash();
        return redirect()->route('movies.index')->with('error','Problem deleting movie');
    }

    /**
     * @param Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function createReview(int $movie_id)
    {
        $this->authorize('create-review');

        if (!$this->svc->findMovieById($movie_id))
        {
            abort(404);
        }
        $review = Review::make($movie_id);
        return view('movie.create-review', ['review' => $review]);
    }

    /**
     * @param Review $review
     * @return \Illuminate\Http\Response
     */
    public function storeReview(ReviewStoreRequest $request)
    {
        $this->authorize('create-review');
        $review = $this->svc->addReview($request->validated());
        Alert::add('success', 'Review added')->flash();
        return redirect()->route('movies.show', ['id'=>$review->movie_id])->with('success','Review added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Review $review
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroyReview(int $movie_id, int $review_id)
    {
        $this->authorize('delete-review');

        $this->svc->deleteReview($review_id);
        Alert::add('success', 'Review removed')->flash();
        return redirect()->route('movies.show',$movie_id)->with('success','Review deleted successfully');
    }
}
