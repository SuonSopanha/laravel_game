<?php

namespace Gameaaa\Agroupnine\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Gameaaa\Agroupnine\Models\Score;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class GameController extends BaseController
{
    public function index()
    {
        return view('game::welcome');
    }

    public function login()
    {
        return view('game::login');
    }

    public function loginUser(Request $request)
    {
        // Validate the login request
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/play');
        }

        return redirect('/login')->withErrors('Login failed');
    }

    public function register()
    {
        return view('game::register');
    }

    public function registerUser(Request $request)
    {
        // Validate and create the user
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        Auth::login($user);

        //create a score for the user

        $score = new Score();
        $score->user_id = Auth::id();
        $score->score = 0;
        $score->save();

        // Redirect to the game play route

        return redirect('/play'); // Redirect to the game play route
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function play()
    {
        return view('game::play');
    }

    public function playGame(Request $request)
    {
        $validatedData = $request->validate([
            'choice' => 'required|in:rock,paper,scissors',
        ]);

        $choices = ['rock', 'paper', 'scissors'];
        $userChoice = $validatedData['choice'];
        $computerChoice = $choices[array_rand($choices)];

        $result = $this->determineWinner($userChoice, $computerChoice);

        // Save the score
        if($result === 1) {
            $score = Score::where('user_id', Auth::id())->first();
            $score->score += 1;
            $score->save();
        }

        // Get the latest scores
        $userScore = Score::where('user_id', Auth::id())->where('result', 'win')->count();
        $computerScore = Score::where('user_id', Auth::id())->where('result', 'lose')->count();

        return view('game::play', [
            'userChoice' => $userChoice,
            'computerChoice' => $computerChoice,
            'result' => $result,
            'userScore' => $userScore,
            'computerScore' => $computerScore,
        ]);
    }
    private function determineWinner($userChoice, $computerChoice)
    {
        if ($userChoice === $computerChoice) {
            return 0;
        }

        if (
            ($userChoice === 'rock' && $computerChoice === 'scissors') ||
            ($userChoice === 'paper' && $computerChoice === 'rock') ||
            ($userChoice === 'scissors' && $computerChoice === 'paper')
        ) {
            return 1;
        } else {
            return -1;
        }
    }

    public function leaderboard()
    {
        // Fetch all scores ordered by the score column in descending order
        $allScores = Score::orderBy('score', 'desc')->get();

        // Pass the data to the view
        return view('game::leaderboad', compact('allScores'));
    }

}
