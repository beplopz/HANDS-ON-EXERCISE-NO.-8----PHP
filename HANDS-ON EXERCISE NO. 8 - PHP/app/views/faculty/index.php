<section class="content-card">
    <p class="section-tag">Output #5</p>
    <h2>Faculty Information Module</h2>
    <?php if (!empty($message)): ?><p class="notice success"><?= h($message) ?></p><?php endif; ?>
    <?php if (!empty($errors['database'])): ?><p class="notice warning"><?= h($errors['database']) ?></p><?php endif; ?>
    <?php if (!$databaseReady): ?><p class="notice warning">Database is not connected yet. The faculty module becomes fully functional after SQL import.</p><?php endif; ?>

    <form method="post" class="grid-form">
        <label>First Name<input type="text" name="first_name" value="<?= old('first_name') ?>" required><?php if (!empty($errors['first_name'])): ?><span class="error"><?= h($errors['first_name']) ?></span><?php endif; ?></label>
        <label>Middle Name<input type="text" name="middle_name" value="<?= old('middle_name') ?>"></label>
        <label>Last Name<input type="text" name="last_name" value="<?= old('last_name') ?>" required><?php if (!empty($errors['last_name'])): ?><span class="error"><?= h($errors['last_name']) ?></span><?php endif; ?></label>
        <label>Age<input type="number" name="age" min="18" value="<?= old('age') ?>" required><?php if (!empty($errors['age'])): ?><span class="error"><?= h($errors['age']) ?></span><?php endif; ?></label>
        <label>
            Gender
            <select name="gender" required>
                <option value="">Select gender</option>
                <option value="Male" <?= old('gender') === 'Male' ? 'selected' : '' ?>>Male</option>
                <option value="Female" <?= old('gender') === 'Female' ? 'selected' : '' ?>>Female</option>
            </select>
            <?php if (!empty($errors['gender'])): ?><span class="error"><?= h($errors['gender']) ?></span><?php endif; ?>
        </label>
        <label class="full-width">Address<textarea name="address" rows="3" required><?= old('address') ?></textarea><?php if (!empty($errors['address'])): ?><span class="error"><?= h($errors['address']) ?></span><?php endif; ?></label>
        <label>Position<input type="text" name="position" value="<?= old('position') ?>" required><?php if (!empty($errors['position'])): ?><span class="error"><?= h($errors['position']) ?></span><?php endif; ?></label>
        <label>Salary<input type="number" step="0.01" min="0" name="salary" value="<?= old('salary') ?>" required><?php if (!empty($errors['salary'])): ?><span class="error"><?= h($errors['salary']) ?></span><?php endif; ?></label>
        <div class="full-width"><button type="submit">Save Faculty Record</button></div>
    </form>
</section>

<section class="content-card">
    <p class="section-tag">Faculty List</p>
    <h2>Registered Faculty</h2>
    <?php if ($records === []): ?>
        <p class="empty-state">No faculty records yet. Connect the database and submit the form to populate this table.</p>
    <?php else: ?>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Faculty ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Position</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($records as $record): ?>
                        <tr>
                            <td><?= h((string) $record['faculty_id']) ?></td>
                            <td><?= h(trim($record['first_name'] . ' ' . $record['middle_name'] . ' ' . $record['last_name'])) ?></td>
                            <td><?= h((string) $record['age']) ?></td>
                            <td><?= h($record['gender']) ?></td>
                            <td><?= h($record['address']) ?></td>
                            <td><?= h($record['position']) ?></td>
                            <td><?= h(number_format((float) $record['salary'], 2)) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>
