<?= $this->extend('master') ?>

<?= $this->section('content') ?>

<section class="single-post-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9 post-content" data-aos="fade-up">

                <!-- ======= Single Post Content ======= -->
                <div class="single-post">
                    <div class="post-meta"><span class="date"><?php echo $post->categoryName; ?></span> <span
                                class="mx-1">&bullet;</span> <span>
                            <?php $time = \CodeIgniter\I18n\Time::parse($post->created_at, 'America/Chicago');
                            echo $time->toLocalizedString("MMM d, yy"); ?>
                        </span>
                    </div>
                    <h1 class="mb-5"><?php echo $post->title; ?></h1>
                    <p>
                        <span class="firstcharacter"><?php echo $post->description[0]; ?></span>
                        <?php echo substr($post->description, 1); ?>
                    </p>


                </div><!-- End Single Post Content -->

                <!-- ======= Comments ======= -->
                <?php if ($comments): ?>
                <div class="comments">
                    <h5 class="comment-title py-4"><?php echo count($comments->comments); ?> Comments</h5>

                    <?php foreach ($comments->comments as $comment): ?>
                        <div class="comment d-flex mb-4">
                            <div class="flex-shrink-0">
                                <div class="avatar avatar-sm rounded-circle">
                                    <img class="avatar-img" src="<?php echo $comment->avatar; ?>" alt=""
                                         class="img-fluid">
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-2 ms-sm-3">
                                <div class="comment-meta d-flex align-items-baseline">
                                    <h6 class="me-2"><?php echo $comment->userFirstName . ' ' . $comment->userLastName; ?></h6>
                                    <span class="text-muted">
                                            <?php echo \CodeIgniter\I18n\Time::parse($comment->created_at, 'America/Chicago')->humanize(); ?>

                                        <?php if ($comment->isAuthor): ?>
                                            <span class="badge bg-dark">my comment <i
                                                        class="bi bi-star-fill"></i></span>
                                        <?php elseif (session()->has('auth')): ?>
                                            <button type="button" class="btn btn-outline-primary btn-sm btn-reply"
                                                    data-id="<?php echo $comment->id; ?>">
                                                    Reply to <?php echo $comment->userFirstName ?> <i
                                                        class="bi bi-send"></i>
                                                </button>
                                        <?php endif; ?>
                                        </span>
                                </div>
                                <div class="comment-body">
                                    <?php echo $comment->comment; ?>
                                </div>

                                <?php if (isset($comment->replies)): ?>
                                    <div class="comment-replies bg-light p-3 mt-3 rounded">
                                        <h6 class="comment-replies-title mb-4 text-muted text-uppercase"><?php echo count($comment->replies); ?>
                                            replies</h6>
                                        <?php foreach ($comment->replies as $reply): ?>
                                            <div class="reply d-flex mb-4">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar avatar-sm rounded-circle">
                                                        <img class="avatar-img" src="<?php echo $reply->avatar ?>"
                                                             alt="" class="img-fluid">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-2 ms-sm-3">
                                                    <div class="reply-meta d-flex align-items-baseline">
                                                        <h6 class="mb-0 me-2"><?php echo $reply->userFirstName . ' ' . $reply->userLastName; ?></h6>
                                                        <span class="text-muted">
                                                                <?php echo \CodeIgniter\I18n\Time::parse($reply->created_at, 'America/Chicago')->humanize(); ?>
                                                            <?php if ($reply->isAuthor): ?>
                                                                <span class="badge bg-dark">my reply <i
                                                                            class="bi bi-star-fill"></i></span>
                                                            <?php elseif (session()->has('auth')): ?>
                                                                <button type="button"
                                                                        class="btn btn-outline-primary btn-sm btn-reply"
                                                                        data-id="<?php echo $comment->id; ?>">
                                                                        Reply to <?php echo $reply->userFirstName ?> <i
                                                                            class="bi bi-send"></i>
                                                                    </button>
                                                            <?php endif; ?>
                                                            </span>
                                                    </div>
                                                    <div class="reply-body">
                                                        <?php echo $reply->comment ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?><!-- End Comments -->


                <?php if (session()->has('auth')): ?>

                    <!-- ======= Comments Form ======= -->
                    <div class="row justify-content-center mt-5">

                        <?php if (session()->has('messageThrottleComment')) : ?>
                            <span style="color: red; font-size: 20px;">
                                <?php echo session()->getFlashdata('messageThrottleComment'); ?>
                            </span>
                        <?php endif; ?>

                        <?php if (session()->has('created')) : ?>
                            <span style="color: green; font-size: 20px;">
                                <?php echo session()->getFlashdata('created'); ?>
                            </span>
                        <?php endif; ?>

                        <?php if (session()->has('not_created')) : ?>
                            <span style="color: red; font-size: 20px;">
                                <?php echo session()->getFlashdata('not_created'); ?>
                            </span>
                        <?php endif; ?>

                        <div class="col-lg-12">
                            <h5 class="comment-title">Leave a Comment</h5>

                            <form action="<?php echo url_to('comment.store'); ?>" method="post">
                                <?php echo csrf_field() ?>

                                <?php if (session()->has('errors')) : ?>
                                    <span style="color: red; font-size: 20px;">
                                        <?php echo session()->getFlashdata('errors')['comment']; ?>
                                    </span>
                                <?php endif; ?>


                                <div class="row">
                                    <input type="hidden" name="post_id" value="<?php echo $post->id; ?>">


                                    <div class="col-12 mb-3">
                                        <label for="comment-message">Message</label>

                                        <textarea class="form-control" id="comment-message"
                                                  name="comment"
                                                  placeholder="Enter your comment"
                                                  cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" class="btn btn-primary" value="Post comment">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- End Comments Form -->

                <?php else: ?>
                    <div class="alert alert-danger" style="text-align: center;">
                        Você precisa estar logado(a) para fazer comentários | <a href="/login">Login</a>
                    </div>
                <?php endif; ?>

            </div>
            <div class="col-md-3">
                <!-- ======= Sidebar ======= -->
                <?php echo view_cell('App\Cells\CategorySidebar::render'); ?>

            </div>
        </div>
    </div>
</section>

<?php echo $this->include('/partials/modals/replies.php') ?>

<?= $this->section('js') ?>
<script src="/assets/js/replies.js"></script>
<?= $this->endSection() ?>

<?= $this->endSection() ?>
