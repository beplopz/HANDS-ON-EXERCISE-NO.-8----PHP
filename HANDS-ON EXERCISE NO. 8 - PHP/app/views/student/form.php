<section class="content-card">
    <p class="section-tag">Output #1</p>
    <h2>Student Information Form</h2>
    <form method="post" class="grid-form">
        <label>
            First Name
            <input type="text" name="first_name" value="<?= old('first_name') ?>" required>
            <?php if (!empty($errors['first_name'])): ?><span class="error"><?= h($errors['first_name']) ?></span><?php endif; ?>
        </label>
        <label>
            Middle Name
            <input type="text" name="middle_name" value="<?= old('middle_name') ?>">
        </label>
        <label>
            Last Name
            <input type="text" name="last_name" value="<?= old('last_name') ?>" required>
            <?php if (!empty($errors['last_name'])): ?><span class="error"><?= h($errors['last_name']) ?></span><?php endif; ?>
        </label>
        <label>
            Age
            <input type="number" name="age" min="1" value="<?= old('age') ?>" required>
            <?php if (!empty($errors['age'])): ?><span class="error"><?= h($errors['age']) ?></span><?php endif; ?>
        </label>
        <label>
            Gender
            <select name="gender" required>
                <option value="">Select gender</option>
                <option value="Male" <?= old('gender') === 'Male' ? 'selected' : '' ?>>Male</option>
                <option value="Female" <?= old('gender') === 'Female' ? 'selected' : '' ?>>Female</option>
                <option value="Prefer not to say" <?= old('gender') === 'Prefer not to say' ? 'selected' : '' ?>>Prefer not to say</option>
            </select>
            <?php if (!empty($errors['gender'])): ?><span class="error"><?= h($errors['gender']) ?></span><?php endif; ?>
        </label>
        <label>
            Email
            <input type="email" name="email" value="<?= old('email') ?>" required>
            <?php if (!empty($errors['email'])): ?><span class="error"><?= h($errors['email']) ?></span><?php endif; ?>
        </label>
        <label class="full-width">
            Address
            <textarea name="address" rows="3" required><?= old('address') ?></textarea>
            <?php if (!empty($errors['address'])): ?><span class="error"><?= h($errors['address']) ?></span><?php endif; ?>
        </label>
        <label>
            Contact Number
            <input type="tel" name="contact_number" value="<?= old('contact_number') ?>" required>
            <?php if (!empty($errors['contact_number'])): ?><span class="error"><?= h($errors['contact_number']) ?></span><?php endif; ?>
        </label>
        <div class="full-width">
            <button type="submit">Generate Output</button>
        </div>
    </form>
</section>

<?php if ($student !== null): ?>
    <section class="content-card result-card">
        <p class="section-tag">Formatted Output</p>
        <h2>Student Details</h2>
        <div class="details-grid">
            <div><span>Full Name</span><strong><?= h(trim($student['first_name'] . ' ' . $student['middle_name'] . ' ' . $student['last_name'])) ?></strong></div>
            <div><span>Age</span><strong><?= h($student['age']) ?></strong></div>
            <div><span>Gender</span><strong><?= h($student['gender']) ?></strong></div>
            <div><span>Email</span><strong><?= h($student['email']) ?></strong></div>
            <div><span>Address</span><strong><?= h($student['address']) ?></strong></div>
            <div><span>Contact Number</span><strong><?= h($student['contact_number']) ?></strong></div>
        </div>
    </section>
<?php endif; ?>
