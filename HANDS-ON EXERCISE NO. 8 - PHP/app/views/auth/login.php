<section class="content-card narrow-card">
    <p class="section-tag">Output #2</p>
    <h2>Login</h2>
    <?php if (!empty($message)): ?><p class="notice success"><?= h($message) ?></p><?php endif; ?>
    <form method="post" class="stack-form">
        <label>Email<input type="email" name="email" required></label>
        <label>Password<input type="password" name="password" required></label>
        <button type="submit">Login</button>
    </form>
    <p class="inline-links">
        <a href="index.php?page=output2-forgot">Forgot Password?</a>
    </p>
</section>
