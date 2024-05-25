<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rock Paper Scissors</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .choice:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body class="bg-gray-200">
    <div
        class="game-container border-green-500 max-w-lg mx-auto text-center bg-white rounded-lg shadow-lg border-2 p-8 mt-20">
        <h1 class="text-4xl font-extrabold text-green-600 mb-6">Rock Paper Scissors</h1>
        @if (Auth::check())
            <h2 class="text-2xl mb-6">Hello, {{ Auth::user()->name }}!</h2>
        @else
            <h2 class="text-2xl mb-6">Hello, Guest!</h2>
        @endif
        <div id="gameForm">
            <div class="button-container flex justify-center space-x-6 mb-8">
                <button type="button"
                    class="choice bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-full transition duration-300"
                    id="rock" data-choice="rock">
                    <span class="text-3xl">✊</span>
                    <span class="block text-sm mt-2">Rock</span>
                </button>
                <button type="button"
                    class="choice bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-full transition duration-300"
                    id="paper" data-choice="paper">
                    <span class="text-3xl">✋</span>
                    <span class="block text-sm mt-2">Paper</span>
                </button>
                <button type="button"
                    class="choice bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-full transition duration-300"
                    id="scissors" data-choice="scissors">
                    <span class="text-3xl">✌️</span>
                    <span class="block text-sm mt-2">Scissors</span>
                </button>
            </div>
            <div id="playAgainContainer" class="mt-6" style="display: none;">
                <button type="button" id="playAgain"
                    class="bg-purple-600 hover:bg-purple-700 text-white font-bold px-6 py-3 rounded-full transition duration-300">Play
                    Again</button>
            </div>
        </div>
        <div class="result-container flex justify-center mt-10 space-x-10 text-lg">
            <div class="player-choice text-center">
                <h2 class="font-semibold text-gray-700">You</h2>
                <div id="playerChoiceDisplay" class="border-2 border-green-500 p-4 rounded-lg bg-green-100">
                    <span id="playerChoiceEmoji" class="text-3xl"></span>
                </div>
            </div>
            <div class="vs flex items-center">
                <h2 class="text-2xl font-bold">VS</h2>
            </div>
            <div class="computer-choice text-center">
                <h2 class="font-semibold text-gray-700">Computer</h2>
                <div id="computerChoiceDisplay" class="border-2 border-red-500 p-4 rounded-lg bg-red-100">
                    <span id="computerChoiceEmoji" class="text-3xl"></span>
                </div>
            </div>
        </div>
        <div class="scoreboard flex justify-center mt-10 space-x-10 text-lg">
            <div class="bg-gray-100 rounded-lg p-4 text-center">
                <div class="text-2xl font-bold text-green-600" id="playerScore">0</div>
                <div class="text-sm text-gray-600">Your Score</div>
            </div>
            <div class="bg-gray-100 rounded-lg p-4 text-center">
                <div class="text-2xl font-bold text-red-600" id="computerScore">0</div>
                <div class="text-sm text-gray-600">Computer Score</div>
            </div>
        </div>
        <p class="result-text text-xl font-bold text-purple-600 mt-4" id="result"></p>
    </div>

    <script>
        const choices = ['rock', 'paper', 'scissors'];
        const emojis = {
            rock: '✊',
            paper: '✋',
            scissors: '✌️'
        };
        const resultText = {
            win: 'You Win!',
            lose: 'You Lose!',
            tie: 'It\'s a Tie!'
        };

        let playerScore = 0;
        let computerScore = 0;

        document.querySelectorAll('.choice').forEach(button => {
            button.addEventListener('click', () => {
                const playerChoice = button.dataset.choice;
                const computerChoice = choices[Math.floor(Math.random() * choices.length)];

                document.getElementById('playerChoiceEmoji').textContent = emojis[playerChoice];
                document.getElementById('computerChoiceEmoji').textContent = emojis[computerChoice];

                const result = determineWinner(playerChoice, computerChoice);
                document.getElementById('result').textContent = resultText[result];

                if (result === 'win') {
                    playerScore++;
                } else if (result === 'lose') {
                    computerScore++;
                }

                document.getElementById('playerScore').textContent = playerScore;
                document.getElementById('computerScore').textContent = computerScore;

                document.getElementById('playAgainContainer').style.display = 'block';
            });
        });

        document.getElementById('playAgain').addEventListener('click', () => {
            document.getElementById('playerChoiceEmoji').textContent = '';
            document.getElementById('computerChoiceEmoji').textContent = '';
            document.getElementById('result').textContent = '';
            document.getElementById('playAgainContainer').style.display = 'none';
        });

        function determineWinner(playerChoice, computerChoice) {
            if (playerChoice === computerChoice) {
                return 'tie';
            }

            if (
                (playerChoice === 'rock' && computerChoice === 'scissors') ||
                (playerChoice === 'paper' && computerChoice === 'rock') ||
                (playerChoice === 'scissors' && computerChoice === 'paper')
            ) {
                return 'win';
            }

            return 'lose';
        }
    </script>
</body>

</html>
