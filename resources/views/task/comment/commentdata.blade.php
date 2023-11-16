<div class="row">
    <div class="profile-env">
        <section class="profile-feed">
            <!-- profile post form -->
            <form class="profile-post-form" action="{{ route('task.taskpost') }}" id="" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group" style="display: none;">
                    @if (Auth::check())
                        <input id="userId" type="text" value="{{ Auth::user()->id }}" name="user_id"
                            id="user">
                    @endif
                </div>
                <div class="form-group" style="display:none;">
                    <input id="taskId" type="text" value="{{ $mainTask->id }}" name="task_id" id="task">
                </div>
                <textarea name="taskPost" id="postData" class="form-control autogrow" placeholder="What's on your mind?"></textarea>
                <div class="form-options">
                    <div class="post-submit">
                        <button type="submit" class="btn btn-primary">POST</button>
                    </div>
                </div>
            </form>
            <!-- Task Post and Comments-->
            <div class="profile-stories">
                @if (!empty($taskpost))
                    @includeIf('task.comment.taskpost')
                @endif
            </div>
        </section>
    </div>
</div>
