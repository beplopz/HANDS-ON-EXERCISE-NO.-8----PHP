<section class="content-card">
    <p class="section-tag">Outputs #3 and #4</p>
    <h2>Student Registration Database Form</h2>
    <?php if (!empty($message)): ?><p class="notice success"><?= h($message) ?></p><?php endif; ?>
    <?php if (!empty($errors['database'])): ?><p class="notice warning"><?= h($errors['database']) ?></p><?php endif; ?>
    <?php if (!$databaseReady): ?><p class="notice warning">Database is not connected yet. The form is ready; import the SQL file first.</p><?php endif; ?>

    <form method="post" class="grid-form">
        <label>First Name<input type="text" name="first_name" value="<?= old('first_name') ?>" required><?php if (!empty($errors['first_name'])): ?><span class="error"><?= h($errors['first_name']) ?></span><?php endif; ?></label>
        <label>Middle Name<input type="text" name="middle_name" value="<?= old('middle_name') ?>"></label>
        <label>Last Name<input type="text" name="last_name" value="<?= old('last_name') ?>" required><?php if (!empty($errors['last_name'])): ?><span class="error"><?= h($errors['last_name']) ?></span><?php endif; ?></label>
        <label>Age<input type="number" name="age" min="1" value="<?= old('age') ?>" required><?php if (!empty($errors['age'])): ?><span class="error"><?= h($errors['age']) ?></span><?php endif; ?></label>
        <label>
            Gender
            <select name="gender" required>
                <option value="">Select gender</option>
                <option value="Male" <?= old('gender') === 'Male' ? 'selected' : '' ?>>Male</option>
                <option value="Female" <?= old('gender') === 'Female' ? 'selected' : '' ?>>Female</option>
            </select>
            <?php if (!empty($errors['gender'])): ?><span class="error"><?= h($errors['gender']) ?></span><?php endif; ?>
        </label>
        <label>Email<input type="email" name="email" value="<?= old('email') ?>" required><?php if (!empty($errors['email'])): ?><span class="error"><?= h($errors['email']) ?></span><?php endif; ?></label>
        <label class="full-width">Address<textarea name="address" rows="3" required><?= old('address') ?></textarea><?php if (!empty($errors['address'])): ?><span class="error"><?= h($errors['address']) ?></span><?php endif; ?></label>
        <label>Contact Number<input type="tel" name="contact_number" value="<?= old('contact_number') ?>" required><?php if (!empty($errors['contact_number'])): ?><span class="error"><?= h($errors['contact_number']) ?></span><?php endif; ?></label>
        <div class="full-width"><button type="submit">Save Registration</button></div>
    </form>
</section>

<section class="content-card">
    <p class="section-tag">Registered Persons</p>
    <h2>Registration List</h2>
    <?php if ($records === []): ?>
        <p class="empty-state">No records yet. Submit the form after connecting your database.</p>
    <?php else: ?>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($records as $record): ?>
                        <tr>
                            <td><?= h((string) $record['id']) ?></td>
                            <td><?= h(trim($record['first_name'] . ' ' . $record['middle_name'] . ' ' . $record['last_name'])) ?></td>
                            <td><?= h((string) $record['age']) ?></td>
                            <td><?= h($record['gender']) ?></td>
                            <td><?= h($record['email']) ?></td>
                            <td><?= h($record['address']) ?></td>
                            <td><?= h($record['contact_number']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>
