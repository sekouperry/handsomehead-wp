(function() {
    tinymce.PluginManager.add( 'w_studio_shortcode', function( editor, url ) {
        editor.addButton( 'w-studio-shortcode', {
            title: 'W Studio Shortcodes',
            type: 'menubutton',
            icon: 'wp_code',
            menu:[
                {
                    text: 'Title, content',
                    value: '[w_studio_title_content title="" title_content=""][/w_studio_title_content]',
                    onclick:function(){
                        editor.insertContent( this.value() )
                    }
                },
                {
                    text: 'Service contents',
                    value: '[w_studio_service title="" icon=""][/w_studio_service]',
                    onclick:function(){
                        editor.insertContent( this.value() )
                    }
                },
                {
                    text: 'Image slider',
                    value: '[w_studio_ft_image imageurl=""]',
                    onclick:function(){
                        editor.insertContent( this.value() )
                    }
                },
                {
                    text: 'Ft portfolio',
                    value: '[w_studio_ft_portfolio icon=""]',
                    onclick:function(){
                        editor.insertContent( this.value() )
                    }
                },
                {
                    text: 'Counter',
                    value: '[w_studio_counter_in title="" start="" end="" icon="" transparent_counter="style-1"]',
                    onclick:function(){
                        editor.insertContent( this.value() )
                    }
                },
                {
                    text: 'Image content',
                    value: '[w_studio_service2_contents title="" imageurl=""][/w_studio_service2_contents]',
                    onclick:function(){
                        editor.insertContent( this.value() )
                    }
                },
                {
                    text: 'Team 1 Page',
                    value: '[w_studio_team_1]',
                    onclick:function(){
                        editor.insertContent( this.value() )
                    }
                },
                {
                    text: 'Progress bar',
                    value: '[w_studio_abt_skill_bar title="" value=""]',
                    onclick:function(){
                        editor.insertContent( this.value() )
                    }
                },
                {
                    text: 'Image',
                    value: '[w_studio_onepage_service_image imageurl=""]',
                    onclick:function(){
                        editor.insertContent( this.value() )
                    }
                },
                {
                    text: 'Service item',
                    value: '[w_studio_onepage_service_items title="" imageurl=""][/w_studio_onepage_service_items]',
                    onclick:function(){
                        editor.insertContent( this.value() )
                    }
                },
                {
                    text: 'Video',
                    value: '[w_studio_onepage_about_us videolink=""]',
                    onclick:function(){
                        editor.insertContent( this.value() )
                    }
                },
                {
                    text: 'Pricing table',
                    value: '[w_studio_onepage_price_content title="" price="" time="" button_link="" action=""][/w_studio_onepage_price_content]',
                    onclick:function(){
                        editor.insertContent( this.value() )
                    },
                    menu: [
                        {
                            text: 'Pricing Item',
                            value: '[w_studio_price_items title="" title2="" imageurl1="" imageurl2=""][/w_studio_price_items]',
                            onclick: function(e) {
                                e.stopPropagation();
                                editor.insertContent(this.value());
                            }       
                        }
                    ]
                },
                {
                    text: 'Contact address',
                    value: '[w_studio_onepage_contact_address title1="" street="" street=""][/w_studio_onepage_contact_address]',
                    onclick:function(){
                        editor.insertContent( this.value() )
                    },
                    menu: [
                        {
                            text: 'Other address',
                            value: '[w_studio_onepage_contact_option title="" option="" value=""][/w_studio_onepage_contact_option]',
                            onclick: function(e) {
                                e.stopPropagation();
                                editor.insertContent(this.value());
                            }       
                        }
                    ]
                },
                {
                    text: 'Social links',
                    value: '[w_studio_social_links title=""]',
                    onclick:function(){
                        editor.insertContent( this.value() )
                    }
                },
                {
                    text: 'Accordion',
                    value: '[w_studio_onepage_contact_accordion_wrapper][w_studio_onepage_contact_accordion title="" panel_id="" collapse_id=""][/w_studio_onepage_contact_accordion][/w_studio_onepage_contact_accordion_wrapper]',
                    onclick:function(){
                        editor.insertContent( this.value() )
                    }
                },
                {
                    text: 'Google map full',
                    value: '[w_studio_googlemap icon=""][w_studio_googlemap_data place="" latitude="" longitude=""][/w_studio_googlemap_data][/w_studio_googlemap]',
                    onclick:function(){
                        editor.insertContent( this.value() )
                    }
                },
                 {
                    text: 'Google map',
                    value: '[w_studio_onepage_googlemap icon=""][w_studio_googlemap_data place="" latitude="" longitude=""][/w_studio_googlemap_data][/w_studio_onepage_googlemap]',
                    onclick:function(){
                        editor.insertContent( this.value() )
                    }
                },
                {
                    text: 'Testimonial',
                    value: '[w_studio_abt_testimonial type_of_testimonial="style-3"][/w_studio_abt_testimonial]',
                    onclick:function(){
                        editor.insertContent( this.value() )
                    }
                },
                {
                    text: 'Client logo',
                    value: '[w_studio_abt_client number_of_posts="4"][/w_studio_abt_client]',
                    onclick:function(){
                        editor.insertContent( this.value() )
                    }
                },
                {
                    text: 'Row',
                    value: '[w_studio_row][/w_studio_row]',
                    onclick:function(){
                        editor.insertContent( this.value() )
                    }
                },
                {
                    text: 'Container',
                    value: '[w_studio_container][/w_studio_container]',
                    onclick:function(){
                        editor.insertContent( this.value() )
                    }
                },
                {
                    text: 'Columns',
                    value: '[w_studio_columns col_no=""][/w_studio_columns]',
                    onclick:function(){
                        editor.insertContent( this.value() )
                    }
                }
            ]
        });
    });
})();