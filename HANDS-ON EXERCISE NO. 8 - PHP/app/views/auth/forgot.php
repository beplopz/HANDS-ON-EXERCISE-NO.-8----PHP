<section class="content-card narrow-card">
    <p class="section-tag">Output #2</p>
    <h2>Forgot Password</h2>
    <?php if (!empty($message)): ?><p class="notice success"><?= h($message) ?></p><?php endif; ?>
    <form method="post" class="stack-form">
        <label>Email Address<input type="email" name="email" required></label>
        <button type="submit">Send Reset Link</button>
    </form>
    <p class="inline-links">
        Return to <a href="index.php?page=output2-login">Login</a>
    </p>
</section>
