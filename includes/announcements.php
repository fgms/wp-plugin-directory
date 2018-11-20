<?php ?>
<div class="announcements" style="position: relative;">
    <div class="announcement-wrapper">
        <ul data-ga-category="Directory - Announcements">
            <?php foreach ( get_fg_post_type('dir-announcement',100) as $article): ?>
            <li>
                <div class="announcement-title"><?php echo $article['title'] ?></div>
                <div class="announcement-message"><?php echo $article['content'] ?></div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>