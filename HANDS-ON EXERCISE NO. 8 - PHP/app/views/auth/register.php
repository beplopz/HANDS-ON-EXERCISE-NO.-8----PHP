<section class="content-card narrow-card">
    <p class="section-tag">Output #2</p>
    <h2>Create an Account</h2>
    <?php if (!empty($message)): ?><p class="notice success"><?= h($message) ?></p><?php endif; ?>
    <form method="post" class="stack-form">
        <label>Full Name<input type="text" name="name" required></label>
        <label>Email<input type="email" name="email" required></label>
        <label>Password<input type="password" name="password" required></label>
        <button type="submit">Register</button>
    </form>
    <p class="inline-links">
        Already registered? <a href="index.php?page=output2-login">Login here</a>
    </p>
</section>
