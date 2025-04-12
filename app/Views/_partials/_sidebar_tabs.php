<?php foreach ($posts as $post) :?>

    <div class="post-entry-1 border-bottom">
        <div class="post-meta"><span class="date"><?php echo $post->categoryName ?></span> <span class="mx-1">&bullet;</span> <span>
                <?php $time = \CodeIgniter\I18n\Time::parse($post->created_at , 'America/Chicago');
                echo $time->toLocalizedString("MMM d, yy"); ?>
            </span></div>
        <h2 class="mb-2"><a href="#"><?php echo $post->title ?></a></h2>
        <span class="author mb-3 d-block"><?php echo $post->userFirstName.' '.$post->userLastName ?></span>
    </div>

<?php endforeach; ?>