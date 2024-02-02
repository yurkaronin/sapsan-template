<?php
/**
 * @version 4.3.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! comments_open() ) {
    return;
}

$wpshop_core = theme_container()->get( \Wpshop\Core\Core::class );

?>
<div id="reviews" class="woocommerce-Reviews">
    <div id="comments">
        <h2 class="woocommerce-Reviews-title">
            <?php
            $count = $product->get_review_count();
            if ( $count && wc_review_ratings_enabled() ) {
                /* translators: 1: reviews count 2: product name */
                $reviews_title = sprintf( esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'woocommerce' ) ), esc_html( $count ), '<span>' . get_the_title() . '</span>' );
                echo apply_filters( 'woocommerce_reviews_title', $reviews_title, $count, $product ); // WPCS: XSS ok.
            } else {
                echo apply_filters( 'bono_reviews_title_default', esc_html__( 'Reviews', 'woocommerce' ) );
            }
            ?>
        </h2>

        <?php if ( have_comments() ) : ?>
            <ol class="commentlist">
                <?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', [ 'callback' => 'woocommerce_comments' ] ) ); ?>
            </ol>

            <?php
            if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
                echo '<nav class="woocommerce-pagination">';
                paginate_comments_links(
                    apply_filters(
                        'woocommerce_comment_pagination_args',
                        [
                            'prev_text' => '&larr;',
                            'next_text' => '&rarr;',
                            'type'      => 'list',
                        ]
                    )
                );
                echo '</nav>';
            endif;
            ?>
        <?php else : ?>
            <p class="woocommerce-noreviews">
                <?php echo apply_filters( 'bono_noreviews_text', esc_html__( 'There are no reviews yet.', 'woocommerce' ) ); ?>
            </p>
        <?php endif; ?>
    </div>

    <?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
        <div id="review_form_wrapper">
            <div id="review_form">
                <?php
                $commenter    = wp_get_current_commenter();
                $comment_form = [
                    'comment_notes_before' => '',
                    /* translators: %s is product title */
                    'title_reply'          => esc_html__( 'Add a review', 'woocommerce' ),
                    /* translators: %s is product title */
                    'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'woocommerce' ),
                    'title_reply_before'   => '<div id="reply-title" class="comment-reply-title">',
                    'title_reply_after'    => '</div>',
                    'comment_notes_after'  => '',
                    'label_submit'         => esc_html__( 'Submit', 'woocommerce' ),
                    'logged_in_as'         => '',
                    'comment_field'        => '',
                ];

                $name_email_required = (bool) get_option( 'require_name_email', 1 );
                $fields              = [
                    'author' => [
                        'label'    => __( 'Name', 'woocommerce' ),
                        'type'     => 'text',
                        'value'    => $commenter['comment_author'],
                        'required' => $name_email_required,
                    ],
                    'email'  => [
                        'label'    => __( 'Email', 'woocommerce' ),
                        'type'     => 'email',
                        'value'    => $commenter['comment_author_email'],
                        'required' => $name_email_required,
                    ],
                ];

                $comment_form['fields'] = [];

                foreach ( $fields as $key => $field ) {
                    $field_html = '<p class="comment-form-' . esc_attr( $key ) . '">';
                    $field_html .= '<label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] );

                    if ( $field['required'] ) {
                        $field_html .= '&nbsp;<span class="required">*</span>';
                    }

                    $field_html .= '</label><input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . ' /></p>';

                    $comment_form['fields'][ $key ] = $field_html;
                }

                $account_page_url = wc_get_page_permalink( 'myaccount' );
                if ( $account_page_url ) {
                    /* translators: %s opening and closing link tags respectively */
                    $comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'woocommerce' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
                }

                if ( wc_review_ratings_enabled() ) {
                    $comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'woocommerce' ) . ( wc_review_ratings_required() ? '&nbsp;<span class="required">*</span>' : '' ) . '</label><select name="rating" id="rating" required>
						<option value="">' . esc_html__( 'Rate&hellip;', 'woocommerce' ) . '</option>
						<option value="5">' . esc_html__( 'Perfect', 'woocommerce' ) . '</option>
						<option value="4">' . esc_html__( 'Good', 'woocommerce' ) . '</option>
						<option value="3">' . esc_html__( 'Average', 'woocommerce' ) . '</option>
						<option value="2">' . esc_html__( 'Not that bad', 'woocommerce' ) . '</option>
						<option value="1">' . esc_html__( 'Very poor', 'woocommerce' ) . '</option>
					</select></div>';
                }

                $comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Your review', 'woocommerce' ) . '&nbsp;<span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" required></textarea></p>';

                $comments_text_before_submit = $wpshop_core->get_option( 'comments_text_before_submit' );
                if ( ! empty( $comments_text_before_submit ) ) {
                    $comment_form['comment_notes_after'] = '<div class="comment-notes-after">' . $comments_text_before_submit . '</div>';
                }

                comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
                ?>
            </div>
        </div>
    <?php else : ?>
        <p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>
    <?php endif; ?>

    <div class="clear"></div>
</div>
