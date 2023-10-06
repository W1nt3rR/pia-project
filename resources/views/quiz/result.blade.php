<x-layout>
    <div class="quiz">
        <x-form-box>
            @if (!empty($questions))
            <?php
            $count = 0;
            $correctCount = 0;
            ?>

            <div class="questions">
                @foreach ($questions as $question)
                <div class="question">
                    <h1>{{ $question->question }}</h1>
                    <div class="answer">
                        Success rate across all students
                        {{ $question->completions }} / {{ $question->attempts }} ({{ number_format(($question->completions / $question->attempts) * 100, 2) }}%)
                    </div>
                </div>

                <?php
                $count++;
                if ($results[$question->id]) {
                    $correctCount++;
                }
                ?>
                @endforeach
            </div>

            <h1 style="margin-top: 30px;">Correct answers: {{ $correctCount }} / {{ $count }}</h1>

            @else

            <h1>You have not answered any questions</h1>

            @endif
        </x-form-box>
    </div>
</x-layout>