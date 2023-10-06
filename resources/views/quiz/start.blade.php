<x-layout>
    <div class="quiz">
        <x-form-box>
            <form method="POST" action="/questions/check">
                @csrf
                @if ($quiz->questions->count() > 0)
                <div class="questions">
                    @foreach ($quiz->questions as $question)
                    <div class="question">
                        <h1>{{ $question->question }}</h1>
                        <?php
                        $options = [
                            $question->correct_answer,
                            $question->incorrect_answer_1,
                            $question->incorrect_answer_2,
                            $question->incorrect_answer_3,
                        ];
                        shuffle($options);
                        ?>
                        <div class="answers">
                            @foreach ($options as $option)
                            <div class="answer">
                                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option }}" />
                                <label>{{ $option }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="button-container">
                    <button class="button" type="submit">Submit</button>
                </div>

                @endif
            </form>
        </x-form-box>
    </div>
</x-layout>