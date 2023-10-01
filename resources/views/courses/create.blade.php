<x-layout>
    <div class="courses">
        <div class="form-box">
            <h1>Create a course</h1>
            <form method="POST" action="/courses">
                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" />
                </div>

                <div class="form-group">
                    <label>Tags</label>
                    <input type="text" name="tags" />
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" rows="4" cols="50"></textarea>
                </div>

                <div class="form-group">
                    <label>Duration (hours)</label>
                    <input type="number" name="duration" />
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" />
                </div>

                <div class="button-container">
                    <button class="button" type="submit">Create course</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>