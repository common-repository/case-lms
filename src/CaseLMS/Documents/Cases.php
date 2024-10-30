<?php
/**
 * This file is part of the Case LMS WordPress Plugin.
 *
 * (c) Uriel Wilson
 *
 * Please see the LICENSE file that was distributed with this source code
 * for full copyright and license information.
 */

namespace CaseLMS\Documents;

class Cases
{
    /**
     * Post Type: Case Posts.
     */
    public static function register(): void
    {
        $labels = [
            'name'                  => esc_html__( 'Cases', 'case-lms' ),
            'singular_name'         => esc_html__( 'Case', 'case-lms' ),
            'menu_name'             => esc_html__( 'Cases', 'case-lms' ),
            'name_admin_bar'        => esc_html__( 'Case', 'case-lms' ),
            'archives'              => esc_html__( 'Case Archives', 'case-lms' ),
            'attributes'            => esc_html__( 'Case Attributes', 'case-lms' ),
            'parent_item_colon'     => esc_html__( 'Parent Case:', 'case-lms' ),
            'all_items'             => esc_html__( 'All Cases', 'case-lms' ),
            'add_new_item'          => esc_html__( 'Add New Case', 'case-lms' ),
            'add_new'               => esc_html__( 'Add New', 'case-lms' ),
            'new_item'              => esc_html__( 'New Case', 'case-lms' ),
            'edit_item'             => esc_html__( 'Edit Case', 'case-lms' ),
            'update_item'           => esc_html__( 'Update Case', 'case-lms' ),
            'view_item'             => esc_html__( 'View Case', 'case-lms' ),
            'view_items'            => esc_html__( 'View Cases', 'case-lms' ),
            'search_items'          => esc_html__( 'Search Cases', 'case-lms' ),
            'not_found'             => esc_html__( 'Not found', 'case-lms' ),
            'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'case-lms' ),
            'featured_image'        => esc_html__( 'Case Image', 'case-lms' ),
            'set_featured_image'    => esc_html__( 'Add case image', 'case-lms' ),
            'remove_featured_image' => esc_html__( 'Remove case image', 'case-lms' ),
            'use_featured_image'    => esc_html__( 'Use as case image', 'case-lms' ),
            'insert_into_item'      => esc_html__( 'Insert into case', 'case-lms' ),
            'uploaded_to_this_item' => esc_html__( 'Uploaded to this case', 'case-lms' ),
            'items_list'            => esc_html__( 'Case list', 'case-lms' ),
            'items_list_navigation' => esc_html__( 'Case list navigation', 'case-lms' ),
            'filter_items_list'     => esc_html__( 'Filter case list', 'case-lms' ),
        ];

        $args = [
            'label'                 => esc_html__( 'Case', 'case-lms' ),
            'labels'                => $labels,
            'description'           => '',
            'public'                => true,
            'publicly_queryable'    => true,
            'show_ui'               => true,
            'show_in_rest'          => true,
            'rest_base'             => '',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'has_archive'           => true,
            'show_in_menu'          => true,
            'show_in_nav_menus'     => true,
            'delete_with_user'      => true,
            'exclude_from_search'   => false,
            'capability_type'       => 'post',
            'map_meta_cap'          => true,
            'hierarchical'          => false,
            'rewrite'               => [
                'slug'       => 'cases',
                'with_front' => true,
            ],
            'query_var'             => true,
            'menu_icon'             => 'dashicons-database',
            'supports'              => [ 'title', 'editor', 'author', 'thumbnail' ],
            'taxonomies'            => [ 'category', 'post_tag' ],
        ];
        register_post_type( 'cases', $args );
    }

    /**
     * Adds support for author archives.
     *
     * @param  [type] $query  the query
     *
     * @return void
     */
    public static function case_author_archive( $query ): void
    {
        if ( is_admin() || ! $query->is_main_query() ) {
            return;
        }

        if ( is_author() ) {
            $query->set(
                'post_type',
                [
                    'post',
                    'cases',
                ]
            );
        }
    }
}
