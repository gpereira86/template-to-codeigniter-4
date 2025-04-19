<div class="container" data-aos="fade-up">

    <div class="section-header d-flex justify-content-between align-items-center mb-5">
        <h2><?php echo $posts[0]->categoryName; ?></h2>
        <div><a href="/category/<?php echo $posts[0]->categoryName; ?>" class="more">See All <?php echo $posts[0]->categoryName; ?></a></div>
    </div>

    <div class="row">
        <div class="col-md-9">

            <?php $post = $posts[0]; ?>
            <div class="d-lg-flex post-entry-2">
                <a href="/post/<?php echo $post->slug ?>" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                    <img src="<?php echo $post->image; ?>" alt="" class="img-fluid">
                </a>
                <div>
                    <div class="post-meta"><span class="date"><?php echo $posts[0]->categoryName; ?></span> <span class="mx-1">&bullet;</span> <span>
                            <?php $time = \CodeIgniter\I18n\Time::parse($post->created_at, 'America/Chicago');
                            echo $time->toLocalizedString("MMM d, YY"); ?></span></div>
                    <h3><a href="single-post.html"><?php echo $post->title; ?></a></h3>
                    <p><?php echo word_limiter($post->description, 50); ?></p>
                    <div class="d-flex align-items-center author">
                        <div class="photo"><img src="assets/img/person-2.jpg" alt="" class="img-fluid"></div>
                        <div class="name">
                            <h3 class="m-0 p-0"><?php echo $post->userFirstName.' '.$post->userLastName; ?></h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <?php $post = $posts[1]; ?>
                    <div class="post-entry-1 border-bottom">
                        <a href="/post/<?php echo $post->slug ?>"><img src="<?php echo $post->image; ?>" alt="" class="img-fluid"></a>
                        <div class="post-meta"><span class="date"><?php echo $post->categoryName; ?></span> <span class="mx-1">&bullet;</span> <span>
                                <?php $time = \CodeIgniter\I18n\Time::parse($post->created_at, 'America/Chicago');
                                echo $time->toLocalizedString("MMM d, YY"); ?></span></div>
                        <h2 class="mb-2"><a href="single-post.html"><?php echo $post->title; ?></a></h2>
                        <span class="author mb-3 d-block"><?php echo $post->userFirstName.' '.$post->userLastName; ?></span>
                        <p class="mb-4 d-block"><?php echo word_limiter($post->description, 20); ?></p>
                    </div>

                    <?php $post = $posts[2]; ?>
                    <div class="post-entry-1">
                        <div class="post-meta"><span class="date"><?php echo $post->categoryName; ?></span> <span class="mx-1">&bullet;</span> <span>
                                <?php $time = \CodeIgniter\I18n\Time::parse($post->created_at, 'America/Chicago');
                                echo $time->toLocalizedString("MMM d, YY"); ?></span></div>
                        <h2 class="mb-2"><a href="/post/<?php echo $post->slug ?>"><?php echo $post->title; ?></a></h2>
                        <span class="author mb-3 d-block"><?php echo $post->userFirstName.' '.$post->userLastName; ?></span>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="post-entry-1">
                        <?php $post = $posts[3]; ?>
                        <a href="/post/<?php echo $post->slug ?>"><img src="<?php echo $post->image; ?>" alt="" class="img-fluid"></a>
                        <div class="post-meta"><span class="date"><?php echo $post->categoryName; ?></span> <span class="mx-1">&bullet;</span> <span>
                                <?php $time = \CodeIgniter\I18n\Time::parse($post->created_at, 'America/Chicago');
                                echo $time->toLocalizedString("MMM d, YY"); ?></span></div>
                        <h2 class="mb-2"><a href="/post/<?php echo $post->slug ?>"><?php echo $post->title; ?></a></h2>
                        <span class="author mb-3 d-block"><?php echo $post->userFirstName.' '.$post->userLastName; ?></span>
                        <p class="mb-4 d-block"><?php echo word_limiter($post->description, 20); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">

            <?php $postsSlice = array_slice($posts, 4, 10); ?>
            <?php foreach ($postsSlice as $post) : ?>

                <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date"><?php echo $post->categoryName; ?></span> <span class="mx-1">&bullet;</span> <span>
                            <?php $time = \CodeIgniter\I18n\Time::parse($post->created_at, 'America/Chicago');
                            echo $time->toLocalizedString("MMM d, YY"); ?></span></div>
                    <h2 class="mb-2"><a href="/post/<?php echo $post->slug ?>"><?php echo $post->title; ?></a></h2>
                    <span class="author mb-3 d-block"><?php echo $post->userFirstName.' '.$post->userLastName; ?></span>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
</div>