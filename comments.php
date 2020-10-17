<div class="comments-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="meal-comments">
                    <?php 
                wp_list_comments(); 

                if(! comments_open()){
                    _e("Comments are closed", "meal");
                }
                ?>
                </div>
                <h2><?php _e('Leave your comments!', 'meal'); ?></h2>

                <?php 
                $meal_comment_fields = array();
                $meal_comment_fields['author'] = <<<EOD
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="controls">
                                <input type="text" id="author" name="author" class="form-control"  placeholder="Name*" required>
                            </div>
                        </div>
                    </div>
                EOD;

                $meal_comment_fields['email'] = <<<EOD
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="controls">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email*" required>
                            </div>
                        </div>
                    </div>
                </div>
                EOD;

                $meal_comment_fields['url'] = <<<EOD
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="controls">
                                <input type="url" id="url" name="url" class="form-control" placeholder="Website">
                            </div>
                        </div>
                    </div>
                </div>
                EOD;

                $meal_comment_field = <<<EOD
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="controls">
                                <textarea id="comment" name="comment" class="form-control"  placeholder="Message*" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                EOD;

                $meal_comment_submit_btn = <<<EOD
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-2">
                           <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                    </div>
                </div>
                EOD;

                $meal_comment_form_args = array(
                    'fields'                =>  $meal_comment_fields,
                    'comment_field'         =>  $meal_comment_field,
                    'submit_button'         =>  $meal_comment_submit_btn,
                    'class_form'            =>  'comments-form text-left',
                    'comment_notes_before'   =>  ' ',
                    'comment_notes_after'   =>  __('Your Email address will not be published. Required fields are marked *', 'meal'),
                    'title_reply'   =>  '',
                );
                comment_form($meal_comment_form_args);
                ?>
            </div>
        </div>
    </div>
</div>