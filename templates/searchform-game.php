<form role="search" method="get" class="search-form form-inline" action="<?= esc_url(home_url('/')); ?>">
	<span class="gamehelp">If you're looking for info on a particular game, stick it in here:</span>
  <label class="sr-only"><?php _e('Search for:', 'sage'); ?></label>
  <div class="input-group">

    <input type="search" value="<?= get_search_query(); ?>" name="s" class="search-field form-control" placeholder="<?php _e('Search Games', 'sage'); ?>" required>
    <input type="hidden" name="post_type" value="game" />
    <span class="input-group-btn">
      <button type="submit" class="search-submit btn btn-default"><?php _e('Search', 'sage'); ?></button>
    </span>
  </div>
</form>
