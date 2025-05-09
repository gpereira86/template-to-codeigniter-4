<?= $this->extend('master') ?>

<?= $this->section('content') ?>

    <section id="contact" class="contact mb-5">
        <div class="container text-center">
            <h2 class="mb-4">Register</h2>
            <form method="post" action="<?php echo url_to('register.store') ?>">
                <div class="row justify-content-md-center">
                    <!-- 2 column grid layout with text inputs for the first and last names -->

                    <div class="col-lg-4">
                        <div data-mdb-input-init class="form-outline">
                            <span class="text text-bg-danger" style="font-size: 20px;"><?php echo session()->get('errors')['firstName'] ?? ''; ?></span>
                            <input type="text" id="form3Example1" name="firstName" class="form-control"
                                   placeholder="Your first name" value="Primeiro"/>
                            <label class="form-label" for="form3Example1">First name</label>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div data-mdb-input-init class="form-outline">
                            <span class="text text-bg-danger" style="font-size: 20px;"><?php echo session()->get('errors')['lastName'] ?? ''; ?></span>
                            <input type="text" id="form3Example2" name="lastName" class="form-control"
                                   placeholder="Your last name" value="Ultimo"/>
                            <label class="form-label" for="form3Example2">Last name</label>
                        </div>
                    </div>

                    <!-- Email input -->
                    <div data-mdb-input-init class="col-lg-8 form-outline my-4">
                        <span class="text text-bg-danger" style="font-size: 20px;"><?php echo session()->get('errors')['email'] ?? ''; ?></span>
                        <input type="email" id="form3Example3" name="email" class="form-control"
                               placeholder="Your email" value="vila.nadia@reis.net.br"/>
                        <label class="form-label" for="form3Example3">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="col-lg-8 form-outline mb-4">
                        <span class="text text-bg-danger" style="font-size: 20px;"><?php echo session()->get('errors')['password'] ?? ''; ?></span>
                        <input type="password" id="form3Example4" name="password" class="form-control" placeholder="Your first password" value="123"/>
                        <label class="form-label" for="form3Example4">Password</label>
                    </div>

                    <!-- Submit button -->
                    <div class="col-lg-8">
                        <button data-mdb-ripple-init type="submit" class="btn btn-primary w-auto mb-4">
                            Sign up
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </section>

    <script>
        // Initialization for ES Users
        import {Input, Ripple, initMDB} from "mdb-ui-kit";

        initMDB({Input, Ripple});
    </script>

<?= $this->endSection() ?>