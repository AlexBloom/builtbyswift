<!-- Notification Bar -->

<?php if( get_field('notification_toggle', 2908) ) : ?>
<section class="notification-portal">
  <p>
    <?php the_field('notification_text', 2908); ?>
    <a href="<?php the_field('notification_link', 2908); ?>" class="button">
      <?php the_field('notification_call_to_action', 2908); ?>
    </a>
  </p>
</section>
<?php endif; ?>
