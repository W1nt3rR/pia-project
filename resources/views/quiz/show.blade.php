<x-layout>
    <div class="courses">
        <x-form-box class="courses-form-box">
            <h1>Course: {{ $quiz->course->title }}: Quiz {{ $quiz->id }}</h1>

            @auth
            @if (auth()->user()->role == 'teacher' || auth()->user()->role == 'admin')
            <div id="question-form" style="display: none;">
                <form method="POST" action="/questions/create/{{ $quiz->id }}">
                    @csrf
                    <div class="group-group">
                        <div class="form-group">
                            <label>Question:</label>
                            <input type="text" name="question" />
                            @error('question')
                            <p style="color: red">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group" style="width: 50%;">
                            <label>Difficulty:</label>
                            <select name="difficulty">
                                <option value="easy">Easy</option>
                                <option value="medium">Medium</option>
                                <option value="hard">Hard</option>
                            </select>
                        </div>
                    </div>

                    <div class="group-group">
                        <div class="form-group">
                            <label>Correct Answer:</label>
                            <input type="text" name="correct_answer" />
                            @error('correct_answer')
                            <p style="color: red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Wrong Answer 1:</label>
                            <input type="text" name="incorrect_answer_1" />
                            @error('incorrect_answer_1')
                            <p style="color: red">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="group-group">
                        <div class="form-group">
                            <label>Wrong Answer 2:</label>
                            <input type="text" name="incorrect_answer_2" />
                            @error('incorrect_answer_2')
                            <p style="color: red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Wrong Answer 3:</label>
                            <input type="text" name="incorrect_answer_3" />
                            @error('incorrect_answer_3')
                            <p style="color: red">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="button-container">
                        <button class="button" type="submit">Add question</button>
                    </div>
                </form>
            </div>
            @endif
            @endauth

            @auth
            @if (auth()->user()->role == 'teacher' || auth()->user()->role == 'admin')
            <div class="items">
                <label>Easy:</label>
                @foreach ($quiz->questions as $question)
                @if ($question->difficulty == 'easy')
                <div class="item">
                    {{ $question->question }}
                </div>
                @endif
                @endforeach
            </div>
            <div class="items">
                <label>Medium:</label>
                @foreach ($quiz->questions as $question)
                @if ($question->difficulty == 'medium')
                <div class="item">
                    {{ $question->question }}
                </div>
                @endif
                @endforeach
            </div>
            <div class="items">
                <label>Hard:</label>
                @foreach ($quiz->questions as $question)
                @if ($question->difficulty == 'hard')
                <div class="item">
                    {{ $question->question }}
                </div>
                @endif
                @endforeach
            </div>
            @endif
            @endauth

            <div class="button-container">
                <label>Difficulty:</label>
                <select name="difficulty">
                    <option value="easy">Easy</option>
                    <option value="medium">Medium</option>
                    <option value="hard">Hard</option>
                </select>

                <button onclick="startQuiz()" class="button" type="submit">Start Quiz</button>

                @auth
                @if (auth()->user()->role == 'teacher' || auth()->user()->role == 'admin')
                <button onclick="toggleQuestionForm()" class="button">New question</button>
                @endif
                @endauth
            </div>

        </x-form-box>
    </div>

</x-layout>

<script>
    function toggleQuestionForm() {
        if (document.getElementById("question-form").style.display == "block") {
            document.getElementById("question-form").style.display = "none";
        } else {
            document.getElementById("question-form").style.display = "block";
        }
    }

    function startQuiz() {
        window.location.href = "/quiz/start/{{ $quiz->id }}";
    }
</script>