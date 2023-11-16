<article class="story">
    <aside class="user-thumb">
        <a href="#">
            <img src="{{ asset('assets/images/thumb-1@2x.png') }}" width="44" alt="" class="img-circle" />
        </a>
    </aside>
    <div class="story-content">
        <!-- story header -->
        <header>
            <div class="publisher">
                <a href="#">Art Ramadani</a> posted a status update
                <em>2hrs ago</em>
            </div>
            <div class="story-type">
                <i class="entypo-feather"></i>
            </div>
        </header>
        <!-- story body -->
        <div class="story-main-content">
            <p id="main-post">{{ $taskpost->post ?? null }}</p>
        </div>
        <!-- story like and comment link -->
        <footer>
            <a href="#">
                <i class="entypo-comment"></i>
                Comment <span> 4</span>
            </a>
            <!-- Task Post Comments -->
            <!-- separator -->

        </footer>
        <hr />
    </div>
</article>
