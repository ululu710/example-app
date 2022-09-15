<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use App\Http\Requests\Tweet\CreateRequest;
//use Illuminate\Http\Response;
use App\Models\Tweet;
use App\Services\TweetService;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(CreateRequest $request, TweetService $tweetService)
    {
        $tweetService->saveTweet(
            $request->userId(),
            $request->tweet(),
            $request->images()
        );

        return redirect()->route('tweet.index');
    }
}
