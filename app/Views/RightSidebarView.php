<div class="right-sidebar">
    <h2 class="center">List of entered Resumes</h2>
    <hr class="sidebar-line">
    <ul class="menu-list">
        <?php if ($persons): ?>
            <?php foreach ($persons as $person): ?>
                <li>
                    <a class="menu-button" href="/resume/<?php echo $person->getId(); ?>">
                        <?php echo $person->getName() . ' ' . $person->getSurname()?>
                    </a>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>