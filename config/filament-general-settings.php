<?php

use Joaopaulolndev\FilamentGeneralSettings\Enums\TypeFieldEnum;

return [
    'show_application_tab' => true,
    'show_logo_and_favicon' => true,
    'show_analytics_tab' => false,
    'show_seo_tab' => false,
    'show_email_tab' => true,
    'show_social_networks_tab' => true,
    'expiration_cache_config_time' => 60,
    'show_custom_tabs' => true,
    'custom_tabs' => [
        'more_configs' => [
            'label' => 'Others',
            'icon' => 'heroicon-o-plus-circle',
            'columns' => 1,
            'fields' => [
                'address' => [
                    'type' => TypeFieldEnum::Textarea->value,
                    'rows' => 4,
                    'label' => 'Company Address',
                    'placeholder' => 'Insert Company Address',
                    'required' => false,
                    'rules' => 'required|string|max:255',
                ],
            ]
        ],
    ]
];
